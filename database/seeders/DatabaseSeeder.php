<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // for ($i = 0, $ii = 20; $i < $ii; $i++) {
        //     Quizze::create([
        //         'name' => $faker->name,
        //     ]);


        // }




        Type::create([
            'name' => 'input',
            'type' => 1,
        ]);

        Type::create([
            'name' => 'radio',
            'type' => 2,
        ]);


        // for ($ill = 0, $iiu = 20; $ill < $iiu; $ill++) {
        //     Question::create([
        //         'name' => $faker->name,
        //         'type_id' => Type::all()->random()->id,
        //         'quizzes_id' => Quizze::all()->random()->id,
        //     ]);

        // }

        // for ($ill = 0, $iiy = 20; $ill < $iiy; $ill++) {
        //     Answer::create([
        //         'name' => $faker->name,
        //         'question_id' => Question::all()->random()->id,
              
        //     ]);

        // }

        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
