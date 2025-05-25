<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->integer('score'); // pourcentage
            $table->integer('total_questions');
            $table->integer('correct_answers');
            $table->boolean('passed')->default(false);
            $table->integer('time_taken')->nullable(); // en secondes
            $table->json('answers')->nullable(); // réponses de l'utilisateur
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
};
