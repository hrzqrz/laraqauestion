<?php

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();
       
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
