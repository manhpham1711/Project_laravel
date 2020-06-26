<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert([
			'name' => "Mạnh Đẹp Trai",
			'username' => "admin",
			'password' => "$2y$10$guEUxDV5nNAkomwRsBifK.VZJk5engkqmN3eFBAEOlAit5M62gt9qC", //123
			'route' => "admin",
		]);
	}
}