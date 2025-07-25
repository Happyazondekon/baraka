<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Course;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();
        $faker = Faker::create('fr_FR');

        // Get all modules
        $modules = Module::all();

        foreach ($modules as $module) {
            $numCourses = rand(3, 7); // Each module will have 3 to 7 courses

            for ($i = 1; $i <= $numCourses; $i++) {
                Course::create([
                    'module_id' => $module->id,
                    'title' => "Leçon " . $i . " : " . $faker->sentence(rand(3, 6)),
                    'content' => $faker->paragraphs(rand(3, 8), true),
                    'video_url' => $faker->randomElement([
                        'https://www.youtube.com/embed/dQw4w9WgXcQ', // Rick Astley - Never Gonna Give You Up (example)
                        'https://www.youtube.com/embed/sYIu5k7o0wA', // Another example YouTube embed link
                        'https://www.youtube.com/embed/M0F2cTf7G6A', // Yet another
                        null // Some courses might not have a video
                    ]),
                    'audio_url' => $faker->randomElement([
                        'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', // Example MP3
                        'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
                        null // Some courses might not have audio
                    ]),
                    'order' => $i,
                    'is_active' => $faker->boolean(90), // 90% chance of being active
                ]);
            }
        }
    }
}