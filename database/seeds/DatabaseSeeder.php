<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
use App\Answer;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        {
            // $this->call(UserSeeder::class);
            factory(User::class, 10)->create()->each(function($u){
                $u->questions()
                  ->saveMany(
                      factory(Question::class, rand(3, 7))->make()
                  )->each(function($q){
                      $q->answers()
                        ->saveMany(
                            factory(Answer::class, rand(3, 7))->make()
                        );
                  });
            });
        }
    }
}
