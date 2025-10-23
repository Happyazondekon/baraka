<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Demande de Cours Pratique - Auto-Permis</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }
        
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .header-table {
            width: 100%;
            border: none;
            border-collapse: collapse;
            background: white;
            padding: 20px;
            border-bottom: 2px solid #3e60d5;
        }
        
        .header-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }
        
        .logo-cell {
            width: 80px;
            text-align: center;
            padding-right: 20px;
        }
        
        .header-info {
            padding-left: 0;
        }
        
        .header-info h2 {
            margin: 0 0 5px 0;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .header-info p {
            margin: 0;
            font-size: 13px;
            color: #666;
        }
        
        .report-title {
            text-align: center;
            margin: 25px 0 20px 0;
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 2px solid #3e60d5;
            padding-bottom: 10px;
        }
        
        .section-title {
            margin: 25px 0 15px 0;
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
            padding-left: 20px;
            padding-right: 20px;
        }
        
        .content {
            padding: 0 20px 20px 20px;
        }
        
        .user-info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        
        .user-info-table td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            font-size: 14px;
        }
        
        .user-info-table td:first-child {
            background-color: #f0f0f0;
            font-weight: bold;
            width: 35%;
            color: #2c3e50;
        }
        
        .info-grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        
        .info-grid td {
            width: 50%;
            vertical-align: top;
            padding: 15px;
            border: 1px solid #ddd;
            background: #f8f9fa;
        }
        
        .info-grid h3 {
            margin: 0 0 12px 0;
            font-size: 15px;
            color: #2c3e50;
            border-bottom: 1px solid #ddd;
            padding-bottom: 6px;
        }
        
        .info-grid p {
            margin: 8px 0;
            font-size: 14px;
        }
        
        .info-label {
            font-weight: 600;
            color: #2c3e50;
            display: inline-block;
            width: 120px;
        }
        
        .info-value {
            color: #374151;
        }
        
        .notes-section {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
        }
        
        .notes-label {
            font-size: 14px;
            font-weight: 600;
            color: #0369a1;
            margin-bottom: 8px;
        }
        
        .notes-content {
            color: #0c4a6e;
            line-height: 1.5;
            font-size: 14px;
        }
        
        .actions-section {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 6px;
            padding: 18px;
            margin-top: 25px;
        }
        
        .actions-label {
            font-weight: 600;
            color: #166534;
            margin-bottom: 10px;
            font-size: 15px;
        }
        
        .actions-list {
            color: #15803d;
            font-size: 13px;
            line-height: 1.5;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 12px;
            background: #f8f9fa;
        }
        
        .badge {
            display: inline-block;
            background: #3e60d5;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin: 20px;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3e60d5, #2c3e50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
            margin-right: 15px;
        }
        
        .user-header {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .user-details {
            flex: 1;
        }
        
        .user-name {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 4px;
        }
        
        .user-email {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header identique au PDF -->
        <table class="header-table">
            <tr>
                <td class="logo-cell">
    <svg width="60" height="60" viewBox="0 0 60 60" style="display: block; margin: 0 auto;">
        <rect width="60" height="60" fill="#3e60d5" rx="8"/>
        <text x="30" y="25" text-anchor="middle" fill="white" font-weight="bold" font-size="10">AUTO</text>
        <text x="30" y="38" text-anchor="middle" fill="white" font-weight="bold" font-size="10">PERMIS</text>
    </svg>
</td>
                <td class="header-info">
                    <h2>Auto-Permis - École de Conduite</h2>
                    <p>Formation au Code de la Route</p>
                    <p>Plateforme d'apprentissage et d'évaluation</p>
                </td>
            </tr>
        </table>

        <!-- Titre principal -->
        <h2 class="report-title">Nouvelle Demande de Cours Pratique</h2>

        <div class="content">
            <!-- Badge de statut -->
            <div style="text-align: center;">
                <div class="badge">📅 DEMANDE REÇUE - EN ATTENTE DE CONFIRMATION</div>
            </div>

            <!-- En-tête utilisateur -->
            <div class="user-header">
                <div class="user-avatar">
                    {{ strtoupper(substr($data['user_name'], 0, 1)) }}
                </div>
                <div class="user-details">
                    <div class="user-name">{{ $data['user_name'] }}</div>
                    <div class="user-email">{{ $data['user_email'] }}</div>
                </div>
            </div>

            <!-- Informations de la demande -->
            <h2 class="section-title">Informations de la Demande</h2>
            <table class="user-info-table">
                <tr>
                    <td>Nom du candidat</td>
                    <td>{{ $data['user_name'] }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $data['user_email'] }}</td>
                </tr>
                <tr>
                    <td>Date souhaitée</td>
                    <td>{{ $data['lesson_date'] }}</td>
                </tr>
                <tr>
                    <td>Heure souhaitée</td>
                    <td>{{ $data['lesson_time'] }}</td>
                </tr>
                <tr>
                    <td>Lieu de rendez-vous</td>
                    <td>{{ $data['location'] }}</td>
                </tr>
                <tr>
                    <td>Type de cours</td>
                    <td><strong>Cours pratique de conduite</strong></td>
                </tr>
            </table>

            <!-- Grille d'informations complémentaires -->
            <table class="info-grid">
                <tr>
                    <td>
                        <h3>📋 Détails de la Session</h3>
                        <p><span class="info-label">Type:</span> <span class="info-value">Cours pratique</span></p>
                        <p><span class="info-label">Durée estimée:</span> <span class="info-value">1-2 heures</span></p>
                        <p><span class="info-label">Niveau:</span> <span class="info-value">À déterminer</span></p>
                    </td>
                    <td>
                        <h3>👤 Profil Élève</h3>
                        <p><span class="info-label">Statut:</span> <span class="info-value">En formation</span></p>
                        <p><span class="info-label">Contact:</span> <span class="info-value">{{ $data['user_email'] }}</span></p>
                        <p><span class="info-label">Demande reçue:</span> <span class="info-value">{{ now()->format('d/m/Y à H:i') }}</span></p>
                    </td>
                </tr>
            </table>

            <!-- Notes supplémentaires -->
            @if($data['notes'])
            <h2 class="section-title">Notes Supplémentaires</h2>
            <div class="notes-section">
                <div class="notes-label">📝 Commentaires de l'élève :</div>
                <div class="notes-content">{{ $data['notes'] }}</div>
            </div>
            @endif

            <!-- Actions recommandées -->
            <h2 class="section-title">Actions à Entreprendre</h2>
            <div class="actions-section">
                <div class="actions-label">💡 Actions recommandées :</div>
                <div class="actions-list">
                    • <strong>Vérifier la disponibilité</strong> pour le {{ $data['lesson_date'] }} à {{ $data['lesson_time'] }}<br>
                    • <strong>Contacter l'élève</strong> sous 24 heures pour confirmation<br>
                    • <strong>Préparer le véhicule</strong> d'apprentissage<br>
                    • <strong>Planifier l'itinéraire</strong> depuis {{ $data['location'] }}<br>
                    • <strong>Confirmer la réservation</strong> par email
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Généré le {{ now()->format('d/m/Y à H:i') }} - Auto-Permis - Votre partenaire code de la route</strong></p>
            <p>Cette demande a été générée automatiquement depuis votre plateforme d'apprentissage.</p>
            <p>Pour toute question, connectez-vous à votre espace moniteur.</p>
        </div>
    </div>
</body>
</html>