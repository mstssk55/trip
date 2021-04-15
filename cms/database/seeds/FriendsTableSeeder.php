<?php

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //   1レコード
    $friend = new \App\Friend([
    'send_id' => '1',
    'received_id' => '2',
    'accept' => '1'
    ]);
    $friend->save();
    
    $friend = new \App\Friend([
    'send_id' => '2',
    'received_id' => '6',
    'accept' => '1'
    ]);
    $friend->save();
    
    $friend = new \App\Friend([
    'send_id' => '1',
    'received_id' => '5',
    'accept' => '1'
    ]);
    $friend->save();
    
    $friend = new \App\Friend([
    'send_id' => '1',
    'received_id' => '8',
    'accept' => '0'
    ]);
    $friend->save();
    $friend = new \App\Friend([
    'send_id' => '1',
    'received_id' => '9',
    'accept' => '1'
    ]);
    $friend->save();
    $friend = new \App\Friend([
    'send_id' => '12',
    'received_id' => '1',
    'accept' => '1'
    ]);
    $friend->save();
    $friend = new \App\Friend([
    'send_id' => '3',
    'received_id' => '1',
    'accept' => '0'
    ]);
    $friend->save();
    $friend = new \App\Friend([
    'send_id' => '5',
    'received_id' => '7',
    'accept' => '1'
    ]);
    $friend->save();
    
    
    }
}
