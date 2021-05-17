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
		session();
		$data = [
			'title' => 'Form Tambah Data',
			'validation' => \Config\Services::validation()
		];
		// echo "create";
		return view('komik/create', $data);
	}

	public function save()
	{
		//validate input
		if (!$this->validate([
			'judul' => [
				'rules' => 'required|is_unique[komik.judul]',
				'errors' => [
					'required' => '{field} komik harus diisi',
					'is_unique' => '{field} komik sudah terdaftar'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			//dd($validation);
			return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
		}
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
	public function delete($id)
	{
		$this->komikModel->delete($id);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
		return redirect()->to('/komik');
	}
	public function edit($slug)
	{
		session();
		$data = [
			'title' => 'Form Ubah Data',
			'validation' => \Config\Services::validation(),
			'komik' => $this->komikModel->getKomik($slug)
		];
		// echo "create";
		return view('komik/edit', $data);
	}
	public function update($id)
	{
		$komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
		if ($komikLama['judul'] == $this->request->getVar('judul')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[komik.judul]';
		}
		if (!$this->validate([
			'judul' => [
				'rules' => $rule_judul,
				'errors' => [
					'required' => '{field} komik harus diisi',
					'is_unique' => '{field} komik sudah terdaftar'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			//dd($validation);
			return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
		}
		// if (!$this->validate([
		// 	'judul' => [
		// 		'rules' => 'required|is_unique[komik.judul]',
		// 		'errors' => [
		// 			'required' => '{field} komik harus diisi',
		// 			'is_unique' => '{field} komik sudah terdaftar'
		// 		]
		// 	]
		// ])) {
		// 	$validation = \Config\Services::validation();
		// 	//dd($validation);
		// 	return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
		// }
		//dd($this->request->getVar());
		$slug = url_title($this->request->getVar('judul'), '-', true);
		//dd($this->request->getVar());
		$this->komikModel->save([
			'id' => $id,
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $this->request->getVar('sampul')
		]);
		//flash data
		session()->setFlashdata('pesan', 'Data Berhasil Dirubah');
		//redirect
		return redirect()->to('/komik');
	}
}
