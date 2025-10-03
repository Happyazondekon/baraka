<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('quiz_results', function (Blueprint $table) {
            // Add the new column as a boolean, defaulting to false.
            // This assumes that existing results are for module quizzes (not mock exams).
            $table->boolean('is_mock_exam')->default(false)->after('passed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quiz_results', function (Blueprint $table) {
            $table->dropColumn('is_mock_exam');
        });
    }
};

// **Rembember to run the migration:**
// php artisan migrate
