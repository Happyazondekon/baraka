<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
   public function index()
{
    $modules = Module::where('is_active', true)
        ->orderBy('order')
        ->with('courses')
        ->get();

    // On différencie la vue admin et la vue utilisateur
    if (request()->route()->getName() === 'admin.modules.index') {
        return view('admin.modules.index', compact('modules'));
    } else {
        return view('modules.index', compact('modules'));
    }
}

    public function show(Module $module)
{
    $module->load([
        'courses' => function($query) {
            $query->where('is_active', true)->orderBy('order');
        },
        'quiz.answers'
    ]);

    $user = auth()->user();
    $progress = $module->getProgressPercentage($user);
    $isCompleted = $module->isCompletedBy($user);

    return view('modules.show', compact('module', 'progress', 'isCompleted'));
}

    // Admin methods
    public function create()
    {
        return view('admin.modules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'required|integer|min:0',
            'is_practical' => 'boolean',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('modules', 'public');
        }

        Module::create($validated);

        return redirect()->route('modules.index')->with('success', 'Module créé avec succès!');
    }

    public function edit(Module $module)
    {
        return view('admin.modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'required|integer|min:0',
            'is_practical' => 'boolean',
            'is_active' => 'boolean'
        ]);

        if ($request->has('remove_image') && $request->boolean('remove_image')) {
            if ($module->image) {
                Storage::disk('public')->delete($module->image);
            }
            $validated['image'] = null; // Plus d'image associée
        }elseif ($request->hasFile('image')) {
            // Nouvelle image uploadée, suppression de l'ancienne
            if ($module->image) {
                Storage::disk('public')->delete($module->image);
            }
            $validated['image'] = $request->file('image')->store('modules', 'public');
        } else {
            // On garde l'image actuelle
            $validated['image'] = $module->image;
        }

        $module->update($validated);

        return redirect()->route('admin.modules.index')->with('success', 'Module mis à jour avec succès!');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('admin.modules.index')->with('success', 'Module supprimé avec succès!');
    }
    
}
