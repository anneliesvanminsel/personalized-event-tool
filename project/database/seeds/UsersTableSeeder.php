<?php

	use App\User;
	use Carbon\Carbon;
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
				'name' => 'Annelies Van Minsel',
				'email' => 'organisator@bedrijf.be',
				'password' => \Illuminate\Support\Facades\Hash::make("bedrijf"),
				'role' => 'organisator',
				'organisation_id' => 1,
				'birthday' => Carbon::parse('1994-12-01'),
				'phonenumber' => "0456 78 90 43",
			]
		);
		$user->save();

		$user = new User(
			[
				'name' => 'Jan Peeters',
				'email' => 'bezoeker@mail.be',
				'password' => \Illuminate\Support\Facades\Hash::make("bedrijf"),
				'role' => 'guest',
				'birthday' => Carbon::parse('1992-12-01'),
				'phonenumber' => "0456 78 90 43",
			]
		);
		$user->save();

    }
}
