# Système de Verrouillage des Modules - Documentation Complète

## Overview

Un système de verrouillage progressif a été implémenté pour garantir que les utilisateurs doivent compléter chaque chapitre à **80%** avant de pouvoir accéder au module suivant du même type (théorique ou pratique).

## Architecture

### Composants Principaux

#### 1. **Model: Module** (`app/Models/Module.php`)
Contient la logique principale de verrouillage :

```php
// Vérifie si un module est verrouillé pour un utilisateur
$isLocked = $module->isLockedFor($user);

// Obtient le pourcentage de progression
$progress = $module->getProgressPercentage($user);

// Récupère la raison du verrouillage
$reason = $module->getLockReason($user);

// Obtient le module précédent
$previousModule = $module->getPreviousModule();
```

#### 2. **Middleware: CheckModuleAccess** (`app/Http/Middleware/CheckModuleAccess.php`)
Protège l'accès aux routes des modules :
- Vérifie si l'utilisateur est connecté
- Vérifie si l'utilisateur a accès au contenu (has_paid)
- Vérifie si le module est verrouillé
- Redirige vers la page des modules avec un message d'erreur si accès refusé

#### 3. **Service: ModuleLockingService** (`app/Services/ModuleLockingService.php`)
Service centralisé pour la logique métier :

```php
$service = new ModuleLockingService();

// Obtenir tous les modules verrouillés
$locked = $service->getLockedModules($user, $isPractical);

// Obtenir le prochain module verrouillé
$nextLocked = $service->getNextLockedModule($user);

// Obtenir la progression requise pour débloquer
$progress = $service->getProgressToUnlock($module, $user);

// Obtenir un résumé complet
$summary = $service->getModulesSummary($user);
```

#### 4. **Controller: ModuleLockingController** (`app/Http/Controllers/ModuleLockingController.php`)
Fournit les endpoints pour afficher le statut :
- `GET /modules/statut` - Page HTML avec le statut complet
- `GET /api/modules/statut` - API JSON de tous les modules
- `GET /api/modules/{module}/statut` - API JSON d'un module spécifique

#### 5. **View: locking-status.blade.php** (`resources/views/modules/locking-status.blade.php`)
Affiche un dashboard complet avec :
- Résumé global des modules théoriques et pratiques
- Liste détaillée de chaque module avec progression
- Raison du verrouillage (si applicable)

#### 6. **Updated View: modules/index.blade.php**
La page des modules affiche maintenant :
- Badge "Verrouillé" sur les modules non accessibles
- Bouton désactivé pour les modules verrouillés
- Message d'erreur expliquant pourquoi le module est verrouillé

## Flux de Verrouillage

### Logique de Base

```
1. Utilisateur accède à la page des modules
   ↓
2. Pour chaque module :
   - Si c'est le premier module du type (théorique/pratique)
     → NON VERROUILLÉ
   - Sinon :
     - Récupérer la progression du module précédent
     - Si progression < 80% → VERROUILLÉ
     - Si progression >= 80% → DÉVERROUILLÉ
   ↓
3. Afficher l'état approprié (bouton actif/désactivé)
```

### Calcul de la Progression

La progression d'un module est basée sur :
- **Cours complétés** : Nombre de cours marqués comme complétés
- Formule : `(cours_complétés / total_cours) * 100`

Formule détaillée (optionnelle avec quiz) :
```
totalProgress = (courseProgress * 0.7) + (quizProgress * 0.3)
```

### Sécurité

Deux niveaux de protection :

1. **Frontend** : Bouton désactivé, affichage visuel
2. **Backend** : Middleware `CheckModuleAccess` qui empêche l'accès même en contournant le frontend

## Routes

### Web Routes (Authentifiées)

```php
// Dashboard de progression
GET /modules/statut → ModuleLockingController@status

// Routes des modules (avec protection)
GET /cours/{module} → ModuleController@show (avec CheckModuleAccess)
GET /cours/{module}/{course} → CourseController@show
GET /cours/{module}/quiz → QuizController@show
```

### API Routes

```php
// Statut de tous les modules
GET /api/modules/statut

// Statut d'un module spécifique
GET /api/modules/{module}/statut
```

## Utilisation dans les Vues

### Vérifier si un module est verrouillé

