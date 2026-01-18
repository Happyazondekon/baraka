# Configuration - Système de Durée d'Abonnement (2 mois)

## 📋 Vue d'ensemble

Ce système gère les abonnements d'accès à la plateforme avec une durée de **2 mois** à partir du moment du paiement.

## 🗄️ Modifications base de données

Une nouvelle migration a été créée : `2026_01_17_000000_add_subscription_expiry_to_users_table.php`

### Nouvelles colonnes dans la table `users` :
- **`payment_expires_at`** (timestamp) - Date/heure d'expiration de l'accès
- **`subscription_months`** (integer) - Nombre de mois d'abonnement (défaut: 2)
- **`has_active_subscription`** (boolean) - Indicateur si l'abonnement est actuellement actif

## 🔧 Modifications du modèle User

Nouvelles méthodes dans la classe `User` :

```php
// Vérifier si l'abonnement est actif
$user->isSubscriptionActive(); // bool

// Accès rapide pour vérifier l'autorisation
$user->hasAccess(); // bool

// Nombre de jours avant expiration
$user->getDaysUntilExpiry(); // int ou null

// Vérifie si expiration < 7 jours
$user->isExpiringsoon(); // bool
```

## 🔐 Contrôleurs modifiés

### 1. **FedapayWebhookController**
Lors de la réception d'un paiement approuvé via webhook FedaPay :
- ✅ `has_paid = true`
- ✅ `paid_at = now()`
- ✅ `payment_expires_at = now()->addMonths(2)`
- ✅ `subscription_months = 2`
- ✅ `has_active_subscription = true`

### 2. **HomeController**
Deux méthodes mises à jour :
- `handlePaymentCallback()` - Traite le callback de paiement
- `simulatePaymentWebhook()` - Simule un paiement pour les tests

## 🛡️ Middleware

### CheckSubscriptionExpiry
Fichier : `app/Http/Middleware/CheckSubscriptionExpiry.php`

**Fonctionnalités :**
1. Vérifie chaque requête authentifiée
2. Si l'abonnement a expiré :
   - Met à jour `has_paid = false`
   - Met à jour `has_active_subscription = false`
   - Redirige vers la page de tarification si accès au contenu payant
3. Enregistre un warning si l'abonnement expire bientôt

**Routes affectées :** `modules*`, `examens*`, `quizzes*`, `progression`, `dashboard`

## 📅 Commande Artisan

### `php artisan subscriptions:check-expiry`
Commande pour vérifier et mettre à jour les expiration manuellement.

**Utilité :**
- Vérifier tous les utilisateurs avec des abonnements
- Désactiver les accès expirés
- Afficher les abonnements expirant bientôt
- Généralement exécutée via un scheduler (cronjob)

### Programmation du scheduler

Ajouter dans `app/Console/Kernel.php` :
```php
$schedule->command('subscriptions:check-expiry')->daily();
```

## 📊 Vérifications d'accès

### Dans les vues Blade
```blade
@if(auth()->user()->hasAccess())
    <!-- Contenu payant -->
@else
    <!-- Redirection vers paiement -->
@endif
```

### Dans les contrôleurs
```php
if (!$user->hasAccess()) {
    return redirect()->route('pricing')
        ->with('error', 'Votre abonnement a expiré.');
}
```

## ⏱️ Flux de paiement

1. **Utilisateur clique "Payer"**
   - Initialise le paiement FedaPay
   
2. **Paiement approuvé**
   - Webhook FedaPay → `FedapayWebhookController@handle()`
   - OU Callback → `HomeController@handlePaymentCallback()`
   
3. **Mise à jour utilisateur**
   - `has_paid = true`
   - `payment_expires_at = now() + 2 mois`
   - `has_active_subscription = true`
   
4. **Accès accordé**
   - Utilisateur peut accéder au contenu pendant 2 mois
   
5. **Après 2 mois**
   - Middleware détecte l'expiration
   - `has_paid = false`
   - `has_active_subscription = false`
   - Redirection vers la page de tarification

## 🔍 Tests

### Simuler un paiement
```bash
POST /simulate-payment (nécessite authentification)
```

### Vérifier le statut
```bash
GET /payment/status
```

Réponse :
```json
{
    "success": true,
    "has_paid": true,
    "payment_expires_at": "2026-03-17T10:30:00",
    "days_remaining": 59
}
```

## 📝 Exemples d'utilisation

### Afficher le temps restant dans une vue

```blade
@auth
    @if(auth()->user()->hasAccess())
        <p>Accès actif jusqu'au : {{ auth()->user()->payment_expires_at->format('d/m/Y') }}</p>
        @if(auth()->user()->isExpiringsoon())
            <div class="alert alert-warning">
                ⚠️ Votre abonnement expire dans {{ auth()->user()->getDaysUntilExpiry() }} jour(s)
            </div>
        @endif
    @else
        <p>Votre accès a expiré. <a href="{{ route('pricing') }}">Renouveler</a></p>
    @endif
@endauth
```

### Protéger une route

```php
Route::middleware(['auth', 'verified', 'check.subscription'])->group(function () {
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
});
```

## 🐛 Débogage

### Vérifier l'état d'un utilisateur
```php
$user = User::find(1);
dump($user->has_paid);
dump($user->payment_expires_at);
dump($user->hasAccess());
dump($user->getDaysUntilExpiry());
```

### Logs importants
- Webhook payement reçu
- Utilisateur activé
- Abonnement expiré
- Abonnement expire bientôt

Voir : `storage/logs/laravel.log`

## 📌 Points clés

✅ **Durée fixe** : 2 mois à partir du paiement  
✅ **Automatique** : Aucune intervention manuelle requise  
✅ **Sécurisé** : Vérification à chaque requête  
✅ **Flexible** : Durée modifiable via `$subscription_months`  
✅ **Loggé** : Toutes les actions sont enregistrées  

---

**Pour plus d'infos**, vérifier les fichiers :
- Models: `app/Models/User.php`
- Controllers: `app/Http/Controllers/FedapayWebhookController.php`, `HomeController.php`
- Middleware: `app/Http/Middleware/CheckSubscriptionExpiry.php`
- Commands: `app/Console/Commands/CheckSubscriptionExpiry.php`
