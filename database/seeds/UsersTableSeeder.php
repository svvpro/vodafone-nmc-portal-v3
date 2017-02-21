<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'Graph',
                'surname'=>'Dracula',
                'email'=>'svv@mail.ru',
                'password'=>bcrypt('111111')
            ],
        ];

        DB::table('users')->insert($data);
    }
}
