@extends('layouts.app')

@section('title', 'Examen Blanc - Code de la Route')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Navigation -->
        <div class="mb-8">
            <a href="{{ route('examens.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour aux examens blancs
            </a>
        </div>

        <!-- Exam Header -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-8 border border-blue-200">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white bg-opacity-10 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white bg-opacity-10 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between">
                    <div class="flex-1 text-white mb-6 lg:mb-0">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-20 text-sm font-medium mb-4">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Examen Blanc
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-bold mb-3">Examen de Code de la Route</h1>
                        <h2 class="text-xl lg:text-2xl font-semibold opacity-95 mb-4">Simulation d'examen officiel</h2>
                        <p class="text-blue-100 text-lg leading-relaxed max-w-2xl">
                            Testez vos connaissances avec cet examen blanc de {{ $questions->count() }} questions. 
                            Conditions réelles d'examen avec timer et correction détaillée.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl font-bold text-gray-800 mb-2">
                            {{ $questions->count() }}<span class="text-2xl text-gray-500"> questions</span>
                        </div>
                        <div class="text-sm text-gray-600 font-medium">Durée estimée : 30 min</div>
                        <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full mx-auto mt-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exam Instructions -->
<div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 mb-8">
    <div class="flex items-start">
        <div class="bg-yellow-100 text-yellow-600 rounded-xl p-3 mr-4 flex-shrink-0">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Instructions importantes</h3>
            <ul class="text-gray-700 space-y-1">
                <li>• L'examen contient <strong>{{ $questions->count() }} questions</strong> à choix multiples</li>
                <li>• Vous avez <strong>{{ $timeLimit ?? 30 }} minutes</strong> pour terminer l'examen</li>
                <li>• Le score de réussite est de <strong>{{ $exam->passing_score ?? 70 }}%</strong> ({{ ceil($questions->count() * (($exam->passing_score ?? 70) / 100)) }} bonnes réponses)</li>
                <li>• Une seule réponse est correcte par question</li>
                <li>• Vous ne pouvez pas revenir en arrière après validation</li>
            </ul>
        </div>
    </div>
</div>

        <!-- Exam Form -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Examen en cours</h3>
                        <p class="text-blue-100">Répondez à toutes les questions avant de valider</p>
                    </div>
                    <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                        <div class="bg-white bg-opacity-20 rounded-xl px-4 py-2 text-center">
                            <div class="text-xl font-bold" id="remainingQuestions">{{ $questions->count() }}</div>
                            <div class="text-xs opacity-90">Questions restantes</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-xl px-4 py-2 text-center">
                            <div class="text-xl font-bold" id="timer">30:00</div>
                            <div class="text-xs opacity-90">Temps restant</div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ $exam ? route('examens.submit.specific', $exam) : route('examens.submit') }}" method="POST" id="examForm" onsubmit="return handleExamSubmit(event)">
                @csrf
                <input type="hidden" name="time_taken" id="timeTaken" value="0">
                
                <div class="p-6">
                    <div class="space-y-8" id="questionsContainer">
                        @foreach($questions as $index => $question)
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow question-container" data-question-id="{{ $question->id }}">
                            <div class="flex flex-col lg:flex-row gap-6 mb-6">
                                <div class="flex-1">
                                    <div class="flex items-start mb-4">
                                        <span class="bg-blue-500 text-white rounded-lg px-3 py-1 text-sm font-bold mr-3 shadow-md flex-shrink-0">
                                            {{ $index + 1 }}
                                        </span>
                                        <p class="text-lg font-semibold text-gray-800 leading-relaxed">
                                            {{ $question->question_text }}
                                        </p>
                                    </div>
                                </div>
                                
                                @if($question->image)
                                <div class="flex-shrink-0">
                                    <div class="border-2 border-gray-300 rounded-xl overflow-hidden p-2 bg-white shadow-md w-full lg:w-56 max-h-56 mx-auto hover:border-blue-400 transition-colors">
                                        <img src="{{ asset('storage/' . $question->image) }}" 
                                            alt="Image pour la question n°{{ $index + 1 }}" 
                                            class="w-full h-full object-contain rounded-lg">
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            <div class="space-y-3">
                                @php
                                    $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                                @endphp
                                @foreach($question->answers as $answerIndex => $answer)
                                <label class="flex items-start p-4 rounded-xl border-2 border-gray-200 hover:border-blue-400 hover:bg-blue-50 cursor-pointer transition-all duration-300 group shadow-sm answer-label">
                                    <input type="radio" 
                                            name="answers[{{ $question->id }}]" 
                                            value="{{ $answer->id }}" 
                                            class="mt-1 text-blue-500 focus:ring-blue-500 transform scale-125 answer-radio"
                                            required
                                            data-question-id="{{ $question->id }}">
                                    <div class="ml-4 flex items-start flex-1">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-bold text-sm mr-4 flex-shrink-0 group-hover:bg-blue-500 group-hover:text-white transition-colors shadow-sm">
                                            {{ $letters[$answerIndex] }}
                                        </span>
                                        <span class="text-gray-700 leading-relaxed font-medium group-hover:text-blue-900 transition-colors">
                                            {{ $answer->answer_text }}
                                        </span>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Submit Section -->
                    <div class="mt-12 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-200 shadow-sm">
                        <div class="text-center">
                            <h4 class="text-xl font-bold text-gray-800 mb-4">Prêt à valider votre examen ?</h4>
                            <p class="text-gray-600 mb-6">Vérifiez que vous avez répondu à toutes les questions avant de soumettre.</p>
                            
                            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                                <button type="button" onclick="resetExam()" class="px-8 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-300 shadow-sm hover:shadow-md">
                                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Réinitialiser
                                </button>
                                
                                <button type="submit" 
                                        id="submitBtn"
                                        class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center disabled:bg-gray-400 disabled:cursor-not-allowed">
                                    <span id="btnText">Valider l'Examen</span>
                                    <span id="btnSpinner" class="hidden">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Validation en cours...
                                    </span>
                                </button>
                            </div>
                            
                            <div class="mt-6 text-sm text-gray-500 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                Temps écoulé : <span id="elapsedTime" class="font-mono font-bold ml-1">00:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Progress Indicator -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <span class="text-lg font-semibold text-gray-800">Progression de l'examen</span>
                <span class="text-lg font-bold text-blue-600" id="progressPercentage">0%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3">
                <div id="progressBar" class="bg-gradient-to-r from-blue-400 to-indigo-500 h-3 rounded-full transition-all duration-500 ease-out" style="width: 0%"></div>
            </div>
            <div class="flex justify-between text-sm text-gray-500 mt-2">
                <span>0 question</span>
                <span id="answeredCount">0</span>
                <span>{{ $questions->count() }} questions</span>
            </div>
        </div>
    </div>
