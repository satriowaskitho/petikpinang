<?php

namespace App\Controllers;

use App\Models\PengawasModel;
use CodeIgniter\CodeIgniter;

class Pengawas extends BaseController
{
  protected $pengawasModel;
  public function __construct()
  {
    $this->pengawasModel = new PengawasModel();
  }

  public function index(): string
  {
    $data = [
      'title' => 'Pengawas | Web PST',
      'pengawas' => $this->pengawasModel->orderBy('status', 'desc')->paginate(10),
      'pager' => $this->pengawasModel->pager
      // 'pengawas' => $this->pengawasModel->getPengawas()
    ];
    return view('pages/listPengawas', $data);
  }

  public function profil($username)
  {
    $data = [
      'title' => 'Profil | Web PST',
      'pengawas' => $this->pengawasModel->getPengawas($username)
    ];

    if (empty($data['pengawas'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengawas' . $username . 'tidak ada');
    }

    return view('pages/profil', $data);
  }
  public function buatPengawas()
  {
    if (!$this->validate([
      'username' => 'required|is_unique[pengawas.username]'
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/pengawas');
    }
    $status = false;
    $this->pengawasModel->save([
      'nama' => $this->request->getVar('nama'),
      'username' => $this->request->getVar('username'),
      'password' => $this->request->getVar('password'),
      'status' => $status
    ]);

    return redirect()->to('/pengawas');
  }

  public function hapus($id)
  {
    $this->pengawasModel->delete($id);
    return redirect()->to('/pengawas');
  }

  public function edit($id)
  {
    $status = true;
    $this->pengawasModel->save([
      'id' => $id,
      'nama' => $this->request->getVar('nama'),
      'username' => $this->request->getVar('username'),
      'password' => $this->request->getVar('password'),
      'status' => $status,
    ]);
    $pengawas = $this->pengawasModel->getPengawasById($id);
    $id_sesi = session()->get('id');

    if ($id_sesi == $id) {
      $dataSesi = [
        'nama' => $pengawas['nama'],
        'username' => $pengawas['username'],
        'password' => $pengawas['password'],
      ];
      session()->set($dataSesi);
    }
    return redirect()->to('/pengawas/' . $pengawas['username']);
  }
}
