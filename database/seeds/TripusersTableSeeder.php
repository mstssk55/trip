<?php

use Illuminate\Database\Seeder;

class TripusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                    // 1レコード
    $tripuser = new \App\Tripuser([
    'trip_id' => '3',
    'user_id' => '1',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    
    $tripuser = new \App\Tripuser([
    'trip_id' => '3',
    'user_id' => '2',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    
    $tripuser = new \App\Tripuser([
    'trip_id' => '3',
    'user_id' => '5',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    
    $tripuser = new \App\Tripuser([
    'trip_id' => '3',
    'user_id' => '7',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    
    $tripuser = new \App\Tripuser([
    'trip_id' => '2',
    'user_id' => '4',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    
    $tripuser = new \App\Tripuser([
    'trip_id' => '2',
    'user_id' => '8',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    
    $tripuser = new \App\Tripuser([
    'trip_id' => '2',
    'user_id' => '1',
    'kanri_flg' => '1',
    'life_flg' => '1',
    ]);
    $tripuser->save();
    }
}
