<?php

namespace App\Controllers;


use App\Models\KecModel;
use App\Models\KelModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{

    use ResponseTrait;

    public function index(): string
    {
        return view('layout');
    }

    public function getDataKecamatan()
    {
        $kategori = $this->request->getGet('kategori');
        $tahun = $this->request->getGet('tahun');
        $komponen = $this->request->getGet('komponen');
        $modelkec = new KecModel();
        $datapetakec = $modelkec->getData($kategori, $tahun, $komponen);
        return $this->respond($datapetakec);
    }

    public function getDataKelurahan()
    {
        $kategori1 = $this->request->getGet('kategori1');
        $tahun1 = $this->request->getGet('tahun1');
        $komponen1 = $this->request->getGet('komponen1');
        $modelkel = new KelModel();
        $datapetakel = $modelkel->getData1($kategori1, $tahun1, $komponen1);
        return $this->respond($datapetakel);
    }
}
