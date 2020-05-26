<?php

	use App\Event;
	use App\Address;
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
				"subscription_id" => 3,
				"logo" => 'company.jpg',
				"address_id" => 1,
			]
		);
		$organisation->save();

		$address = new Address(
			[
				"locationname" => "The Ginger Studio",
				"street" => "Bedrijfstraat",
				"streetnumber" => '56',
				"postalcode" => 4000,
				"city" => 'Stad',
				"region" => 'Vlaams-Brabant',
				"country" => 'België',
				"googleframe" => '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2517.042893085301!2d4.467506215814363!3d50.885916479537904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3ddab455e91dd%3A0xf32019b59295d462!2sZaventem%20Station!5e0!3m2!1snl!2sbe!4v1588845662372!5m2!1snl!2sbe\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>',
				"address_id" => $organisation['id'],
			]
		);

		$address->address()->associate($organisation);
		$address->save();

		$event = new Event(
			[
				"title" => "Workshop - Design Thinking",
				"description" => "Cat ipsum dolor sit amet, pelt around the house and up and down stairs chasing phantoms. Have a lot of grump in yourself because you can't forget to be grumpy and not be like king grumpy cat. Grab pompom in mouth and put in water dish hunt by meowing loudly at 5am next to human slave food dispenser lick butt purr like an angel. Meow meow go back to sleep owner brings food and water tries to pet on head, so scratch get sprayed by water because bad cat see brother cat receive pets, attack out of jealousy, or curl up and sleep on the freshly laundered towels.",
				"category" => "workshop",
				"published" => 1,
				"prim_color" => "#CB4335",
				"sec_color" => "#943126",
				"tert_color" => "#EC7063",
				"theme" => "dark",
				"organisation_id" => 1,
				"shape" => "square",
				"schedule" => "timeline",
				"image" => "workshop-design.jpg",
				"starttime" =>  Carbon::parse('2025-10-21 18:50:00'),
			]
		);
		$event->save();

		$address = new Address(
			[
				"locationname" => "The Ginger Studio",
				"street" => "Bedrijfstraat",
				"streetnumber" => '66',
				"postalcode" => 4567,
				"city" => 'Stad',
				"region" => 'West-Brabant',
				"country" => 'België',
				"googleframe" => '<iframe src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2517.042893085301!2d4.467506215814363!3d50.885916479537904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3ddab455e91dd%3A0xf32019b59295d462!2sZaventem%20Station!5e0!3m2!1snl!2sbe!4v1588845662372!5m2!1snl!2sbe width=600 height=450 frameborder=0 style=border:0; aria-hidden=false tabindex=0> </iframe>',
				"address_id" => $event['id'],
			]
		);

		$address->address()->associate($event);
		$address->save();

		$event = new Event(
			[
				"title" => "Kennismakingsbrunch",
				"description" => "I shall purr myself to sleep floof tum, tickle bum, jellybean footies curly toes see brother cat receive pets, attack out of jealousy find box a little too small and curl up with fur hanging out intrigued by the shower. Meow stand in front of the computer screen. Steal mom's crouton while she is in the bathroom.",
				"category" => "not given",
				"published" => 1,
				"image" => "brunch.jpeg",
				"organisation_id" => 1,
				"starttime" =>  Carbon::parse('2025-01-21 13:45:00'),
			]
		);
		$event->save();

		$event = new Event(
			[
				"title" => "Rock Werchter 2024",
				"description" => "Catty ipsum do not try to mix old food with new one to fool me! for hide from vacuum cleaner but scratch the box and chase imaginary bugs, what the heck just happened, something feels fishy kitty run to human with blood on mouth from frenzied attack on poor innocent mouse, don't i look cute?",
				"category" => "festival",
				"published" => 1,
				"image" => "festival.jpg",
				"organisation_id" => 1,
				"ig_username" => "rockwerchterfestival",
				"starttime" =>  Carbon::parse('2024-07-01 18:45:00'),
				"endtime" =>  Carbon::parse('2024-07-04 23:30:00'),
			]
		);
		$event->save();

		$event4 = new Event(
			[
				"title" => "Wireframes - Wat? Hoe? Hunk?",
				"description" => "This cat happen now, it was too purr-fect!!! pet me pet me pet me pet me, bite, scratch, why are you petting me.",
				"category" => "workshop",
				"published" => 1,
				"prim_color" => "#91FC9E",
				"sec_color" => "black",
				"image" => "wireframes.jpeg",
				"theme" => "light",
				"organisation_id" => 1,
				"shape" => "round",
				"schedule" => "timetable",
				"starttime" =>  Carbon::parse('2026-2-04 20:30:00'),
				"endtime" =>  Carbon::parse('2026-2-05 02:30:00'),
			]
		);
		$event4->save();
	}
}
