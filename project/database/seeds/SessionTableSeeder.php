<?php

use Illuminate\Database\Seeder;
use App\Session;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name', 'city', 'date', 'status', 'locationname', 'totaltickets', 'event_id',

		$session = new Session(
			[
				'name' => 'organisator',
				'city' => 'organisator@bedrijf.be',
				'date' => 'lala',
				'status' => 'organisator',
				'locationname' => 'organisator',
				'totaltickets' => 'organisator',
				'event_id' => '1',
			]
		);
		$session->save();
    }
}
