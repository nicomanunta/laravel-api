<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<20; $i++){
            $project = new Project();
            $project->nome_progetto= $faker->sentence(5);
            $project->descrizione= $faker->paragraph(3);
            $project->slug= Str::slug($project->nome_progetto, '-');
            $project->data= $faker->date();
            $project->cover_immagine= $faker->imageUrl();
            $project->save();
        }
    }
}
