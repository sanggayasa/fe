<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		//echo "hallo word";
		//kirim parameter lewat controler
		$data = [
			'title' => 'contact',
			'menu' => ['satu', 'dua', 'tiga']
		];
		echo view('layout/header', $data);
		echo view('pages/contact');
		echo view('layout/footer');
	}
	public function profil()
	{
		//echo "hallo word";
		$data = [
			'title' => 'profil'
		];
		echo view('layout/header', $data);
		echo view('pages/profil');
		echo view('layout/footer');
	}
}
