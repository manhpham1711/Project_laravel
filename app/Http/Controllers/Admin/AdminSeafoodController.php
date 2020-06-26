<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AdminSeafoodController extends Controller {

	function index() {
		$data = Product::all();
		return view('admin.seafood.index', ['data' => $data]);
	}

	function formAdd() {
		return view('admin.seafood.add');
	}

	function formEdit($id) {
		$dataEdit = Product::find($id);
		return view('admin.seafood.edit', ['data' => $dataEdit]);
	}

	function update(Request $request) {

		$id = $request->id;
		$product = Product::find($id);

		$product->name = $request->nameNew;
		$product->price = $request->priceNew;
		$product->quantity = $request->quantityNew;

		$photo = $request->file('photoNew');
		$status = "Con Hang";

		if ($request->quantityNew <= 0) {
			$status = "Het Hang";
		}
		$product->status = $status;
		if (is_null($photo)) {
			$product->image = $product->image;
			$product->save();
		} else {
			$product->image = $photo->store("public");
			$product->save();
		}
		return redirect()->route('admin.seafood.index');

	}

	function add_seafood(Request $request) {

		$product = new Product;

		$product->name = $request->nameseafood;
		$product->price = $request->price;
		$product->quantity = $request->quantity;

		$status = "Con Hang";
		if ($quantity <= 0) {
			$status = "Het Hang";
		}

		$product->status = $status;
		$product->image = $request->file('photo')->store("public");

		$product->save();

		return redirect()->route('admin.seafood.index');

	}
	function delete($id) {

		$product = Product::find($id);
		$product->delete();
		echo "<script> alert('Xoa Thanh Cong');</script>";
		return redirect()->route('admin.seafood.index');
	}
}
