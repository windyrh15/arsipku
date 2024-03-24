<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\JabatanModel;
use App\Models\InstansiModel;

class Home extends BaseController
{
	protected $ArsipModel;
	protected $UserModel;
	protected $KategoriModel;
	protected $JabatanModel;
	protected $InstansiModel;
	public function __construct()
	{
		$this->ArsipModel = new ArsipModel();
		$this->UserModel = new UserModel();
		$this->KategoriModel = new KategoriModel();
		$this->JabatanModel = new JabatanModel();
		$this->InstansiModel = new InstansiModel();
	}

	public function index()
	{
		$profile = $this->UserModel->detail_data(session()->get('id_user'));
		$data = [
			'title' => 'Home',
			'arsip' => $this->ArsipModel->all_data(),
			'user' => $this->UserModel->all_data(),
			'kategori' => $this->KategoriModel->all_data(),
			'jabatan' => $this->JabatanModel->all_data(),
			'instansi' => $this->InstansiModel->all_data(),
			'profile' => $profile['nama_user'],
			'foto' => $profile['foto'],
		];
		return view('v_home', $data);
	}

	//--------------------------------------------------------------------

}
