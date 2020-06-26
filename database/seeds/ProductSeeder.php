<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(Faker $faker) {
		for ($i = 0; $i < 3; $i++) {
			DB::table('products')->insert([
				'name' => "Cún " . $i,
				'price' => 10000,
				'image' => "public/example.jpeg",
				'quantity' => $faker->numberBetween(1, 30),
				'status' => "Sản phẩm đang được ưa chuộng nhất hiện nay",
			]);
		}

	}
}
