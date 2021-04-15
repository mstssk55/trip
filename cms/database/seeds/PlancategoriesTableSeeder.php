<?php

use Illuminate\Database\Seeder;

class PlancategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plancategory = new \App\Plancategory([
        'category' => '移動',
        'color' =>'#afddec'
        ]);
        $plancategory->save();
        
        $plancategory = new \App\Plancategory([
        'category' => 'ホテル',
        'color' =>'#ffcb75'
        ]);
        $plancategory->save();
        
        $plancategory = new \App\Plancategory([
        'category' => '食事',
        'color' =>'#eb7e5b'
        ]);
        $plancategory->save();
        
        $plancategory = new \App\Plancategory([
        'category' => 'ツアー',
        'color' =>'#77b85f'
        ]);
        $plancategory->save();
        
        $plancategory = new \App\Plancategory([
        'category' => '集合',
        'color' =>'#7f99f8'
        ]);
        $plancategory->save();
        $plancategory = new \App\Plancategory([
        'category' => 'その他',
        'color' =>'#cc71a4'
        ]);
        $plancategory->save();
    }
}
