<?php

use Illuminate\Database\Seeder;
use App\Subscription;


class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'title', 'description', 'price',
		$subscription = new Subscription(
			[
				'title' => 'essential',
				'description' => 'Alles wat je nodig hebt om in enkele minuten te beginnen met verkopen',
				'price' => 50,
			]
		);
		$subscription->save();

		$subscription = new Subscription(
			[
				'title' => 'professional',
				'description' => 'Een krachtige oplossing om verkopen te stimuleren en je bedrijf te laten groeien',
				'price' => 100,
			]
		);
		$subscription->save();

		$subscription = new Subscription(
			[
				'title' => 'premium',
				'description' => 'Op maat gemaakte partnerships voor grote en complexe evenementen',
				'price' => 150,
			]
		);
		$subscription->save();
    }
}
