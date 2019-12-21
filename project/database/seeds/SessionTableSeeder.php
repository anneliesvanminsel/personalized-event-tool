<?php

	use Carbon\Carbon;
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
				'name' => 'Dag 1',
				'city' => 'Leuven',
				'date' => Carbon::parse('2020-10-21'),
				'locationname' => '300CC',
				'totaltickets' => 50,
				'event_id' => 1,
			]
		);
		$session->save();

		$session = new Session(
			[
				'name' => 'Dag 2',
				'city' => 'Leuven',
				'date' => Carbon::parse('2020-10-22'),
				'locationname' => '300CC',
				'totaltickets' => 50,
				'event_id' => 1,
			]
		);
		$session->save();
    }
}
