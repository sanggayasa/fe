<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
	protected $komikModel;
	public function __construct()
	{
		$this->komikModel = new KomikModel();
	}
	public function index()
	{
		// cara koneksi db model manual
		//$db = \Config\Database::connect();
		//$komik = $db->query("SELECT * FROM komik");
		//foreach ($komik->getResultArray() as $row){
		//	d($row);
		//}

		// cara koneksi db model bawaan CI
		//$komikModel = new \App\Models\KomikModel();
		//$komikModel = new KomikModel();
		$komik = $this->komikModel->findAll();
		//dd($komik);
		$data = [
			'title' => 'komik',
			'komik' => $this->komikModel->getKomik()
		];
		return view('komik/index', $data);
	}
	public function detail($slug)
	{
		//$komik = $this->komikModel->getKomik($slug);
		//dd($komik);
		$data = [
			'title' => 'komik',
			'komik' => $this->komikModel->getKomik($slug)
		];
		return view('komik/detail', $data);
	}
}
