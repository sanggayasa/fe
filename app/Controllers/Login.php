<?php

namespace App\Controllers;

class Login extends BaseController
{	
	//request paramater pada link dengan satu parameter
	public function index($nama='')
	{
		echo "$nama"
		//return view('login');
	}
	//request paramater pada link dengan 2 parameter
	// public function index($nama='',$umur = 0)
	// {
	// 	echo " $nama dan $umur"
	// }
}
}
