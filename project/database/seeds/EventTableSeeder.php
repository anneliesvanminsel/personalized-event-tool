<?php

	use App\Event;
	use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$event = new Event(
			[
				"title" => "Middelton Christmas Fair",
				"description" => "Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.",
				"type" => "festival",
				"status" => 1,
				"bkgcolor" => "#581845",
				"textcolor" => "white",
				"logo" => "https://images.pexels.com/photos/1047442/pexels-photo-1047442.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
			]
		);
		$event->save();

		$event = new Event(
			[
				"title" => "Aldovias Halloween",
				"description" => "Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.",
				"type" => "festival",
				"status" => 0,
				"bkgcolor" => "#FF5733",
				"textcolor" => "white",
				"logo" => "https://images.pexels.com/photos/948199/pexels-photo-948199.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
			]
		);
		$event->save();

		$event = new Event(
			[
				"title" => "Ehb rock",
				"description" => "Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.",
				"type" => "festival",
				"status" => 1,
				"bkgcolor" => "#001C79",
				"textcolor" => "white",
				"logo" => "https://images.pexels.com/photos/59884/pexels-photo-59884.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
			]
		);
		$event->save();

		$event = new Event(
			[
				"title" => "Ehb Rock",
				"description" => "Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.",
				"type" => "festival",
				"status" => 1,
				"bkgcolor" => "#91FC9E",
				"textcolor" => "black",
				"logo" => "https://images.pexels.com/photos/1540406/pexels-photo-1540406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
			]
		);
		$event->save();
	}
}
