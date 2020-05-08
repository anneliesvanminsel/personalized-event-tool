<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use Carbon\Carbon;

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
				'type' => 'dagticket',
				'price' => 19.99,
				'description' => 'dagticket voor 21 oktober 2020',
				'date' => Carbon::parse('2025-10-21'),
				'totaltickets' => 200,
				'event_id' => 1,
			]
		);
		$ticket->save();

		$ticket = new Ticket(
			[
				'type' => 'VIP-Pass',
				'price' => 19,
				'description' => 'dagticket voor 21 oktober 2020',
				'date' => Carbon::parse('2025-10-21'),
				'totaltickets' => 200,
				'event_id' => 1,
			]
		);
		$ticket->save();

		$ticket = new Ticket(
			[
				'type' => 'premium',
				'price' => 19,
				'description' => 'premium voor 21 oktober 2020',
				'date' => Carbon::parse('2025-10-21'),
				'totaltickets' => 200,
				'event_id' => 1,
			]
		);
		$ticket->save();
    }
}
