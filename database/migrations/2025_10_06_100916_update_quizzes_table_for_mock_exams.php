<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuizzesTableForMockExams extends Migration
{
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            // Rendre module_id nullable pour permettre les examens blancs
            $table->foreignId('module_id')->nullable()->change();
            
            // Ajouter un champ pour identifier les examens blancs
            $table->boolean('is_mock_exam')->default(false)->after('is_active');
        });
    }

    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropColumn('is_mock_exam');
            
            // Remettre module_id en non nullable
            $table->foreignId('module_id')->nullable(false)->change();
        });
    }
}