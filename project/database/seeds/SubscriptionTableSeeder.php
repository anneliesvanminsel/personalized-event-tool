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
				'description' => 'Toeslag per verkocht ticket </br> Gratis voor gratis tickets',
				'price' => 0.60,
			]
		);
		$subscription->save();

		$subscription = new Subscription(
			[
				'title' => 'professional',
				'description' => 'Toeslag per verkocht ticket </br> Gratis voor gratis tickets',
				'price' => 1,
			]
		);
		$subscription->save();

		$subscription = new Subscription(
			[
				'title' => 'premium',
				'description' => 'Toeslag per verkocht ticket </br> Gratis voor gratis tickets',
				'price' => 1.50,
			]
		);
		$subscription->save();
    }
}
