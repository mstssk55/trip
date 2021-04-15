<?php

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
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
    $trip = new \App\Trip([
    'title' => 'メキシコ',
    'departure' => '2021-02-03',
    'arrival' => '2021-03-01',
    'days' => '5',
    'author_id' => '4'
    ]);
    $trip->save();
    
      // 1レコード
    $trip = new \App\Trip([
    'title' => 'アメリカ',
    'departure' => '2021-02-03',
    'arrival' => '2021-03-01',
    'days' => '5',
    'author_id' => '2'
    ]);
    $trip->save();
    
      // 1レコード
    $trip = new \App\Trip([
    'title' => 'トルコ',
    'departure' => '2021-02-03',
    'arrival' => '2021-03-01',
    'days' => '5',
    'author_id' => '1'
    ]);
    $trip->save();
    
      // 1レコード
    $trip = new \App\Trip([
    'title' => 'キューバ',
    'departure' => '2021-02-03',
    'arrival' => '2021-03-01',
    'days' => '5',
    'author_id' => '5'
    ]);
    $trip->save();
    
      // 1レコード
    $trip = new \App\Trip([
    'title' => 'メキシコ',
    'departure' => '2021-02-03',
    'arrival' => '2021-03-01',
    'days' => '5',
    'author_id' => '4'
    ]);
    $trip->save();
    
    }
}
