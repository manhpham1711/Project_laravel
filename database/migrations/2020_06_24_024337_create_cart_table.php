<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cart', function (Blueprint $table) {
			$table->id();
			$table->integer('quantity');
			$table->unsignedBigInteger('id_user');
			$table->foreign('id_user')->references('id')->on('users');
			$table->unsignedBigInteger('id_product');
			$table->foreign('id_product')->references('id')->on('products');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('cart');
	}
}
