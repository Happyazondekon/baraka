<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateExistingSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:update-existing {--years=1 : Nombre d\'années à ajouter aux anciens paiements}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour les dates d\'expiration pour les utilisateurs qui ont déjà payé';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $years = $this->option('years');
        $this->info("🔄 Mise à jour des abonnements existants...");
        $this->info("   Durée : {$years} an(s) à partir de la date de paiement");

        // Trouver les utilisateurs qui ont payé mais n'ont pas de date d'expiration
        $users = User::where('has_paid', true)
            ->whereNull('payment_expires_at')
            ->whereNotNull('paid_at')
            ->get();

        if ($users->isEmpty()) {
            $this->info("ℹ️  Aucun utilisateur à mettre à jour.");
            return Command::SUCCESS;
        }

        $count = 0;
        foreach ($users as $user) {
            // Ajouter X années à partir de la date de paiement
            $user->payment_expires_at = $user->paid_at->addYears($years);
            $user->subscription_months = $years * 12;
            $user->has_active_subscription = true;
            $user->save();
            $count++;

            Log::info("✅ Abonnement mis à jour pour {$user->email}");
            Log::info("   Expire le : {$user->payment_expires_at->format('d/m/Y H:i:s')}");
            $this->line("✅ {$user->email} - Expire le {$user->payment_expires_at->format('d/m/Y')}");
        }

        $this->info("\n📊 Résumé :");
        $this->info("   • Utilisateurs mis à jour : {$count}");

        return Command::SUCCESS;
    }
}
