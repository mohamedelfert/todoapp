<?php

use App\Models\Todo;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $faker = Factory::create();
        foreach ($users as $user) {
            for ($i = 1; $i <= 10; $i++) {
                Todo::create([
                    'title' => $faker->unique()->words($nb = 3, $asText = true),
                    'description' => $faker->paragraph(),
                    'user_id' => $user->id,
                    'finished' => 0,
                ]);
            }
        }
    }
}
