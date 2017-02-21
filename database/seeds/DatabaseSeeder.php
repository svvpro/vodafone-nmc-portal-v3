<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->truncate();
//        DB::table('roles')->truncate();
//        DB::table('permissions')->truncate();
//        DB::table('service_code_types')->truncate();

        $this->call(UsersTableSeeder::class);
//        $this->call(RolesTableSeeder::class);
//        $this->call(PermissionsTableSeeder::class);
//         $this->call(ServiceCodeTypeTableSeeder::class);
    }
}
