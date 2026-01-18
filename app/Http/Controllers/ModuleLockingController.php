<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Services\ModuleLockingService;
use Illuminate\Http\Request;

class ModuleLockingController extends Controller
{
    protected ModuleLockingService $lockingService;

    public function __construct(ModuleLockingService $lockingService)
    {
        $this->lockingService = $lockingService;
    }

    /**
     * Affiche la page des statistiques de déverrouillage
     */
    public function status()
    {
        $user = auth()->user();

        $summary = $this->lockingService->getModulesSummary($user);
        
        $theorique = Module::where('is_practical', false)
            ->with(['courses'])
            ->get()
            ->map(function ($module) use ($user) {
                return [
                    'module' => $module,
                    'progress' => $module->getProgressPercentage($user),
                    'is_locked' => $module->isLockedFor($user),
                    'lock_reason' => $module->getLockReason($user),
                ];
            });

        $pratique = Module::where('is_practical', true)
            ->with(['courses'])
            ->get()
            ->map(function ($module) use ($user) {
                return [
                    'module' => $module,
                    'progress' => $module->getProgressPercentage($user),
                    'is_locked' => $module->isLockedFor($user),
                    'lock_reason' => $module->getLockReason($user),
                ];
            });

        return view('modules.locking-status', [
            'summary' => $summary,
            'theorique' => $theorique,
            'pratique' => $pratique,
        ]);
    }

    /**
     * API : Retourne le statut de verrouillage d'un module
     */
    public function checkModuleStatus(Module $module)
    {
        $user = auth()->user();

        return response()->json([
            'module_id' => $module->id,
            'module_title' => $module->title,
            'is_locked' => $module->isLockedFor($user),
            'current_progress' => $module->getProgressPercentage($user),
            'required_progress' => 80,
            'lock_reason' => $module->getLockReason($user),
        ]);
    }

    /**
     * API : Retourne tous les modules avec leur statut de verrouillage
     */
    public function allModulesStatus()
    {
        $user = auth()->user();
        $modules = Module::with(['courses'])->get();

        return response()->json([
            'summary' => $this->lockingService->getModulesSummary($user),
            'modules' => $modules->map(function ($module) use ($user) {
                return [
                    'id' => $module->id,
                    'title' => $module->title,
                    'order' => $module->order,
                    'is_practical' => $module->is_practical,
                    'is_locked' => $module->isLockedFor($user),
                    'current_progress' => $module->getProgressPercentage($user),
                    'required_progress' => 80,
                    'lock_reason' => $module->getLockReason($user),
                    'courses_count' => $module->courses->count(),
                ];
            })->toArray(),
        ]);
    }
}
