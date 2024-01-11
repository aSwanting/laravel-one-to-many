<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $typeIds = $types->pluck('id');

        for ($i = 0; $i < 100; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->sentence(5);
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->description = $faker->text(300);
            $new_project->type_id = $faker->optional()->randomElement($typeIds);

            $new_project->save();
        }
    }
}
