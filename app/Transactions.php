<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model {
	public function nameUser() {
		return $this->belongsTo('App\User', "id_user", "id");
	}

	public function money() {
		$formatedPrice = number_format($this->amount, 0, ',', '.');
		return $formatedPrice . "đ";
	}
}
