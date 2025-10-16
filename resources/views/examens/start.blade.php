@extends('layouts.app')

@section('title', 'Examen Blanc - Code de la Route')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-blue-200">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1 mb-4 lg:mb-0">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Examen Blanc - Code de la Route</h1>
                    <p class="text-gray-600">Question <span id="currentQuestionNumber">1</span> sur {{ $questions->count() }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-50 rounded-xl px-4 py-2 text-center">
                        <div class="text-xl font-bold text-blue-700" id="timer">30:00</div>
                        <div class="text-xs text-blue-600">Temps restant</div>
                    </div>
                    <div class="bg-green-50 rounded-xl px-4 py-2 text-center">
                        <div class="text-xl font-bold text-green-700" id="progressCounter">0/{{ $questions->count() }}</div>
                        <div class="text-xs text-green-600">Répondues</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Question Card -->
        <form action="{{ $exam ? route('examens.submit.specific', $exam) : route('examens.submit') }}" method="POST" id="examForm">
            @csrf
            <input type="hidden" name="time_taken" id="timeTaken" value="0">
            <input type="hidden" name="all_answers" id="allAnswers" value="{}">
            
            <div class="space-y-6" id="questionsContainer">
                @foreach($questions as $index => $question)
                @php
                    $correctAnswersCount = $question->answers->where('is_correct', true)->count();
                    $isMultipleChoice = $correctAnswersCount > 1;
                @endphp
                <div class="question-card bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden transition-all duration-300 {{ $index === 0 ? 'current-question' : 'hidden' }}" 
                     data-question-id="{{ $question->id }}" 
                     data-question-index="{{ $index }}">
                    
                    <!-- Question Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="bg-white bg-opacity-20 rounded-lg px-3 py-1 text-sm font-bold mr-3">
                                    Question {{ $index + 1 }}
                                </span>
                                <span class="text-blue-100 text-sm">
                                    @if($isMultipleChoice)
                                        Plusieurs réponses possibles
                                    @else
                                        Une seule réponse
                                    @endif
                                </span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <!-- Indicateur de statut audio -->
                                <div id="audioStatus{{ $index }}" class="text-blue-100 text-sm hidden">
                                    <span class="animate-pulse">Lecture en cours...</span>
                                </div>
                                <button type="button" 
                                        onclick="readCurrentQuestion()"
                                        id="ttsButton{{ $index }}"
                                        class="tts-button p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-all duration-300"
                                        title="Réécouter la question">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Question Content -->
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row gap-6 mb-6">
                            <div class="flex-1">
                                <!-- Question cachée visuellement mais disponible pour la synthèse vocale -->
                                <p class="text-lg font-semibold text-gray-800 leading-relaxed mb-4 question-text sr-only">
                                    {{ $question->question_text }}
                                </p>
                                
                                <!-- Message informatif -->
                                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-blue-700 font-medium">
                                            Écoutez attentivement la question et les réponses. La lecture automatique se fera deux fois.
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Answers -->
                                <div class="space-y-3 answers-container">
                                    @php
                                        $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                                    @endphp
                                    @foreach($question->answers as $answerIndex => $answer)
                                    <label class="flex items-start p-4 rounded-xl border-2 border-gray-200 hover:border-blue-400 hover:bg-blue-50 cursor-pointer transition-all duration-200 answer-label"
                                           data-answer-id="{{ $answer->id }}">
                                        <input type="{{ $isMultipleChoice ? 'checkbox' : 'radio' }}" 
                                               name="current_answer" 
                                               value="{{ $answer->id }}" 
                                               class="mt-1 text-blue-500 focus:ring-blue-500 transform scale-125 answer-input"
                                               data-is-multiple="{{ $isMultipleChoice ? 'true' : 'false' }}"
                                               onchange="handleAnswerSelection(this)">
                                        <div class="ml-4 flex items-start flex-1">
                                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-bold text-sm mr-4 flex-shrink-0 answer-letter">
                                                {{ $letters[$answerIndex] }}
                                            </span>
                                            <span class="text-gray-700 leading-relaxed font-medium answer-text">
                                                {{ $answer->answer_text }}
                                            </span>
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            
                            @if($question->image)
                            <div class="flex-shrink-0 lg:w-64">
                                <div class="border-2 border-gray-300 rounded-xl overflow-hidden p-2 bg-white shadow-sm">
                                    <img src="{{ asset('storage/' . $question->image) }}" 
                                         alt="Image pour la question n°{{ $index + 1 }}" 
                                         class="w-full h-48 object-contain rounded-lg">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Navigation Footer -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                @if($isMultipleChoice)
                                Cochez toutes les réponses correctes
                                @else
                                Sélectionnez une seule réponse
                                @endif
                            </div>
                            <button type="button" 
                                    onclick="nextQuestion()" 
                                    id="nextButton{{ $index }}"
                                    class="next-btn px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-xl transition-all duration-300 disabled:bg-gray-400 disabled:cursor-not-allowed"
                                    disabled>
                                {{ $index === $questions->count() - 1 ? 'Terminer l\'examen' : 'Question suivante' }}
                                <svg class="w-4 h-4 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Submit Section (hidden until last question) -->
            <div id="submitSection" class="hidden mt-8 bg-white rounded-2xl shadow-lg p-6 border border-green-200">
                <div class="text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Examen terminé !</h3>
                    <p class="text-gray-600 mb-6">Vous avez répondu à toutes les questions. Cliquez sur le bouton ci-dessous pour valider votre examen.</p>
                    <button type="submit" 
                            class="px-8 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl">
                        Valider l'examen
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// ==============================================================
// GESTION DE L'EXAMEN EN TEMPS RÉEL - CORRIGÉ
// ==============================================================

let examData = {
    startTime: Date.now(),
    currentQuestionIndex: 0,
    totalQuestions: {{ $questions->count() }},
    answers: {},
    timerInterval: null,
    timeLimit: {{ $timeLimit ?? 30 }} * 60,
    remainingTime: {{ $timeLimit ?? 30 }} * 60,
    speechAttempts: 0,
    examSubmitted: false,
    isReading: false,
    audioFinished: {} // Suivi des questions dont l'audio est terminé
};

// Initialisation de l'examen
function initExam() {
    startTimer();
    startAutoSpeech();
    updateProgress();
    updateHiddenAnswers();
}

// Timer
function startTimer() {
    examData.timerInterval = setInterval(() => {
        examData.remainingTime--;
        
        if (examData.remainingTime <= 0) {
            clearInterval(examData.timerInterval);
            autoSubmitExam();
            return;
        }
        
        const minutes = Math.floor(examData.remainingTime / 60);
        const seconds = examData.remainingTime % 60;
        document.getElementById('timer').textContent = 
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
    }, 1000);
}

// Lecture automatique de la question
function startAutoSpeech() {
    setTimeout(() => {
        readCurrentQuestion();
    }, 1000);
}

function readCurrentQuestion() {
    const currentIndex = examData.currentQuestionIndex;
    const questionId = document.querySelector('.current-question').dataset.questionId;
    
    // Vérifier si l'audio a déjà été joué deux fois pour cette question
    if (examData.audioFinished[questionId]) {
        return; // Ne pas relire si déjà terminé
    }

    if (!('speechSynthesis' in window)) {
        console.log('Synthèse vocale non supportée');
        return;
    }

    // Afficher l'indicateur de lecture
    showAudioStatus(true);
    
    const currentCard = document.querySelector('.current-question');
    const questionText = currentCard.querySelector('.question-text').textContent;
    const answerLabels = currentCard.querySelectorAll('.answer-text');
    
    let fullText = questionText + ". Réponses : ";
    answerLabels.forEach((label, index) => {
        const letter = String.fromCharCode(65 + index); // A, B, C, etc.
        fullText += ` ${letter} : ${label.textContent}.`;
    });
    
    speakText(fullText, questionId);
}

function showAudioStatus(show) {
    const currentIndex = examData.currentQuestionIndex;
    const statusElement = document.getElementById(`audioStatus${currentIndex}`);
    if (statusElement) {
        statusElement.classList.toggle('hidden', !show);
    }
}

function speakText(text, questionId) {
    if (!('speechSynthesis' in window)) {
        showAudioStatus(false);
        return;
    }
    
    // Arrêter toute lecture en cours
    window.speechSynthesis.cancel();
    
    examData.isReading = true;
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'fr-FR';
    utterance.rate = 0.9;
    utterance.pitch = 1.0;
    
    utterance.onend = function() {
        examData.speechAttempts++;
        if (examData.speechAttempts < 2) {
            // Relire une deuxième fois après une courte pause
            setTimeout(() => {
                speakText(text, questionId);
            }, 1000);
        } else {
            // Après deux lectures, réinitialiser le compteur et désactiver le bouton
            examData.speechAttempts = 0;
            examData.isReading = false;
            showAudioStatus(false);
            
            // Marquer cette question comme ayant terminé l'audio
            examData.audioFinished[questionId] = true;
            
            // Désactiver le bouton de réécoute pour cette question
            disableTTSButton();
        }
    };
    
    utterance.onerror = function(event) {
        console.error('Erreur de synthèse vocale:', event);
        examData.speechAttempts = 0;
        examData.isReading = false;
        showAudioStatus(false);
    };
    
    window.speechSynthesis.speak(utterance);
}

function disableTTSButton() {
    const currentIndex = examData.currentQuestionIndex;
    const ttsButton = document.getElementById(`ttsButton${currentIndex}`);
    if (ttsButton) {
        ttsButton.disabled = true;
        ttsButton.classList.add('opacity-50', 'cursor-not-allowed');
        ttsButton.classList.remove('hover:bg-opacity-30');
        ttsButton.title = "Lecture terminée - Plus de réécoute possible";
    }
}

function enableTTSButton() {
    const currentIndex = examData.currentQuestionIndex;
    const ttsButton = document.getElementById(`ttsButton${currentIndex}`);
    if (ttsButton) {
        ttsButton.disabled = false;
        ttsButton.classList.remove('opacity-50', 'cursor-not-allowed');
        ttsButton.classList.add('hover:bg-opacity-30');
        ttsButton.title = "Réécouter la question";
    }
}

// Navigation entre les questions
function nextQuestion() {
    // Arrêter la lecture en cours
    if (window.speechSynthesis) {
        window.speechSynthesis.cancel();
        examData.isReading = false;
        showAudioStatus(false);
    }
    
    // Sauvegarder les réponses actuelles
    saveCurrentAnswers();
    
    // Masquer la question actuelle
    const currentCard = document.querySelector('.current-question');
    currentCard.classList.add('hidden');
    currentCard.classList.remove('current-question');
    
    // Passer à la question suivante
    examData.currentQuestionIndex++;
    
    if (examData.currentQuestionIndex < examData.totalQuestions) {
        // Afficher la nouvelle question
        const nextCard = document.querySelector(`[data-question-index="${examData.currentQuestionIndex}"]`);
        nextCard.classList.remove('hidden');
        nextCard.classList.add('current-question');
        
        // Réinitialiser le compteur de lecture
        examData.speechAttempts = 0;
        
        // Mettre à jour l'interface
        updateProgress();
        
        // Restaurer les réponses précédentes pour cette question
        restoreAnswersForCurrentQuestion();
        
        // Vérifier si l'audio a déjà été joué pour cette question
        const questionId = nextCard.dataset.questionId;
        if (examData.audioFinished[questionId]) {
            // Si l'audio a déjà été joué, désactiver le bouton TTS
            disableTTSButton();
        } else {
            // Sinon, activer le bouton TTS et lancer la lecture automatique
            enableTTSButton();
            setTimeout(() => {
                readCurrentQuestion();
            }, 500);
        }
    } else {
        // Dernière question passée, afficher le bouton de soumission
        showSubmitSection();
    }
}

function saveCurrentAnswers() {
    const currentCard = document.querySelector('.current-question');
    const questionId = currentCard.dataset.questionId;
    const selectedAnswers = Array.from(currentCard.querySelectorAll('.answer-input:checked'))
        .map(input => input.value);
    
    examData.answers[questionId] = selectedAnswers;
    updateHiddenAnswers();
}

function restoreAnswersForCurrentQuestion() {
    const currentCard = document.querySelector('.current-question');
    const questionId = currentCard.dataset.questionId;
    
    // Réinitialiser tous les inputs
    const allInputs = currentCard.querySelectorAll('.answer-input');
    allInputs.forEach(input => {
        input.checked = false;
        updateAnswerStyle(input);
    });
    
    // Restaurer les réponses sauvegardées
    if (examData.answers[questionId]) {
        examData.answers[questionId].forEach(answerId => {
            const input = currentCard.querySelector(`.answer-input[value="${answerId}"]`);
            if (input) {
                input.checked = true;
                updateAnswerStyle(input);
            }
        });
    }
    
    updateNextButton();
}

function updateHiddenAnswers() {
    document.getElementById('allAnswers').value = JSON.stringify(examData.answers);
}

function handleAnswerSelection(input) {
    const questionId = document.querySelector('.current-question').dataset.questionId;
    const isMultiple = input.dataset.isMultiple === 'true';
    
    if (!isMultiple) {
        // Pour les questions à réponse unique, désélectionner les autres
        const otherInputs = document.querySelectorAll(`.current-question .answer-input:not([value="${input.value}"])`);
        otherInputs.forEach(otherInput => {
            otherInput.checked = false;
            updateAnswerStyle(otherInput);
        });
    }
    
    updateAnswerStyle(input);
    
    // Sauvegarder immédiatement la réponse
    saveCurrentAnswers();
    updateNextButton();
}

function updateAnswerStyle(input) {
    const label = input.closest('.answer-label');
    if (input.checked) {
        label.classList.add('border-blue-500', 'bg-blue-50');
        label.classList.remove('border-gray-200', 'hover:border-blue-400');
    } else {
        label.classList.remove('border-blue-500', 'bg-blue-50');
        label.classList.add('border-gray-200', 'hover:border-blue-400');
    }
}

function updateNextButton() {
    const currentCard = document.querySelector('.current-question');
    const hasAnswer = currentCard.querySelector('.answer-input:checked') !== null;
    const nextButton = currentCard.querySelector('.next-btn');
    
    if (nextButton) {
        nextButton.disabled = !hasAnswer;
    }
}

function updateProgress() {
    document.getElementById('currentQuestionNumber').textContent = examData.currentQuestionIndex + 1;
    document.getElementById('progressCounter').textContent = `${Object.keys(examData.answers).length}/${examData.totalQuestions}`;
}

function showSubmitSection() {
    document.getElementById('questionsContainer').classList.add('hidden');
    document.getElementById('submitSection').classList.remove('hidden');
    
    // Arrêter le timer
    clearInterval(examData.timerInterval);
    
    // Enregistrer le temps final
    const timeSpent = Math.floor((Date.now() - examData.startTime) / 1000);
    document.getElementById('timeTaken').value = timeSpent;
    
    // Marquer comme soumis
    examData.examSubmitted = true;
}

function autoSubmitExam() {
    if (!examData.examSubmitted) {
        // Sauvegarder les réponses actuelles
        saveCurrentAnswers();
        
        // Soumettre automatiquement
        alert('Temps écoulé ! Votre examen va être soumis automatiquement.');
        document.getElementById('examForm').submit();
    }
}

// Empêcher le retour en arrière
history.pushState(null, null, location.href);
window.onpopstate = function(event) {
    history.go(1);
};

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    initExam();
});

// Empêcher la fermeture de la page
window.addEventListener('beforeunload', function(e) {
    if (!examData.examSubmitted) {
        e.preventDefault();
        e.returnValue = 'Vos réponses seront perdues si vous quittez cette page.';
        return 'Vos réponses seront perdues si vous quittez cette page.';
    }
});

// Gérer la soumission du formulaire
document.getElementById('examForm').addEventListener('submit', function(e) {
    if (!examData.examSubmitted) {
        examData.examSubmitted = true;
        // La soumission continue normalement
    }
});
</script>

<style>
.question-card {
    transition: all 0.3s ease;
}

.answer-label {
    transition: all 0.2s ease;
}

.answer-label:hover {
    transform: translateY(-1px);
}

.next-btn:not(:disabled):hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.hidden {
    display: none !important;
}

.current-question {
    display: block !important;
    animation: fadeIn 0.5s ease-in;
}

/* Classe pour cacher visuellement mais garder accessible pour les lecteurs d'écran */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.tts-button:hover {
    transform: scale(1.1);
}

.tts-button:disabled:hover {
    transform: none;
}
</style>
@endsection
