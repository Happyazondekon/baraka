<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fiche Récapitulative - Examen Code de la Route</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #3B82F6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #1E40AF;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .header .subtitle {
            color: #6B7280;
            font-size: 16px;
        }
        .user-info {
            background: #F3F4F6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }
        .stat-card {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 14px;
            color: #6B7280;
        }
        .score-section {
            background: #F8FAFC;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        .score-bar {
            height: 20px;
            background: #E5E7EB;
            border-radius: 10px;
            margin: 10px 0;
            overflow: hidden;
        }
        .score-fill {
            height: 100%;
            border-radius: 10px;
        }
        .passed { background: linear-gradient(90deg, #10B981, #059669); }
        .failed { background: linear-gradient(90deg, #EF4444, #DC2626); }
        .questions-section {
            margin-top: 30px;
        }
        .question-item {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            page-break-inside: avoid;
        }
        .question-header {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .question-status {
            width: 30px;
            height: 30px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            flex-shrink: 0;
            color: white;
            font-weight: bold;
        }
        .correct { background: #10B981; }
        .incorrect { background: #EF4444; }
        .question-text {
            font-weight: bold;
            flex: 1;
        }
        .answers {
            margin-left: 40px;
        }
        .user-answer {
            color: #EF4444;
            font-weight: bold;
        }
        .correct-answer {
            color: #10B981;
            font-weight: bold;
        }
        .explanation {
            background: #DBEAFE;
            padding: 10px;
            border-radius: 6px;
            margin-top: 10px;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
            color: #6B7280;
            font-size: 12px;
        }
        .page-break {
            page-break-before: always;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }
        .summary-card {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Fiche Récapitulative - Examen Code de la Route</h1>
        <div class="subtitle">Résultats détaillés de votre examen</div>
    </div>

    <div class="user-info">
        <strong>Nom :</strong> {{ $user->name }}<br>
        <strong>Email :</strong> {{ $user->email }}<br>
        <strong>Date de l'examen :</strong> {{ $result->created_at->format('d/m/Y à H:i') }}<br>
        @if($exam)
        <strong>Examen :</strong> {{ $exam->title }}<br>
        @endif
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-value {{ $display_passed ? 'text-green-600' : 'text-red-600' }}">
                {{ $result->score }}%
            </div>
            <div class="stat-label">Score Final</div>
            <div>{{ $display_passed ? 'Réussi' : 'Échoué' }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $display_correct_answers }}</div>
            <div class="stat-label">Bonnes Réponses</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $display_wrong_answers }}</div>
            <div class="stat-label">Mauvaises Réponses</div>
        </div>
    </div>

    <div class="summary-grid">
        <div class="summary-card">
            <h3>Détails des Réponses</h3>
            <p><strong>Total des questions :</strong> {{ $result->total_questions }}</p>
            <p><strong>Réponses correctes :</strong> {{ $display_correct_answers }}</p>
            <p><strong>Réponses incorrectes :</strong> {{ $display_wrong_answers }}</p>
            <p><strong>Temps passé :</strong> {{ gmdate('i:s', $result->time_taken) }}</p>
        </div>
        <div class="summary-card">
            <h3>Seuil de Réussite</h3>
            <p><strong>Score minimum requis :</strong> 70%</p>
            <p><strong>Votre score :</strong> {{ $result->score }}%</p>
            <p><strong>Statut :</strong> 
                <span style="color: {{ $display_passed ? '#10B981' : '#EF4444' }}; font-weight: bold;">
                    {{ $display_passed ? 'RÉUSSI' : 'ÉCHOUÉ' }}
                </span>
            </p>
        </div>
    </div>

    <div class="score-section">
        <h3>Progression du Score</h3>
        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
            <span>0%</span>
            <span style="color: {{ $display_passed ? '#10B981' : '#EF4444' }}; font-weight: bold;">
                Seuil : 70%
            </span>
            <span>100%</span>
        </div>
        <div class="score-bar">
            <div class="score-fill {{ $display_passed ? 'passed' : 'failed' }}" 
                 style="width: {{ $result->score }}%"></div>
        </div>
        <div style="text-align: center; margin-top: 5px;">
            Score obtenu : {{ $result->score }}% ({{ $result->correct_answers }}/{{ $result->total_questions }})
        </div>
    </div>

    <div class="questions-section">
        <h3>Détail des Questions</h3>
        
        @foreach($detailedResults as $index => $resultItem)
            <div class="question-item">
                <div class="question-header">
                    <div class="question-status {{ $resultItem['is_correct'] ? 'correct' : 'incorrect' }}">
                        {{ $resultItem['is_correct'] ? '✓' : '✗' }}
                    </div>
                    <div class="question-text">
                        <strong>Question {{ $index + 1 }}:</strong> {{ $resultItem['question_text'] }}
                    </div>
                </div>
                
                <div class="answers">
                    <p><strong>Vos réponses :</strong> 
                        <span class="user-answer">
                            @if(count($resultItem['user_answers_text']) > 0)
                                {{ implode(', ', $resultItem['user_answers_text']) }}
                            @else
                                <em>Aucune réponse sélectionnée</em>
                            @endif
                        </span>
                    </p>
                    
                    @if(!$resultItem['is_correct'])
                    <p><strong>Bonnes réponses :</strong> 
                        <span class="correct-answer">
                            {{ implode(', ', $resultItem['correct_answers_text']) }}
                        </span>
                    </p>
                    @endif
                    
                    @if($resultItem['is_multiple_choice'])
                    <p><small style="color: #3B82F6;">● Question à réponses multiples</small></p>
                    @endif
                </div>
            </div>
            
            @if(($index + 1) % 5 == 0)
                <div class="page-break"></div>
            @endif
        @endforeach
    </div>

    <div class="footer">
        <p>Généré le {{ now()->format('d/m/Y à H:i') }} - AutoPermis - Votre partenaire code de la route</p>
        <p>Ce document est une fiche récapitulative de votre examen et n'a pas de valeur officielle.</p>
    </div>
</body>
</html>