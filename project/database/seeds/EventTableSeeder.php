<?php

	use App\Event;
	use App\Organisation;
	use Carbon\Carbon;
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
		$organisation = new Organisation(
			[
				"name" => "The Ginger Studio",
				"description" => "The Ginger Studio is een design studio dat regelmatig een design evenementen organiseert.",
				"subscription_id" => 1,
				"logo" => 'company.jpg',
				"address_id" => 1,
			]
		);
		$organisation->save();

		$event = new Event(
			[
				"title" => "Workshop - Design Thinking",
				"description" => "Workshop Design Thinking met beperkte plaatsen! Schrijf je snel in!",
				"type" => "workshop",
				"status" => 1,
				"bkgcolor" => "#581845",
				"textcolor" => "white",
				"logo" => "workshop-design.jpg",
				"starttime" =>  Carbon::parse('2020-10-21'),
			]
		);
		$event->save();

		$organisation->events()->attach($event);

		$event = new Event(
			[
				"title" => "Kennismakingsbrunch",
				"description" => "Wil je graag wat meer weten over het nieuwe bedrijf 'The Ginger Studio'? Kom dan zeker naar onze brunch!",
				"type" => "not given",
				"status" => 0,
				"bkgcolor" => "#FF5733",
				"textcolor" => "white",
				"logo" => "brunch.jpeg",
				"starttime" =>  Carbon::parse('2020-01-21'),
			]
		);
		$event->save();

		$organisation->events()->attach($event);

		$event = new Event(
			[
				"title" => "How to User Design ?!",
				"description" => "Leer nu wat een User Design juist is en hoe je dit kunt toepassen in jouw eigen bedrijf. Beperkte tickets!",
				"type" => "seminarie",
				"status" => 1,
				"bkgcolor" => "#001C79",
				"textcolor" => "white",
				"logo" => "design.jpeg",
				"starttime" =>  Carbon::parse('2019-12-17'),
			]
		);
		$event->save();

		$organisation->events()->attach($event);

		$event4 = new Event(
			[
				"title" => "Wireframes - Wat? Hoe? Hunk?",
				"description" => "Problemen met het maken van wireframes? Schrijf je dan snel in voor deze cursus.",
				"type" => "workshop",
				"status" => 1,
				"bkgcolor" => "#91FC9E",
				"textcolor" => "black",
				"logo" => "wireframes.jpeg",
				"starttime" =>  Carbon::parse('2020-2-04'),
			]
		);
		$event4->save();

		$organisation->events()->attach($event4);
	}
}
