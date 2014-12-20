<?php

class DatabaseSeeder extends Seeder {
	public function run()
	{
		Eloquent::unguard();
        $this->call('UserTableSeeder');
        $this->call('BookTableSeeder');

        $this->command->info('User table seeded!');

		// $this->call('UserTableSeeder');
	}

}