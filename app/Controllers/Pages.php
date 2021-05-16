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
		return view('pages/contact', $data);
	}
	public function profil()
	{
		//echo "hallo word";
		$data = [
			'title' => 'profil',
			'alamat' => [
				[
					'tipe' => 'one',
					'alamat' => 'jl perikan',
					'kota' => 'jaktim',
				],
				[
					'tipe' => 'two',
					'alamat' => 'jl kober',
					'kota' => 'jaksel',
				]
			]

		];
		echo view('layout/header', $data);
		echo view('pages/profil');
		echo view('layout/footer');
	}
}
