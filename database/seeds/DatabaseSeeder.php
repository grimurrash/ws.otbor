<?php

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
        \App\User::create([
            'fio'=>"Сабиров Рашит Алмазович",
            'login' => 'Grimur',
            'email'=>'rashit.sabirov@bk.ru',
            'password' =>bcrypt('75987687'),
        ]);
        \App\Category::create([
            'name'=>'Стандарт'
        ]);
    }
}
