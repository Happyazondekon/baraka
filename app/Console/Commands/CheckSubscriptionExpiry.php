<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckSubscriptionExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:check-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérifier et mettre à jour l\'état des abonnements expirés';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Vérification de l\'expiration des abonnements...');

        // Trouver tous les utilisateurs avec des abonnements
        $users = User::where('has_paid', true)
            ->whereNotNull('payment_expires_at')
            ->get();

        $expiredCount = 0;
        $expiringCount = 0;

        foreach ($users as $user) {
            // Vérifier si expiré
            if ($user->payment_expires_at->isPast()) {
                $user->has_paid = false;
                $user->has_active_subscription = false;
                $user->save();
                $expiredCount++;

                Log::info("🔔 Abonnement expiré pour {$user->email}");
                $this->line("✅ Abonnement expiré désactivé pour : {$user->email}");
            } 
            // Vérifier si expire bientôt
            elseif ($user->isExpiringsoon()) {
                $daysLeft = $user->getDaysUntilExpiry();
                Log::warning("⚠️ Abonnement expire bientôt pour {$user->email} - {$daysLeft} jour(s)");
                $expiringCount++;
                $this->line("⚠️  Abonnement expire bientôt pour {$user->email} ({$daysLeft} jours)");
            }
        }

        $this->info("\n📊 Résumé :");
        $this->info("   • Abonnements expirés désactivés : {$expiredCount}");
        $this->info("   • Abonnements expirant bientôt : {$expiringCount}");
        $this->info("   • Total vérifié : " . $users->count());

        return Command::SUCCESS;
    }
}
