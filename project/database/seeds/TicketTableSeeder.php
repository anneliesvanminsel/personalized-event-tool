<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name', 'price', 'type', 'totaltickets', 'date','event_id',
		$ticket = new Ticket(
			[
				'name' => 'dagticket',
				'price' => 19.99,
				'type' => 'daypass',
				'date' => '28/10/2020',
				'totaltickets' => 200,
				'event_id' => 1,
			]
		);
		$ticket->save();
    }
}
