<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
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
                'name' => 'SHOW_ADMIN',
                'desc' => 'Доступ к админ.части'
            ],
            [
                'name' => 'PERMISSION_INDEX',
                'desc' => 'Доступ к панели редктора прав доступа'
            ],
        ];

        DB::table('permissions')->insert($data);
    }
}
