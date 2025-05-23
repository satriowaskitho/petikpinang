<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\VersiModel;

class Versi extends BaseController
{
  protected $bukuModel;
  protected $versiModel;

  public function sumHardCopy($id_buku)
  {
    $this->versiModel = new VersiModel();
    $hardcopyBuku = $this->versiModel->selectSum('hardcopy')->where('id_buku', $id_buku)->get()->getRow()->hardcopy;
    if ($hardcopyBuku) {
      return $hardcopyBuku;
    } else {
      $hardcopyBuku = 0;
      return $hardcopyBuku;
    }
  }
  public function sumSoftCopy($id_buku)
  {
    $this->versiModel = new VersiModel();
    $softcopyBuku = $this->versiModel->selectSum('softcopy')->where('id_buku', $id_buku)->get()->getRow()->softcopy;
    if ($softcopyBuku) {
      return $softcopyBuku;
    } else {
      $softcopyBuku = 0;
      return $softcopyBuku;
    }
  }
  public function updateSum($id_buku)
  {
    $this->bukuModel = new BukuModel();
    $hardcopyBuku = $this->sumHardCopy($id_buku);
    $softcopyBuku = $this->sumSoftCopy($id_buku);

    $data = [
      'hardcopy' => $hardcopyBuku,
      'softcopy' => $softcopyBuku,
    ];
    $this->bukuModel->update($id_buku, $data);
  }

  public function buat($id_buku)
  {
    if (!session('admin')) {
      return redirect()->to('admin');
    }
    if ($this->request->getVar('softcopy')) {
      $softcopy = 1;
    } else {
      $softcopy = 0;
    }

    $this->versiModel = new VersiModel();
    $this->versiModel->save([
      'id_buku' => $id_buku,
      'versi' => $this->request->getVar('versi'),
      'bulan' => $this->request->getVar('bulan'),
      'tahun' => $this->request->getVar('tahun'),
      'penerbit' => $this->request->getVar('penerbit'),
      'ruang' => $this->request->getVar('ruang'),
      'lorong' => $this->request->getVar('lorong'),
      'rak' => $this->request->getVar('rak'),
      'baris' => $this->request->getVar('baris'),
      'hardcopy' => $this->request->getVar('hardcopy'),
      'softcopy' => $softcopy,
    ]);

    $this->updateSum($id_buku);
    return redirect()->to('/home');
  }
  public function edit($id)
  {
    if (!session('admin')) {
      return redirect()->to('admin');
    }
    if ($this->request->getVar('softcopy')) {
      $softcopy = 1;
    } else {
      $softcopy = 0;
    }
    $this->versiModel = new VersiModel();
    $id_buku = $this->versiModel->getVersi($id);
    $id_buku = $id_buku['id_buku'];

    $data = [
      'versi' => $this->request->getVar('versi'),
      'bulan' => $this->request->getVar('bulan'),
      'tahun' => $this->request->getVar('tahun'),
      'penerbit' => $this->request->getVar('penerbit'),
      'ruang' => $this->request->getVar('ruang'),
      'lorong' => $this->request->getVar('lorong'),
      'rak' => $this->request->getVar('rak'),
      'baris' => $this->request->getVar('baris'),
      'hardcopy' => $this->request->getVar('hardcopy'),
      'softcopy' => $softcopy,
    ];
    $this->versiModel->update($id, $data);
    $this->updateSum($id_buku);
    return redirect()->to('/home');
  }
  public function hapus($id)
  {
    if (!session('admin')) {
      return redirect()->to('admin');
    }
    $this->versiModel = new VersiModel();
    $id_buku = $this->versiModel->getVersi($id);
    $id_buku = $id_buku['id_buku'];

    $this->versiModel->delete($id);
    $this->updateSum($id_buku);
    return redirect()->to('/home');
  }
}
