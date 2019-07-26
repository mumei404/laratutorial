<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function about()
	{
		$data = [];
		$data["first_name"] = "Shimazaki";
		$data["last_name"] = "Tomoya";
		return view('pages.about', $data);
	}
}
