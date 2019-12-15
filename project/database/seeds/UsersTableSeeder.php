<?php

	use App\User;
	use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/*
			Database:

			$table->string('name');
			$table->string('email')->unique();
			$table->date('birthday')->nullable();
			$table->string('role');
			$table->timestamp('email_verified_at')->nullable();
			$table->string('phonenumber')->nullable();
			$table->string('password');
		*/

		$user = new User(
			[
				'name' => 'organisator',
				'email' => 'organisator@bedrijf.be',
				'password' => \Illuminate\Support\Facades\Hash::make("bedrijf"),
				'role' => 'organisator',
			]
		);
		$user->save();

		$user = new User(
			[
				'name' => 'medewerker',
				'email' => 'medewerker@bedrijf.be',
				'password' => \Illuminate\Support\Facades\Hash::make("bedrijf"),
				'role' => 'volunteer',
			]
		);
		$user->save();

		$user = new User(
			[
				'name' => 'bezoeker',
				'email' => 'bezoeker@mail.be',
				'password' => \Illuminate\Support\Facades\Hash::make("bedrijf"),
				'role' => 'guest',
			]
		);
		$user->save();

    }
}