</div>

{{-- Dans la section script de start.blade.php --}}
<script>
// Timer et gestion de l'examen
let examStartTime = Date.now();
let examSubmitted = false;
let timerInterval;
let elapsedTimeInterval;

// Initialisation du timer
function startTimer() {
    const totalTime = {{ $timeLimit ?? 30 }} * 60;
    let remainingTime = totalTime;
    
    timerInterval = setInterval(() => {
        remainingTime--;
        
        if (remainingTime <= 0) {
            clearInterval(timerInterval);
            document.getElementById('timer').textContent = '00:00';
            autoSubmitExam();
            return;
        }
        
        const minutes = Math.floor(remainingTime / 60);
        const seconds = remainingTime % 60;
        document.getElementById('timer').textContent = 
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
    }, 1000);
    
    elapsedTimeInterval = setInterval(updateElapsedTime, 1000);
}

function updateElapsedTime() {
    const elapsed = Math.floor((Date.now() - examStartTime) / 1000);
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;
    document.getElementById('elapsedTime').textContent = 
        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    document.getElementById('timeTaken').value = elapsed;
}

// Gestion de la progression
function updateProgress() {
    const totalQuestions = {{ $questions->count() }};
    const answeredQuestions = document.querySelectorAll('.answer-radio:checked').length;
    const progressPercentage = Math.round((answeredQuestions / totalQuestions) * 100);
    
    document.getElementById('progressPercentage').textContent = progressPercentage + '%';
    document.getElementById('progressBar').style.width = progressPercentage + '%';
    document.getElementById('answeredCount').textContent = answeredQuestions + ' question' + (answeredQuestions > 1 ? 's' : '');
    document.getElementById('remainingQuestions').textContent = totalQuestions - answeredQuestions;
    
    const progressBar = document.getElementById('progressBar');
    if (progressPercentage < 50) {
        progressBar.className = 'bg-gradient-to-r from-red-400 to-red-500 h-3 rounded-full transition-all duration-500 ease-out';
    } else if (progressPercentage < 80) {
        progressBar.className = 'bg-gradient-to-r from-yellow-400 to-yellow-500 h-3 rounded-full transition-all duration-500 ease-out';
    } else {
        progressBar.className = 'bg-gradient-to-r from-green-400 to-green-500 h-3 rounded-full transition-all duration-500 ease-out';
    }
}

