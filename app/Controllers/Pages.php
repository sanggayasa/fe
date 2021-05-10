<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		//echo "hallo word";
		return view('pages/contact');
	}
	public function profil()
	{
		//echo "hallo word";
		echo view('layout/header');
		echo view('pages/profil');
		echo view('layout/footer');
	}
}
