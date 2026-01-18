<?php

namespace App\Services;

use App\Models\Module;
use App\Models\User;

class ModuleLockingService
{
    /**
     * Vérifie si un module est verrouillé pour un utilisateur
     */
    public function isModuleLocked(Module $module, User $user): bool
    {
        return $module->isLockedFor($user);
    }

    /**
     * Obtient tous les modules verrouillés pour un utilisateur
     */
    public function getLockedModules(User $user, bool $isPractical = null)
    {
        $query = Module::query();

        if ($isPractical !== null) {
            $query->where('is_practical', $isPractical);
        }

        return $query->get()->filter(function ($module) use ($user) {
            return $this->isModuleLocked($module, $user);
        });
    }

    /**
     * Obtient tous les modules déverrouillés pour un utilisateur
     */
    public function getUnlockedModules(User $user, bool $isPractical = null)
    {
        $query = Module::query();

        if ($isPractical !== null) {
            $query->where('is_practical', $isPractical);
        }

        return $query->get()->filter(function ($module) use ($user) {
            return !$this->isModuleLocked($module, $user);
        });
    }

    /**
     * Obtient le module suivant à déverrouiller
     */
    public function getNextLockedModule(User $user, bool $isPractical = null)
    {
        return $this->getLockedModules($user, $isPractical)->first();
    }

    /**
     * Obtient la progression requise pour débloquer le prochain module
     */
    public function getProgressToUnlock(Module $module, User $user): int
    {
        if (!$module->isLockedFor($user)) {
            return 0;
        }

        $previousModule = $module->getPreviousModule();
        if (!$previousModule) {
            return 0;
        }

        $currentProgress = $previousModule->getProgressPercentage($user);
        return max(0, 80 - $currentProgress);
    }

    /**
     * Obtient un résumé du statut de tous les modules
     */
    public function getModulesSummary(User $user)
    {
        $theorique = Module::where('is_practical', false)->get();
        $pratique = Module::where('is_practical', true)->get();

        return [
            'theorique' => [
                'total' => $theorique->count(),
                'unlocked' => $theorique->filter(fn($m) => !$this->isModuleLocked($m, $user))->count(),
                'locked' => $theorique->filter(fn($m) => $this->isModuleLocked($m, $user))->count(),
            ],
            'pratique' => [
                'total' => $pratique->count(),
                'unlocked' => $pratique->filter(fn($m) => !$this->isModuleLocked($m, $user))->count(),
                'locked' => $pratique->filter(fn($m) => $this->isModuleLocked($m, $user))->count(),
            ],
        ];
    }
}
