<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = new \App\User([
        'name' => 'まさと',
        'email' => 'root@root.com',
        'password' => 'rootroot',
        'userid' => 'rootroot',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'icon' => '2.jpeg',
        'life_flg' => '1'
        
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'ささき',
        'email' => 'test@test.com',
        'password' => 'testtest',
        'userid' => 'testtest',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'icon' => '1.jpg',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'やまだ',
        'email' => 'aaa@aaa.com',
        'password' => 'aaaaaaaa',
        'userid' => 'aaaaaaaa',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'icon' => '3.jpg',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'たなか',
        'email' => 'test1@test.com',
        'password' => 'testtest',
        'userid' => 'tes1tes1',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'icon' => '4.jpg',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'さとう',
        'email' => 'root1@root.com',
        'password' => 'rootroot',
        'userid' => 'roo1roo1',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'icon' => '5.jpg',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'かとう',
        'email' => 'test2@test.com',
        'password' => 'testtest',
        'userid' => 'tes2tes2',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'icon' => '6.jpg',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'ごつ',
        'email' => 'test3@test.com',
        'password' => 'testtest',
        'userid' => 'tes3tes3',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'たろう',
        'email' => 'root2@root.com',
        'password' => 'rootroot',
        'userid' => 'roo2roo2',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'はなこ',
        'email' => 'test4@test.com',
        'password' => 'testtest',
        'userid' => 'tes4tes4',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'life_flg' => '1'
        ]);
        $user->save();
        
        $user = new \App\User([
        'name' => 'じろう',
        'email' => 'test5@test.com',
        'password' => 'testtest',
        'userid' => 'tes5tes5',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'life_flg' => '1'
        ]);
        $user->save();
        $user = new \App\User([
        'name' => 'さぶろう',
        'email' => 'test6@test.com',
        'password' => 'testtest',
        'userid' => 'tes6tes5',
        'birthday' => '1989-05-05',
        'age' => '31',
        'gender' => '男',
        'address' => '青森',
        'life_flg' => '1'
        ]);
        $user->save();

    }
}
