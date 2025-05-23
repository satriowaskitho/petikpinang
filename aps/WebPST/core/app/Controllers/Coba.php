<?php

namespace App\Controllers;

use App\Models\PengawasModel;
use App\Models\PresensiModel;
use App\Models\LaporanModel;
use CodeIgniter\I18n\Time;

class Coba extends BaseController
{
    protected $pengawasModel;
    protected $presensiModel;
    protected $laporanModel;
    public function __construct()
    {
        $this->pengawasModel = new PengawasModel();
        $this->presensiModel = new PresensiModel();
        $this->laporanModel = new LaporanModel();
    }
    public function index()
    {
        $dateString = "2023-12-23";
        $dateObject = date_create($dateString);
        $dayOfWeek = $dateObject->format('l');

        echo dd($dayOfWeek);
    }
}
