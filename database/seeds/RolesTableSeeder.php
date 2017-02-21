<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'name'=>'admin',
                'desc'=>'Все права'
            ],
            [
                'name'=>'user',
                'desc'=>'Ограниченые права'
            ],
            [
                'name'=>'Guest',
                'desc'=>'Нет доступа к админ части'
            ],

        ];

        DB::table('roles')->insert($data);
    }
}
