<?php

use App\CompancySetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompancySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        if(!CompancySetting::exists()){
        CompancySetting::create([
            'compancy_name' => 'Myo Htet Hr Compancy',
            'compancy_email' => 'myohtet@gmail.com',
            'compancy_phone' => '0997896204',
            'compancy_address'=>'Mon State, Mudon Township',
            'office_start_time' => '09:00:00',
            'office_end_time' => '18:00:00',
            'break_start_time' => '12:00:00',
            'break_end_time' => '13:00:00',
            
        ]);
    }
       
    }
}
