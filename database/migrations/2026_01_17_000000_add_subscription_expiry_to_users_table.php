<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajout des colonnes pour la gestion de l'abonnement
            $table->timestamp('payment_expires_at')->nullable()->after('paid_at')
                ->comment('Date d\'expiration de l\'abonnement (2 mois après paiement)');
            $table->integer('subscription_months')->default(2)->after('payment_expires_at')
                ->comment('Durée de l\'abonnement en mois');
            $table->boolean('has_active_subscription')->default(false)->after('subscription_months')
                ->comment('Indique si l\'abonnement est actuellement actif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['payment_expires_at', 'subscription_months', 'has_active_subscription']);
        });
    }
};
