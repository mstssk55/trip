<?php

use Illuminate\Database\Seeder;

class TripplansTableSeeder extends Seeder
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
    $tripplan = new \App\Tripplan([
    'trip_id' => '3',
    'category_id' => '1',
    'plan' => '行きの飛行機',
    'user_id' => '3',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '3',
    'category_id' => '1',
    'plan' => '帰りの飛行機',
    'user_id' => '3',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '3',
    'category_id' => '2',
    'plan' => 'アパ',
    'user_id' => '2',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '3',
    'category_id' => '4',
    'plan' => 'ダイビング',
    'user_id' => '1',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '3',
    'category_id' => '5',
    'plan' => '出発集合',
    'user_id' => '4',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '2',
    'category_id' => '1',
    'plan' => '行きの飛行機',
    'user_id' => '3',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '2',
    'category_id' => '1',
    'plan' => '帰りの飛行機',
    'user_id' => '3',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '2',
    'category_id' => '2',
    'plan' => 'アパ',
    'user_id' => '2',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '2',
    'category_id' => '4',
    'plan' => 'ダイビング',
    'user_id' => '1',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    $tripplan = new \App\Tripplan([
    'trip_id' => '2',
    'category_id' => '5',
    'plan' => '出発集合',
    'user_id' => '4',
    'kanri_flg' => '1'
    ]);
    $tripplan->save();
    
    
    
    
    
    
    
    }
    
}
