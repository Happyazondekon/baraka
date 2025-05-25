<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\UserProgress;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Module $module, Course $course)
    {
        // Vérifier que le cours appartient au module
        if ($course->module_id !== $module->id) {
            abort(404);
        }

        $user = auth()->user();
        
        // Marquer le cours comme lu
        UserProgress::updateOrCreate([
            'user_id' => $user->id,
            'module_id' => $module->id,
            'course_id' => $course->id,
        ], [
            'completed' => true,
            'completed_at' => now()
        ]);

        $nextCourse = Course::where('module_id', $module->id)
            ->where('order', '>', $course->order)
            ->where('is_active', true)
            ->orderBy('order')
            ->first();

        $prevCourse = Course::where('module_id', $module->id)
            ->where('order', '<', $course->order)
            ->where('is_active', true)
            ->orderBy('order', 'desc')
            ->first();

        return view('courses.show', compact('module', 'course', 'nextCourse', 'prevCourse'));
    }

    // Admin methods
    public function index()
    {
        $courses = Course::with('module')->paginate(20);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        return view('admin.courses.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'audio_url' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Cours créé avec succès!');
    }

    public function edit(Course $course)
    {
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        return view('admin.courses.edit', compact('course', 'modules'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'audio_url' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Cours mis à jour avec succès!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Cours supprimé avec succès!');
    }
}
