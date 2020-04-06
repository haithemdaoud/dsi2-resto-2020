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
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BookingsSeeder::class);
        $this->call(MealsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(OrderLinesSeeder::class);
    }
}