```blade
@if($module->isLockedFor(auth()->user()))
    <button disabled>Module verrouillé</button>
@else
    <a href="{{ route('modules.show', $module) }}">Accéder</a>
@endif
```

### Afficher la progression

```blade
<div class="progress-bar">
    <span>{{ $module->getProgressPercentage(auth()->user()) }}%</span>
</div>
```

### Afficher la raison du verrouillage

```blade
@if($module->isLockedFor(auth()->user()))
    <p>{{ $module->getLockReason(auth()->user()) }}</p>
@endif
```

## Utilisation dans les Controllers

```php
use App\Services\ModuleLockingService;

class MyController extends Controller
{
    public function __construct(protected ModuleLockingService $lockingService)
    {
    }

    public function index()
    {
        $summary = $this->lockingService->getModulesSummary(auth()->user());
        return view('dashboard', compact('summary'));
    }
}
```

## Configuration et Personnalisation

### Modifier le seuil de déverrouillage

Actuellement défini à **80%**. Pour changer :

**Dans `app/Models/Module.php`** :
```php
// Remplacer 80 par votre pourcentage
return $previousProgress < 80;  // ← Changer ici
```

**Attention** : À changer aussi dans :
- `ModuleLockingService.php` (commentaires et documentation)
- `locking-status.blade.php` (affichage "80%")

### Ajouter des conditions supplémentaires

Pour ajouter des conditions au verrouillage (ex: score minimum au quiz) :

```php
// Dans Module.php
public function isLockedFor($user)
{
    if (!$user->has_paid) return false;
    
    $previousModule = $this->getPreviousModule();
    if (!$previousModule) return false;

    $previousProgress = $previousModule->getProgressPercentage($user);
    
    // Condition supplémentaire: score au quiz > 70%
    if ($previousModule->quiz) {
        $quizResult = $previousModule->quiz->results()
            ->where('user_id', $user->id)
            ->latest()
            ->first();
        
        if ($quizResult && $quizResult->score < 70) {
            return true; // Verrouillé même avec 80% de cours
        }
    }

    return $previousProgress < 80;
}
```

## Gestion des Cas Limites

### Utilisateurs sans paiement
- Les modules ne sont **jamais verrouillés** pour les utilisateurs sans accès
- Ils reçoivent un message "Débloquer" au lieu de "Verrouillé"

### Premier module du type
- Le premier module théorique et le premier module pratique ne sont **jamais verrouillés**
- Ils sont toujours accessibles si l'utilisateur a payé

### Plusieurs modules au même ordre
- La logique utilise `order < current_order` pour éviter les problèmes
- Assurer l'unicité et la croissance de la colonne `order`

## Tests Recommandés

1. **Test de déverrouillage progressif**
   - Compléter cours dans module 1 à 79% → module 2 verrouillé
   - Compléter cours dans module 1 à 80% → module 2 accessible

2. **Test de sécurité**
   - Essayer d'accéder directement à un module verrouillé
   - Vérifier la redirection et le message d'erreur

3. **Test d'API**
   - `/api/modules/statut` doit retourner le statut de tous les modules
   - `/api/modules/{id}/statut` doit retourner le statut d'un module

4. **Test multi-utilisateur**
   - Deux utilisateurs avec progression différente
   - Chacun doit avoir des modules différents verrouillés

## Events et Hooks (Optionnel)

Pour déclencher des actions au déverrouillage :

```php
// Dans CourseController@markComplete
if ($course->module->getProgressPercentage($user) >= 80) {
    event(new ModuleUnlocked($course->module, $user));
}
```

## Logging

Pour faciliter le débogage, ajoutez du logging :

```php
// Dans isLockedFor()
Log::info('Module lock check', [
    'module_id' => $this->id,
    'user_id' => $user->id,
    'previous_progress' => $previousProgress,
    'is_locked' => $previousProgress < 80,
]);
```

## Performance

- La logique utilise des relations Eloquent optimisées
- Ajouter des caches si nécessaire :

```php
$progress = Cache::remember(
    "module_progress_{$module->id}_{$user->id}",
    now()->addHour(),
    fn() => $module->getProgressPercentage($user)
);
```

## Maintenance

- Vérifier régulièrement les migrations de `user_progress`
- S'assurer que `is_practical` est correctement défini sur tous les modules
- Valider que `order` est cohérent et sans doublons

---

**Version** : 1.0  
**Dernière mise à jour** : 2026-01-18
