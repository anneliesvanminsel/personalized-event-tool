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
        $this->call(SubscriptionTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(SessionTableSeeder::class);
    }
}
