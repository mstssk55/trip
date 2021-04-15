<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TripsTableSeeder::class);
        $this->call(FriendsTableSeeder::class);
        $this->call(TripusersTableSeeder::class);
        $this->call(PlancategoriesTableSeeder::class);
        $this->call(TripplansTableSeeder::class);
        // $this->call(EventsTableSeeder::class);
    }
}
