<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	public function sale() {
		return $this->belongsTo('App\Sale', "id_Sale", "id");
	}
}
