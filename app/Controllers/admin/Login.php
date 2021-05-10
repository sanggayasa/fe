<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
	//request paramater pada link dengan satu parameter
	public function index($nama = '')
	{
		echo "nama $nama";
		//return view('login');
	}
	//request paramater pada link dengan 2 parameter
	public function about($nama = '', $umur = 0)
	{
		echo " nama saya $nama dan umur saya $umur";
	}
}