// Gestion de la soumission avec SweetAlert
async function handleExamSubmit(event) {
    if (examSubmitted) {
        event.preventDefault();
        return false;
    }

    const totalQuestions = {{ $questions->count() }};
    const answeredQuestions = document.querySelectorAll('.answer-radio:checked').length;
    
    if (answeredQuestions < totalQuestions) {
        event.preventDefault();
        
        const result = await Swal.fire({
            title: 'Validation incomplète',
            html: `Vous n'avez répondu qu'à <strong>${answeredQuestions}</strong> sur <strong>${totalQuestions}</strong> questions.<br>Voulez-vous vraiment soumettre ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, soumettre',
            cancelButtonText: 'Continuer',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl',
                cancelButton: 'rounded-xl'
            }
        });
        
        if (result.isConfirmed) {
            return submitExam();
        }
        return false;
    }
    
    return submitExam();
}

function submitExam() {
    const timeSpent = Math.floor((Date.now() - examStartTime) / 1000);
    document.getElementById('timeTaken').value = timeSpent;
    clearInterval(timerInterval);
    clearInterval(elapsedTimeInterval);

    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    
    if (submitBtn && btnText && btnSpinner) {
        submitBtn.disabled = true;
        btnText.classList.add('hidden');
        btnSpinner.classList.remove('hidden');
    }
    
    examSubmitted = true;
    return true;
}

function autoSubmitExam() {
    if (!examSubmitted) {
        Swal.fire({
            title: 'Temps écoulé !',
            text: 'Le temps imparti est écoulé. Votre examen va être soumis automatiquement.',
            icon: 'info',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl'
            }
        }).then(() => {
            document.getElementById('examForm').submit();
        });
    }
}

// Réinitialisation avec SweetAlert
async function resetExam() {
    const result = await Swal.fire({
        title: 'Réinitialiser les réponses',
        text: 'Êtes-vous sûr de vouloir réinitialiser toutes vos réponses ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, réinitialiser',
        cancelButtonText: 'Annuler',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl',
            cancelButton: 'rounded-xl'
        }
    });
    
    if (result.isConfirmed) {
        document.querySelectorAll('.answer-radio').forEach(radio => {
            radio.checked = false;
        });
        updateProgress();
        
        // Réinitialiser les styles des réponses
        document.querySelectorAll('.answer-label').forEach(label => {
            label.classList.remove('border-blue-500', 'bg-blue-50');
            label.classList.add('border-gray-200', 'hover:border-blue-400');
        });
        
        Swal.fire({
            title: 'Réinitialisé !',
            text: 'Toutes vos réponses ont été réinitialisées.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 2000,
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl'
            }
        });
    }
}

// Gestion des réponses
document.addEventListener('DOMContentLoaded', function() {
    startTimer();
    updateProgress();
    
    // Écouter les changements de réponses
    document.querySelectorAll('.answer-radio').forEach(radio => {
        radio.addEventListener('change', function() {
            const questionId = this.getAttribute('data-question-id');
            const questionContainer = document.querySelector(`.question-container[data-question-id="${questionId}"]`);
            
            // Réinitialiser toutes les réponses de cette question
            questionContainer.querySelectorAll('.answer-label').forEach(label => {
                label.classList.remove('border-blue-500', 'bg-blue-50');
                label.classList.add('border-gray-200', 'hover:border-blue-400');
            });
            
            // Mettre en surbrillance la réponse sélectionnée
            const selectedLabel = this.closest('.answer-label');
            selectedLabel.classList.remove('border-gray-200', 'hover:border-blue-400');
            selectedLabel.classList.add('border-blue-500', 'bg-blue-50');
            
            updateProgress();
        });
    });
    
    // Pré-sélectionner les réponses déjà choisies
    document.querySelectorAll('.answer-radio:checked').forEach(radio => {
        const selectedLabel = radio.closest('.answer-label');
        selectedLabel.classList.remove('border-gray-200', 'hover:border-blue-400');
        selectedLabel.classList.add('border-blue-500', 'bg-blue-50');
    });
});

// Avertissement avant de quitter la page avec SweetAlert
window.addEventListener('beforeunload', function(e) {
    if (!examSubmitted) {
        e.preventDefault();
        e.returnValue = '';
        
        // Optionnel: Afficher une SweetAlert personnalisée
        Swal.fire({
            title: 'Quitter la page ?',
            text: 'Vos réponses seront perdues si vous quittez cette page.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Quitter',
            cancelButtonText: 'Rester',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl',
                cancelButton: 'rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.reload();
            }
        });
    }
});
</script>

<style>
.answer-label {
    transition: all 0.3s ease;
}

.answer-label:hover {
    transform: translateY(-2px);
}

.question-container {
    transition: all 0.3s ease;
}

.question-container:hover {
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>
<style>
/* Personnalisation des SweetAlert pour correspondre au design */
.swal2-popup {
    border-radius: 1rem !important;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
}

.swal2-title {
    font-size: 1.5rem !important;
    font-weight: 600 !important;
    color: #1F2937 !important;
}

.swal2-html-container {
    font-size: 1.1rem !important;
    color: #6B7280 !important;
}

.swal2-confirm, .swal2-cancel {
    border-radius: 0.75rem !important;
    font-weight: 500 !important;
    padding: 0.75rem 1.5rem !important;
}

.swal2-confirm {
    background: linear-gradient(to right, #3B82F6, #6366F1) !important;
    border: none !important;
}

.swal2-confirm:hover {
    background: linear-gradient(to right, #2563EB, #4F46E5) !important;
    transform: translateY(-1px);
    box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4) !important;
}

.swal2-cancel {
    background-color: #6B7280 !important;
    border: none !important;
}

.swal2-cancel:hover {
    background-color: #4B5563 !important;
    transform: translateY(-1px);
}
</style>
@endsection