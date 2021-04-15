<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $event = new \App\Event([
        'startdate' => '2021-04-01',
        'starttime' => '13:00:00',
        'enddate' => '2021-04-01',
        'endtime' => '16:00:00',
        'title' => 'ホテル',
        ]);
        $event->save();
        $event = new \App\Event([
        'startdate' => '2021-04-05',
        'starttime' => '16:00:00',
        'enddate' => '2021-04-07',
        'endtime' => '16:00:00',
        'title' => '飛行機',
        ]);
        $event->save();
        
        $event = new \App\Event([
        'startdate' => '2021-04-10',
        'enddate' => '2021-04-15',
        'title' => '食事',
        ]);
        $event = new \App\Event([
        'startdate' => '2021-04-13',
        'title' => '食事',
        ]);
        $event->save();
        $event = new \App\Event([
        'startdate' => '2021-04-15',
        'starttime' => '13:00:00',
        'title' => 'サッカー',
        ]);
        $event->save();
        
        $event = new \App\Event([
        
        'title' => '野球',
        ]);
        $event->save();
        
        $event = new \App\Event([
        
        'title' => 'シュノーケル',
        ]);
        $event->save();
        
        $event = new \App\Event([
        
        'title' => 'ハイキング',
        ]);
        $event->save();
        
        
    }
}
