# ✅ Configuration Système de Durée d'Abonnement - COMPLÉTÉE

## 📊 Résumé des modifications

### 1. **Base de données** ✅
Migration créée : `2026_01_17_000000_add_subscription_expiry_to_users_table.php`

Nouvelles colonnes dans `users` :
- `payment_expires_at` (timestamp nullable) - Date d'expiration de l'accès
- `subscription_months` (integer, défaut 2) - Durée de l'abonnement
- `has_active_subscription` (boolean, défaut false) - État actuel de l'abonnement

### 2. **Modèle User** ✅
Fichier : `app/Models/User.php`

Nouvelles méthodes :
- `isSubscriptionActive()` - Vérifie si l'abonnement est actif
- `hasAccess()` - Alias pour vérifier l'autorisation d'accès
- `getDaysUntilExpiry()` - Nombre de jours avant expiration
- `isExpiringsoon()` - Vérifie si < 7 jours avant expiration

Nouveaux casts :
- `paid_at` → datetime
- `payment_expires_at` → datetime
- `has_active_subscription` → boolean

### 3. **Contrôleurs** ✅
Modifiés 3 fichiers :

**FedapayWebhookController**
- Ajoute `payment_expires_at` (now + 2 mois)
- Ajoute `subscription_months = 2`
- Active `has_active_subscription`

**HomeController**
- `handlePaymentCallback()` - Même logique que webhook
- `simulatePaymentWebhook()` - Simulation pour tests

### 4. **Middleware** ✅
Fichier créé : `app/Http/Middleware/CheckSubscriptionExpiry.php`

Fonctionnalités :
- Vérifie chaque requête authentifiée
- Désactive automatiquement les accès expirés
- Enregistre les avertissements
- Redirige vers tarification si accès refusé

Enregistré dans :
- `app/Http/Kernel.php` - Groupe middleware web
- Alias : `check.subscription`

### 5. **Commandes Artisan** ✅
2 commandes créées :

**`php artisan subscriptions:check-expiry`**
- Vérifie l'état de tous les abonnements
- Désactive les expirations
- Affiche rapport détaillé

**`php artisan subscriptions:update-existing`**
- Met à jour utilisateurs existants
- Ajoute dates d'expiration
- Option : `--years=X` (défaut 1)

### 6. **Documentation** ✅
Fichier créé : `SUBSCRIPTION_SYSTEM.md`
- Guide complet du système
- Exemples d'utilisation
- Configuration du scheduler
- Débogage

---

## 🚀 Flux de paiement (2 mois d'accès)

```
Utilisateur paie
    ↓
FedaPay approuve
    ↓
Webhook reçu / Callback
    ↓
Utilisateur mis à jour :
  - has_paid = true
  - paid_at = now()
  - payment_expires_at = now() + 2 mois
  - subscription_months = 2
  - has_active_subscription = true
    ↓
Accès pendant 2 mois
    ↓
Après 2 mois :
  - Middleware détecte expiration
  - has_paid = false
  - has_active_subscription = false
  - Redirection vers tarification
```

---

## 📁 Fichiers modifiés

1. ✅ `app/Models/User.php` - Méthodes + casts
2. ✅ `app/Http/Controllers/FedapayWebhookController.php` - Ajout 2 mois
3. ✅ `app/Http/Controllers/HomeController.php` - Callback + simulation
4. ✅ `app/Http/Middleware/CheckSubscriptionExpiry.php` - Nouveau middleware
5. ✅ `app/Http/Kernel.php` - Enregistrement middleware
6. ✅ `database/migrations/2026_01_17_000000_add_subscription_expiry_to_users_table.php` - Nouvelle migration
7. ✅ `app/Console/Commands/CheckSubscriptionExpiry.php` - Commande vérification
8. ✅ `app/Console/Commands/UpdateExistingSubscriptions.php` - Commande mise à jour

---

## 🔧 Configuration optionnelle

### Scheduler (cronjob) - `app/Console/Kernel.php`

```php
protected function schedule(Schedule $schedule)
{
    // Vérifier les abonnements tous les jours
    $schedule->command('subscriptions:check-expiry')->daily();
}
```

### Modifier la durée

Changer le nombre de mois dans :
- `FedapayWebhookController::handle()` - ligne `addMonths(2)`
- `HomeController::handlePaymentCallback()` - ligne `addMonths(2)`
- `HomeController::simulatePaymentWebhook()` - ligne `addMonths(2)`

Ou modifier la valeur par défaut dans la migration.

---

## ✨ Utilisation

### Vérifier l'accès dans les vues

```blade
@if(auth()->user()->hasAccess())
    <!-- Contenu accessible -->
@else
    <a href="{{ route('pricing') }}">Renouveler l'accès</a>
@endif
```

### Vérifier dans les contrôleurs

```php
if (!auth()->user()->hasAccess()) {
    return redirect()->route('pricing')
        ->with('error', 'Votre abonnement a expiré');
}
```

### Afficher temps restant

```blade
@if(auth()->user()->has_paid)
    Accès jusqu'au : {{ auth()->user()->payment_expires_at->format('d/m/Y') }}
    
    @if(auth()->user()->isExpiringsoon())
        ⚠️ Expire dans {{ auth()->user()->getDaysUntilExpiry() }} jour(s)
    @endif
@endif
```

---

## 🧪 Tests

1. **Simuler un paiement** :
   ```bash
   POST /simulate-payment
   ```

2. **Vérifier le statut** :
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

3. **Vérifier les expiration** :
   ```bash
   php artisan subscriptions:check-expiry
   ```

---

## 📌 Points clés

✅ **2 mois** d'accès à partir du paiement  
✅ **Automatique** - Aucune intervention manuelle  
✅ **Sécurisé** - Vérification middleware  
✅ **Flexible** - Durée configurable  
✅ **Loggé** - Tous les événements enregistrés  
✅ **Prêt** - Prêt pour la production  

---

## 🆘 Troubleshooting

### Utilisateurs existants sans date d'expiration

```bash
php artisan subscriptions:update-existing --years=1
```

### Réinitialiser tout (développement)

```bash
php artisan migrate:refresh
```

### Vérifier les logs

```bash
tail -f storage/logs/laravel.log | grep -i "subscription\|payment"
```

---

**Configuration complétée le 17 janvier 2026** ✅
