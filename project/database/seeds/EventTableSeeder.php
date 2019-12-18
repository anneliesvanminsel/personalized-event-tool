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
				"logo" => "city.jpeg",
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
				"logo" => "plants.jpeg",
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
				"logo" => "children.jpeg",
			]
		);
		$event->save();

		$event = new Event(
			[
				"title" => "Rock Werchter",
				"description" => "Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.",
				"type" => "festival",
				"status" => 1,
				"bkgcolor" => "#91FC9E",
				"textcolor" => "black",
				"logo" => "rockwerchter.jpg",
			]
		);
		$event->save();
	}
}
