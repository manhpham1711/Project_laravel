<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaleSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(Faker $faker) {
		for ($i = 0; $i < 19; $i++) {
			DB::table('sales')->insert([
				'code' => strtoupper(Str::random(6)),
				'percent' => $faker->randomNumber(2),
			]);
		}
	}
}
