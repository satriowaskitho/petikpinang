<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\VersiModel;

class Buku extends BaseController
{
  protected $bukuModel;
  protected $versiModel;

  public function buat()
  {
    if (!session('admin')) {
      return redirect()->to('admin');
    }
    $this->bukuModel = new BukuModel();
    $this->bukuModel->save([
      'id_publikasi' => $this->request->getVar('id_publikasi'),
      'judul' => $this->request->getVar('judul'),
      'hardcopy' => 0,
    ]);
    return redirect()->to('/home');
  }
  public function hapus($id)
  {
    if (!session('admin')) {
      return redirect()->to('admin');
    }
    $this->bukuModel = new BukuModel();
    $gambar = $this->bukuModel->getBuku($id);

    $this->bukuModel->delete($id);
    return redirect()->to('/home');
  }
  public function edit($id)
  {
    if (!session('admin')) {
      return redirect()->to('admin');
    }
    $this->bukuModel = new BukuModel();
    $data = [
      'id_publikasi' => $this->request->getVar('id_publikasi'),
      'judul' => $this->request->getVar('judul'),
    ];
    $this->bukuModel->update($id, $data);
    return redirect()->to('/home');
  }
}
