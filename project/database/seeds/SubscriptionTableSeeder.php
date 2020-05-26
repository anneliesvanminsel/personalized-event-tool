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
				'title' => 'basis',
				'description' => 'Toeslag per verkocht ticket </br> Gratis voor gratis tickets',
				'items' => '<li>één tickettype,</li>  <li>basis evenementpagina,</li>  <li>vermelding op <span class="logo logo--s">evento</span>,</li> <li>online hulpcentrum.</li>',
				'price' => 0.60,
			]
		);
		$subscription->save();

		$subscription = new Subscription(
			[
				'title' => 'professioneel',
				'description' => 'Toeslag per verkocht ticket </br> Gratis voor gratis tickets',
				'items' => '<li>alles van basis abonnement,</li> <li>meerdere tickettypes (max. 4),</li> <li>extra elementen (grondplan, programma, en meer) toevoegen aan de evenementpagina,</li> <li>telefonisch hulpcentrum.</li>',
				'price' => 1,
			]
		);
		$subscription->save();

		$subscription = new Subscription(
			[
				'title' => 'premium',
				'description' => 'Toeslag per verkocht ticket </br> Gratis voor gratis tickets',
				'items' => '<li>alles van professioneel abonnement,</li>  <li>eigen personaliseerbare evenementpagina,</li> <li>ongelimiteerde tickettypes.</li>',
				'price' => 1.50,
			]
		);
		$subscription->save();
    }
}
