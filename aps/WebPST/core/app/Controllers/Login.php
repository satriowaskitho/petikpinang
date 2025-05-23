<?php

namespace App\Controllers;

use App\Models\PengawasModel;

class Login extends BaseController
{
  protected $pengawasModel;
  public function __construct()
  {
    $this->pengawasModel = new PengawasModel();
  }

  public function index(): string
  {
    $data = [
      'title' => 'Login | Web PST'
    ];

    return view('login_view', $data);
  }
  public function masuk()
  {
    $login = $this->request->getPost();
    if ($login) {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');


      $pengawas = $this->pengawasModel->where('username', $username)->first();

      if ($pengawas !== null) {
        if ($pengawas['password'] != $password) {
          $err = "password tidak sesuai";
        }
      } else {
        $err = "username tidak ditemukan";
      }

      if (empty($err)) {
        $dataSesi = [
          'status' => true,
          'id' => $pengawas['id'],
          'nama' => $pengawas['nama'],
          'username' => $pengawas['username'],
          'password' => $pengawas['password'],
          'role' => $pengawas['role'],
        ];
        session()->set($dataSesi);
        return redirect()->to('login/updateStatus/'.$pengawas['id']);
      }else {
        session()->setFlashdata('error', $err);
        return redirect()->to('login');
      }
    }
  }

  public function updateStatus($id){
    $status = true;
    $this->pengawasModel->save([
      'id' => $id,
      'status' => $status,
    ]);
    return redirect()->to('pages');
  }

  public function keluar($id)
  {
    $status = false;
    $this->pengawasModel->save([
      'id' => $id,
      'status' => $status,
    ]);
    session()->destroy();
    return redirect()->to('login');
  }
}
