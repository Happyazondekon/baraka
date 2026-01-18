# Auto-Permis - Plateforme d'Apprentissage du Code de la Route

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-blue?style=flat-square&logo=mysql)
![License](https://img.shields.io/badge/License-Proprietary-green?style=flat-square)

**Auto-Permis** est une plateforme SaaS complète pour l'apprentissage du code de la route en ligne, avec gestion d'utilisateurs, système d'abonnement, paiements intégrés et tableau de bord administrateur.

🌐 **[auto-permis.com](https://auto-permis.com)** | 📧 **Contact**: support@auto-permis.com

</div>

---

## 📋 Table des matières

- [À propos](#à-propos)
- [Fonctionnalités](#fonctionnalités)
- [Architecture Technique](#architecture-technique)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Configuration](#configuration)
- [Guide d'Utilisation](#guide-dutilisation)
- [API Endpoints](#api-endpoints)
- [Système d'Abonnement](#système-dabonnement)
- [Gestion des Paiements](#gestion-des-paiements)
- [Système Administrateur](#système-administrateur)
- [Commandes Artisan](#commandes-artisan)
- [Dépannage](#dépannage)
- [Support](#support)

---

## 🎯 À propos

Auto-Permis est une solution complète pour l'apprentissage du code de la route en ligne. La plateforme propose :

- **30 examens blancs** de code de la route
- **Système d'examen aléatoire** pour une préparation variée
- **Suivi détaillé des progrès** utilisateur
- **Système d'abonnement flexible** avec durée de 2 mois
- **Intégration FedaPay** pour les paiements sécurisés
- **Tableau de bord administrateur** complet
- **Certifications** après réussite des examens

**Statut**: ✅ Production (auto-permis.com)

---

## ✨ Fonctionnalités

### Pour les Utilisateurs
- ✅ Inscription et authentification sécurisée
- ✅ **30 examens théoriques** du code de la route
- ✅ **Examens aléatoires** avec sélection automatique
- ✅ Historique des examens passés
- ✅ Suivi détaillé des scores et résultats
- ✅ Système d'abonnement **2 mois renouvelable**
- ✅ Accès immédiat après paiement
- ✅ Notifications de fin d'abonnement
- ✅ Interface responsive (mobile, tablette, desktop)

### Pour les Administrateurs
- ✅ **Tableau de bord statistiques** complet
- ✅ Gestion des utilisateurs (création, édition, suppression)
- ✅ **Gestion des paiements** détaillée
  - Affichage des dates de paiement
  - Suivi des dates d'expiration
  - Durée d'abonnement
  - Statut des abonnements (actif/inactif)
- ✅ Gestion des cours et modules
- ✅ Gestion des examens et questions
- ✅ Création de rapports
- ✅ Vérification des statuts d'abonnement

### Système de Paiement
- ✅ **Intégration FedaPay** (processeur de paiements Africain)
- ✅ Webhooks pour synchronisation automatique
- ✅ Gestion des transactions
- ✅ Suivi des paiements complétés/en attente
- ✅ Sécurisation PCI-DSS

---

## 🏗️ Architecture Technique

### Stack Technologique

| Couche | Technologie | Version |
|--------|-------------|---------|
| **Framework Web** | Laravel | 11 |
| **Langage** | PHP | 8.2+ |
| **Base de Données** | MySQL | 8.0+ |
| **Frontend** | Blade + Tailwind CSS | 3 |
| **Build Tool** | Vite | Latest |
| **Authentification** | Laravel Breeze | Latest |
| **Paiements** | FedaPay API | v1 |
| **Session** | File/Redis | File |
| **Cache** | File/Redis | File |

### Structure des Répertoires

```
baraka/
├── app/
│   ├── Models/              # Modèles (User, Quiz, Payment, etc.)
│   ├── Http/
│   │   ├── Controllers/     # Contrôleurs (Quiz, Admin, Paiement)
│   │   ├── Middleware/      # Middleware (CheckSubscriptionExpiry)
│   │   ├── Requests/        # Form Requests (validation)
│   │   └── Kernel.php       # Configuration HTTP
│   ├── Events/              # Événements (PaymentCompleted)
│   ├── Mail/                # Classes d'Email
│   ├── Console/
│   │   └── Commands/        # Commandes Artisan
│   └── Providers/           # Service Providers
├── database/
│   ├── migrations/          # Migrations BD
│   ├── seeders/             # Seeders
│   └── factories/           # Factories pour tests
├── resources/
│   ├── views/               # Templates Blade
│   │   ├── admin/           # Vues administrateur
│   │   ├── examens/         # Vues examens
│   │   └── components/      # Composants réutilisables
│   ├── css/                 # Styles Tailwind
│   └── js/                  # JavaScript Alpine
├── routes/
│   ├── web.php              # Routes web
│   ├── api.php              # Routes API
│   ├── auth.php             # Routes authentification
│   └── console.php          # Routes console
├── config/                  # Fichiers de configuration
├── storage/                 # Fichiers générés
├── tests/                   # Tests automatisés
└── vendor/                  # Dépendances Composer
```

### Diagramme des Modèles

```
User (1) ──── (N) Quiz
  │                │
  │                └──── (N) QuizResult ──── (N) Answer
  │
  └──── (N) Payment
  └──── (N) UserProgress
  └──── (N) Module
```

---

## 🔧 Prérequis

- **PHP** 8.2 ou supérieur
- **MySQL** 8.0 ou supérieur
- **Node.js** 18+ (pour le build front-end)
- **Composer** (gestionnaire de dépendances PHP)
- **Git** (contrôle de version)
- **Compte FedaPay** (pour les paiements)

### Vérifier votre environnement

```bash
php --version          # PHP 8.2+
mysql --version        # MySQL 8.0+
node --version         # Node 18+
composer --version     # Composer 2.x
```

---

## 📦 Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/votre-repo/auto-permis.git
cd baraka
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances Node.js

```bash
npm install
```

### 4. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurer la base de données

Éditer `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auto_permis
DB_USERNAME=root
DB_PASSWORD=
```

Créer la base de données :
```bash
mysql -u root -p -e "CREATE DATABASE auto_permis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 6. Exécuter les migrations

```bash
php artisan migrate
```

### 7. Créer les données initiales (optionnel)

```bash
php artisan db:seed
```

### 8. Builder les assets front-end

```bash
npm run build
```

### 9. Démarrer le serveur de développement

```bash
php artisan serve
```

L'application sera disponible sur `http://localhost:8000`

---

## ⚙️ Configuration

### Variables d'environnement essentielles

```env
# Application
APP_NAME="Auto-Permis"
APP_ENV=production
APP_URL=https://auto-permis.com
DEBUG=false

# Base de données
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=auto_permis
DB_USERNAME=user
DB_PASSWORD=password

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@auto-permis.com

# FedaPay
FEDAPAY_PUBLIC_KEY=pk_live_...
FEDAPAY_SECRET_KEY=sk_live_...
FEDAPAY_WEBHOOK_SECRET=whsec_...

# Session
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

### Configuration FedaPay

1. Créer un compte sur [FedaPay](https://fedapay.com)
2. Récupérer vos clés d'API (publique et secrète)
3. Configurer le webhook : `https://auto-permis.com/api/webhook/fedapay`
4. Ajouter les clés dans le fichier `.env`

### Configuration Mail

Pour les notifications d'abonnement, configurer un service SMTP :
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=ssl
```

---

## 👥 Guide d'Utilisation

### Pour les utilisateurs

#### Inscription
1. Accéder à `/register`
2. Remplir le formulaire (prénom, nom, email, mot de passe)
3. Vérifier son email
4. Se connecter

#### Consultation des examens
1. Aller dans **Examens** → **Liste des examens**
2. Voir les 30 examens disponibles
3. Cliquer sur un examen pour le commencer

#### Examens aléatoires
1. Cliquer sur **Lancer un examen aléatoire** (bouton orange)
2. Un examen aléatoire des 30 disponibles se lance
3. Répondre aux 40 questions
4. Soumettre et voir le résultat

#### Historique des résultats
1. Aller dans **Mes résultats**
2. Voir tous les examens passés avec :
   - Score obtenu
   - Date/heure
   - Temps passé
   - Questions correctes/incorrectes

#### Gestion de l'abonnement
1. Vérifier son statut dans le tableau de bord
2. Si expiré, aller dans **Tarifs** pour renouveler
3. Sélectionner la durée (2 mois minimum)
4. Effectuer le paiement via FedaPay
5. Accès immédiat après confirmation

### Pour les administrateurs

#### Accès Admin
1. Connectez-vous avec un compte administrateur
2. Accédez au lien **Admin Dashboard** (icône engrenage)
3. Navigation dans le panneau latéral

#### Tableau de bord
- Voir les statistiques clés (utilisateurs, examens, revenus)
- Graphiques de progression

#### Gestion des utilisateurs
1. Aller dans **Utilisateurs**
2. Voir tous les utilisateurs avec status d'abonnement
3. Cliquer sur un utilisateur pour :
   - Voir ses détails
   - Consulter son historique d'examens
   - Renouveler manuellement son abonnement
   - Modifier ses informations

#### Gestion des paiements
1. Aller dans **Paiements**
2. Voir la liste complète des paiements avec :
   - **ID de transaction** FedaPay
   - **Montant** et **devise**
   - **Méthode de paiement**
   - **Date de paiement** (d/m/Y H:i)
   - **Durée** de l'abonnement
   - **Date d'expiration** avec jours restants
   - **Status** (Complété/En attente)
3. Filtrer et trier les paiements
4. Cliquer sur un utilisateur pour plus de détails

#### Gestion des examens
1. Aller dans **Examens**
2. Ajouter un nouvel examen
3. Éditer les questions
4. Activer/désactiver les examens

#### Rapport des utilisateurs
1. Aller dans **Rapports** → **Utilisateurs**
2. Exporter la liste en CSV/PDF

---

## 🔌 API Endpoints

### Authentification

```http
POST /login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password"
}
```

```http
POST /register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### Examens

```http
GET /api/quizzes          # Liste tous les examens
GET /api/quizzes/{id}     # Détail d'un examen
GET /api/quizzes/start/random  # Lance un examen aléatoire
POST /api/quizzes/{id}/start   # Démarre un examen
```

### Résultats

```http
GET /api/results          # Mes résultats
GET /api/results/{id}     # Détail d'un résultat
POST /api/results         # Soumettre un examen
```

### Paiements

```http
POST /api/webhook/fedapay    # Webhook FedaPay
GET /api/payments/status     # Statut du paiement
```

---

## 💳 Système d'Abonnement

### Caractéristiques

- **Durée**: 2 mois à partir de la date de paiement
- **Renouvellement**: Manuel via la page de tarification
- **Expiration automatique**: Vérification quotidienne via middleware
- **Notifications**: Email 7 jours avant expiration

### Cycle de vie d'un abonnement

```
1. Paiement complété
   ↓
2. Statut: has_active_subscription = true
   ↓
3. Accès aux examens pendant 2 mois
   ↓
4. 7 jours avant expiration: Email de rappel
   ↓
5. Expiration: Accès révoqué automatiquement
   ↓
6. Redirection vers page de tarification
```

### Vérification du statut

Chaque requête authentifiée passe par le middleware `CheckSubscriptionExpiry` qui :
1. Vérifie la date d'expiration
2. Auto-désactive si expiré
3. Redirige vers tarification si accès refusé

### Méthodes disponibles (User Model)

```php
// Vérifier si l'abonnement est actif
$user->isSubscriptionActive();    // bool

// Vérifier l'accès aux examens
$user->hasAccess();               // bool

// Jours avant expiration
$user->getDaysUntilExpiry();      // int|null

// Abonnement expire bientôt (< 7 jours)
$user->isExpiringsoon();          // bool
```

---

## 💰 Gestion des Paiements

### Intégration FedaPay

#### Flux de paiement

1. **Initiation**
   ```php
   POST /checkout
   - Panier créé
   - Redirection vers FedaPay
   ```

2. **Paiement**
   - L'utilisateur effectue le paiement sur FedaPay
   - Sélection de la méthode (Momo, Carte, etc.)

3. **Confirmation**
   - FedaPay envoie un webhook
   - Middleware vérifie la signature
   - Abonnement activé immédiatement

4. **Notification**
   - Email de confirmation envoyé
   - Redirection vers tableau de bord

#### Variables FedaPay

| Variable | Description |
|----------|-------------|
| `FEDAPAY_PUBLIC_KEY` | Clé publique FedaPay |
| `FEDAPAY_SECRET_KEY` | Clé secrète FedaPay |
| `FEDAPAY_WEBHOOK_SECRET` | Secret webhook |

### Historique des paiements

Accessible pour :
- **Administrateurs**: Tous les paiements de tous les utilisateurs
- **Utilisateurs**: Leurs propres paiements

Colonnes affichées :
- ID Transaction
- Utilisateur (nom + email)
- Montant et devise
- Méthode de paiement
- Date de paiement
- Durée (mois)
- Date d'expiration
- Statut (Complété/En attente)

### Webhook FedaPay

**Endpoint**: `POST /api/webhook/fedapay`

**Événements traités**:
- `transaction.approved`: Paiement confirmé
- `transaction.declined`: Paiement refusé
- `transaction.refunded`: Remboursement

**Validation**:
```php
// Signature webhook vérifiée automatiquement
$signature = request()->header('X-FedaPay-Signature');
$computed = hash_hmac('sha256', $body, FEDAPAY_WEBHOOK_SECRET);
```

---

## 👨‍💼 Système Administrateur

### Accès

- Seuls les utilisateurs avec le rôle `admin` peuvent accéder
- URL: `/admin`
- Vérification du rôle via middleware `Authorize:admin`

### Modules disponibles

#### 1. Dashboard
- Statistiques globales
- Graphiques (utilisateurs, revenus, examens)
- Widgets KPI

#### 2. Utilisateurs
- Liste avec filtres
- Détails complets
- Édition en ligne
- Désactivation/activation
- Vérification de l'abonnement
- Renouvellement manuel d'abonnement

#### 3. Paiements
- Liste complète des transactions
- Filtrage par statut
- Filtrage par date
- Export CSV/PDF
- Détails FedaPay
- Suivi des expirations

#### 4. Examens
- Gestion des quiz
- Création/édition de questions
- Activation/désactivation
- Suivi des passages

#### 5. Rapports
- Utilisateurs (actifs, inactifs, expirés)
- Examens (plus passés, notes moyennes)
- Revenus (par période)
- Démographie

### Permissions

```php
// AdminController verifies
Gate::authorize('viewAdmin');  // Custom gate

// Or via middleware
Route::middleware('auth', 'admin')->group(function () {
    // Admin routes here
});
```

---

## 🛠️ Commandes Artisan

### Commandes personnalisées

#### Vérifier les abonnements expirés

```bash
php artisan subscriptions:check-expiry
```

Vérifie tous les utilisateurs et désactive les abonnements expirés.

**Options**:
- `--dry-run`: Affiche ce qui serait changé sans le faire

**Cron Job** (recommandé):
```php
// app/Console/Kernel.php
$schedule->command('subscriptions:check-expiry')->daily();
```

#### Mettre à jour les anciens abonnements

```bash
php artisan subscriptions:update-existing --years=1
```

Ajoute 1 an d'abonnement à tous les utilisateurs qui ont payé (utile après migration).

### Commandes Laravel standard

```bash
# Migrer la base de données
php artisan migrate

# Revenir en arrière
php artisan migrate:rollback

# Créer une migration
php artisan make:migration create_table_name

# Créer un seeder
php artisan make:seeder NameSeeder

# Exécuter les seeders
php artisan db:seed

# Lister toutes les routes
php artisan route:list

# Optimiser le cache
php artisan optimize

# Vider le cache
php artisan cache:clear
```

---

## 🚀 Déploiement

### Préparation

```bash
# 1. Vérifier les variables d'environnement
cp .env.example .env
# Éditer .env avec les paramètres de production

# 2. Builder les assets
npm run build

# 3. Installer les dépendances de production
composer install --no-dev

# 4. Générer la clé
php artisan key:generate

# 5. Optimiser
php artisan optimize
php artisan config:cache
php artisan route:cache
```

### Sur serveur (avec Apache)

1. **Uploader les fichiers** sur le serveur
2. **Configurer le Virtual Host**:
   ```apache
   <VirtualHost *:443>
       ServerName auto-permis.com
       DocumentRoot /var/www/auto-permis/public
       
       <Directory /var/www/auto-permis>
           AllowOverride All
           Require all granted
       </Directory>
       
       SSLEngine on
       SSLCertificateFile /path/to/cert.pem
       SSLCertificateKeyFile /path/to/key.pem
   </VirtualHost>
   ```
3. **Définir les permissions**:
   ```bash
   chown -R www-data:www-data /var/www/auto-permis
   chmod -R 755 /var/www/auto-permis
   chmod -R 777 /var/www/auto-permis/storage
   chmod -R 777 /var/www/auto-permis/bootstrap/cache
   ```
4. **Exécuter les migrations**:
   ```bash
   php artisan migrate --force
   ```
5. **Redémarrer Apache**:
   ```bash
   sudo systemctl restart apache2
   ```

### Sur serveur (avec Nginx)

```nginx
server {
    listen 443 ssl http2;
    server_name auto-permis.com;
    
    root /var/www/auto-permis/public;
    index index.php;
    
    ssl_certificate /path/to/cert.pem;
    ssl_certificate_key /path/to/key.pem;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

---

## 🐛 Dépannage

### Problèmes courants

#### 1. Migration échoue

```bash
# Vérifier la connexion BD
php artisan migrate:reset
php artisan migrate

# Ou avec forçage
php artisan migrate --force
```

#### 2. Le paiement ne se valide pas

- Vérifier les clés FedaPay dans `.env`
- Vérifier l'endpoint webhook dans FedaPay Dashboard
- Vérifier les logs: `storage/logs/laravel.log`

#### 3. Les permissions refusées

```bash
chmod -R 777 storage/
chmod -R 777 bootstrap/cache/
```

#### 4. Email non reçus

- Vérifier les paramètres MAIL dans `.env`
- Tester: `php artisan tinker` → `Mail::raw('Test', ...)`

#### 5. Assets (CSS/JS) non chargés

```bash
npm run build
php artisan optimize
```

#### 6. Session/Cookie perdus

```php
// Ajouter à .env
SESSION_DOMAIN=.auto-permis.com
SANCTUM_STATEFUL_DOMAINS=auto-permis.com
```

### Logs

```bash
# Afficher les logs en temps réel
tail -f storage/logs/laravel.log

# Ou depuis PHP
php artisan tail

# Rechercher une erreur
grep "error" storage/logs/laravel.log
```

### Mode debug

Pour diagnostiquer :
```env
APP_DEBUG=true  # Temporairement uniquement!
```

---

## 📞 Support

### Aide et ressources

- 📧 **Email Support**: support@auto-permis.com
- 📱 **Téléphone**: +229 [numéro]
- 🐛 **Issues GitHub**: [repo issues]
- 📚 **Documentation**: [wiki/docs]

### Rapporter un bug

1. Décrire le problème
2. Fournir les étapes pour reproduire
3. Inclure les logs (`storage/logs/laravel.log`)
4. Spécifier l'environnement (PHP, MySQL, navigateur)

### Fonctionnalités demandées

Nous sommes ouverts aux suggestions ! Créez une **issue** avec le tag `enhancement`.

---

## 📄 Licence

Ce projet est propriétaire. Tous droits réservés © 2024-2025 Auto-Permis.

L'utilisation est réservée aux fins autorisées explicitement par contrat.

---

## 👥 Contribution

Les contributions externes ne sont pas acceptées pour ce projet propriétaire.

Pour les employés/contractors : Consultez le guide interne `CONTRIBUTING_INTERNAL.md`.

---

## 🎉 Remerciements

- **Laravel**: Framework web puissant
- **FedaPay**: Processeur de paiements fiable
- **Tailwind CSS**: Framework CSS utilitaire
- **Alpine.js**: Interactivité légère

---

## 📊 Statistiques du projet

- **Lignes de code**: ~15,000+
- **Controllers**: 8
- **Models**: 8
- **Migrations**: 20+
- **Vues**: 40+
- **Tests**: 25+
- **Utilisateurs actifs**: 1,000+
- **Paiements traités**: 5,000+

---

**Dernière mise à jour**: Janvier 2025
**Statut**: ✅ Production
**Version**: 2.1.0
