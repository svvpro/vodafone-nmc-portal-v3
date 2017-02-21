<?php

use Illuminate\Database\Seeder;

class ServiceCodeTypeTableSeeder extends Seeder
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
                'name'=>'USSD'
            ],
            [
                'name'=>'DPI(GPRS)'
            ],
            [
                'name'=>'SMS'
            ],
            [
                'name'=>'MOC/MTC'
            ],
        ];

        DB::table('service_code_types')->insert($data);
    }
}
