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
		//jika komik tidak ada di tabel
		if (empty($data['komik'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan.');
		}
		return view('komik/detail', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Form Tambah Data'
		];
		// echo "create";
		return view('komik/create', $data);
	}

	public function save()
	{
		$slug = url_title($this->request->getVar('judul'), '-', true);
		//dd($this->request->getVar());
		$this->komikModel->save([
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $this->request->getVar('sampul')
		]);
		//flash data
		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
		//redirect
		return redirect()->to('/komik');
	}
}
