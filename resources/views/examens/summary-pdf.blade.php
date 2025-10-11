<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Fiche Récapitulative - Examen Code de la Route</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            line-height: 1.4;
            color: #333;
        }
        .header-table {
            width: 100%;
            border: none;
            margin-bottom: 30px;
            border-collapse: collapse;
        }
        .header-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }
        .logo-cell {
            width: 90px;
            text-align: center;
            padding-right: 15px;
        }
        .header-info {
            padding-left: 0;
        }
        .header-info h2 {
            margin: 0 0 5px 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        .header-info p {
            margin: 0;
            font-size: 13px;
            color: #666;
        }
        .report-title {
            text-align: center;
            margin: 25px 0 20px 0;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 2px solid #3e60d5;
            padding-bottom: 8px;
        }
        .section-title {
            margin: 20px 0 15px 0;
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .user-info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .user-info-table td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            font-size: 11px;
        }
        .user-info-table td:first-child {
            background-color: #f0f0f0;
            font-weight: bold;
            width: 30%;
            color: #2c3e50;
        }
        .stats-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .stats-table td {
            border: 1px solid #ddd;
            padding: 12px 8px;
            text-align: center;
            width: 33.33%;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 10px;
            color: #666;
            display: block;
        }
        .score-passed {
            color: #10B981;
        }
        .score-failed {
            color: #EF4444;
        }
        .score-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }
        .score-bar-container {
            position: relative;
            height: 20px;
            background: #e5e7eb;
            border-radius: 10px;
            margin: 10px 0;
            overflow: hidden;
        }
        .score-bar-fill {
            height: 100%;
            border-radius: 10px;
        }
        .score-bar-passed {
            background: linear-gradient(90deg, #10B981, #059669);
        }
        .score-bar-failed {
            background: linear-gradient(90deg, #EF4444, #DC2626);
        }
        .score-labels {
            width: 100%;
            margin-top: 5px;
        }
        .score-labels td {
            font-size: 10px;
            color: #666;
            border: none;
        }
        .score-labels td:first-child {
            text-align: left;
        }
        .score-labels td:nth-child(2) {
            text-align: center;
            font-weight: bold;
        }
        .score-labels td:last-child {
            text-align: right;
        }
        .questions-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .questions-table th,
        .questions-table td {
            border: 1px solid #ddd;
            padding: 8px 6px;
            font-size: 11px;
        }
        .questions-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
        }
        .questions-table td:first-child {
            width: 5%;
            text-align: center;
            font-weight: bold;
        }
        .questions-table td:nth-child(2) {
            width: 40%;
            text-align: left;
            padding-left: 10px;
        }
        .questions-table td:nth-child(3),
        .questions-table td:nth-child(4) {
            width: 25%;
            text-align: left;
            padding-left: 8px;
        }
        .status-correct {
            color: #10B981;
            font-weight: bold;
        }
        .status-incorrect {
            color: #EF4444;
            font-weight: bold;
        }
        .answer-correct {
            color: #10B981;
            font-weight: bold;
        }
        .answer-incorrect {
            color: #EF4444;
        }
        .multiple-choice-badge {
            background: #DBEAFE;
            color: #3B82F6;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
            display: inline-block;
            margin-left: 5px;
        }
        .summary-grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .summary-grid td {
            width: 50%;
            vertical-align: top;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f8f9fa;
        }
        .summary-grid h3 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #2c3e50;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .summary-grid p {
            margin: 5px 0;
            font-size: 11px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 10px;
        }
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <table class="header-table">
        <tr>
            <td class="logo-cell">
                <img src="{{ public_path('images/AutoPermis.png') }}" style="height: 80px;" alt="AutoPermis">
            </td>
            <td class="header-info">
                <h2>AutoPermis - École de Conduite</h2>
                <p>Formation au Code de la Route</p>
                <p>Plateforme d'apprentissage et d'évaluation</p>
            </td>
        </tr>
    </table>

    <!-- Title -->
    <h2 class="report-title">Fiche Récapitulative - Examen Code de la Route</h2>

    <!-- Informations de l'utilisateur -->
    <h2 class="section-title">Informations du Candidat</h2>
    <table class="user-info-table">
        <tr>
            <td>Nom du candidat</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Date de l'examen</td>
            <td>{{ $result->created_at->format('d/m/Y à H:i') }}</td>
        </tr>
        @if($exam)
        <tr>
            <td>Type d'examen</td>
            <td>{{ $exam->title }}</td>
        </tr>
        @else
        <tr>
            <td>Type d'examen</td>
            <td>Examen Blanc Aléatoire</td>
        </tr>
        @endif
        <tr>
            <td>Temps passé</td>
            <td>{{ gmdate('i:s', $result->time_taken) }} minutes</td>
        </tr>
    </table>

    <!-- Statistiques principales -->
    <h2 class="section-title">Résultats Globaux</h2>
    <table class="stats-table">
        <tr>
            <td>
                <span class="stat-value {{ $display_passed ? 'score-passed' : 'score-failed' }}">
                    {{ $result->score }}%
                </span>
                <span class="stat-label">Score Final</span>
                <span class="stat-label" style="font-weight: bold; margin-top: 5px; display: block;">
                    {{ $display_passed ? 'RÉUSSI ✓' : 'ÉCHOUÉ ✗' }}
                </span>
            </td>
            <td>
                <span class="stat-value score-passed">{{ $display_correct_answers }}</span>
                <span class="stat-label">Bonnes Réponses</span>
            </td>
            <td>
                <span class="stat-value score-failed">{{ $display_wrong_answers }}</span>
                <span class="stat-label">Mauvaises Réponses</span>
            </td>
        </tr>
    </table>

    <!-- Résumé détaillé -->
    <h2 class="section-title">Analyse Détaillée</h2>
    <table class="summary-grid">
        <tr>
            <td>
                <h3>Détails des Réponses</h3>
                <p><strong>Total des questions :</strong> {{ $result->total_questions }}</p>
                <p><strong>Réponses correctes :</strong> {{ $display_correct_answers }}</p>
                <p><strong>Réponses incorrectes :</strong> {{ $display_wrong_answers }}</p>
                <p><strong>Taux de réussite :</strong> {{ $result->score }}%</p>
            </td>
            <td>
                <h3>Seuil de Réussite</h3>
                <p><strong>Score minimum requis :</strong> 70%</p>
                <p><strong>Votre score :</strong> {{ $result->score }}%</p>
                <p><strong>Écart :</strong> {{ $result->score - 70 > 0 ? '+' : '' }}{{ $result->score - 70 }}%</p>
                <p><strong>Statut :</strong> 
                    <span style="color: {{ $display_passed ? '#10B981' : '#EF4444' }}; font-weight: bold;">
                        {{ $display_passed ? 'RÉUSSI' : 'ÉCHOUÉ' }}
                    </span>
                </p>
            </td>
        </tr>
    </table>

    <!-- Barre de progression du score -->
    <div class="score-section">
        <strong>Progression du Score</strong>
        <div class="score-bar-container">
            <div class="score-bar-fill {{ $display_passed ? 'score-bar-passed' : 'score-bar-failed' }}" 
                 style="width: {{ $result->score }}%"></div>
        </div>
        <table class="score-labels">
            <tr>
                <td>0%</td>
                <td style="color: {{ $display_passed ? '#10B981' : '#EF4444' }};">
                    Seuil : 70%
                </td>
                <td>100%</td>
            </tr>
        </table>
        <div style="text-align: center; font-size: 11px; font-weight: bold; margin-top: 5px;">
            Score obtenu : {{ $result->score }}% ({{ $result->correct_answers }}/{{ $result->total_questions }})
        </div>
    </div>

    <!-- Détail des questions -->
    <h2 class="section-title">Détail des Questions</h2>
    <table class="questions-table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Question</th>
                <th>Vos réponses</th>
                <th>Bonnes réponses</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Générer les détails des résultats depuis les questions et userAnswers
                $detailedResultsForPdf = [];
                foreach($questions as $index => $question) {
                    $userAnswerIds = $userAnswers[$question->id] ?? [];
                    if (!is_array($userAnswerIds)) {
                        $userAnswerIds = [$userAnswerIds];
                    }
                    
                    $correctAnswerIds = $question->answers->where('is_correct', true)->pluck('id')->toArray();
                    
                    // Vérifier si la réponse est correcte
                    $allCorrectSelected = count(array_intersect($userAnswerIds, $correctAnswerIds)) === count($correctAnswerIds);
                    $noIncorrectSelected = count(array_diff($userAnswerIds, $correctAnswerIds)) === 0;
                    $isCorrect = $allCorrectSelected && $noIncorrectSelected && count($userAnswerIds) > 0;
                    
                    $userAnswersText = [];
                    $correctAnswersText = [];
                    
                    foreach($question->answers as $answer) {
                        if(in_array($answer->id, $userAnswerIds)) {
                            $userAnswersText[] = $answer->answer_text;
                        }
                        if($answer->is_correct) {
                            $correctAnswersText[] = $answer->answer_text;
                        }
                    }
                    
                    $detailedResultsForPdf[] = [
                        'question_text' => $question->question_text,
                        'is_correct' => $isCorrect,
                        'is_multiple_choice' => count($correctAnswerIds) > 1,
                        'user_answers_text' => $userAnswersText,
                        'correct_answers_text' => $correctAnswersText,
                    ];
                }
            @endphp
            
            @foreach($detailedResultsForPdf as $index => $resultItem)
            <tr>
                <td>
                    <span class="{{ $resultItem['is_correct'] ? 'status-correct' : 'status-incorrect' }}">
                        {{ $index + 1 }}
                        {{ $resultItem['is_correct'] ? '✓' : '✗' }}
                    </span>
                </td>
                <td>
                    {{ $resultItem['question_text'] }}
                    @if($resultItem['is_multiple_choice'])
                    <span class="multiple-choice-badge">CHOIX MULTIPLES</span>
                    @endif
                </td>
                <td class="{{ $resultItem['is_correct'] ? 'answer-correct' : 'answer-incorrect' }}">
                    @if(count($resultItem['user_answers_text']) > 0)
                        {{ implode(', ', $resultItem['user_answers_text']) }}
                    @else
                        <em style="color: #999;">Non répondu</em>
                    @endif
                </td>
                <td class="answer-correct">
                    {{ implode(', ', $resultItem['correct_answers_text']) }}
                </td>
            </tr>
            @if(($index + 1) % 15 == 0 && $index + 1 < count($detailedResultsForPdf))
            </tbody>
        </table>
        <div class="page-break"></div>
        <table class="questions-table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Question</th>
                    <th>Vos réponses</th>
                    <th>Bonnes réponses</th>
                </tr>
            </thead>
            <tbody>
            @endif
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p><strong>Généré le {{ now()->format('d/m/Y à H:i') }} - AutoPermis - Votre partenaire code de la route</strong></p>
        <p>Ce document est une fiche récapitulative de votre examen et n'a pas de valeur officielle.</p>
        <p>Pour toute question, contactez-nous sur notre plateforme.</p>
    </div>
</body>
</html>