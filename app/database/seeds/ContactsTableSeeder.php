<?php

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		$contacts = array(
			["first_name" => "Hemant", "last_name" => "Singh", "email_address" => "hemant@gmail.com", "description" => "Hero of the year"],
			["first_name" => "Vinay", "last_name" => "Maurya", "email_address" => "vinay@gmail.com", "description" => "Hero of the year 2013"],
			["first_name" => "Varun", "last_name" => "Gupta", "email_address" => "varun@gmail.com", "description" => "Hero of the year 2014"],
		);

		// Uncomment the below to run the seeder
		DB::table('contacts')->insert($contacts);
	}

}
