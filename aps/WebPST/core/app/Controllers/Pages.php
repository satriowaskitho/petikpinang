<?php

namespace App\Controllers;

use App\Models\PengawasModel;
use App\Models\PresensiModel;
use CodeIgniter\I18n\Time;

class Pages extends BaseController
{
    protected $pengawasModel;
    protected $presensiModel;

    public function index()
    {
        $this->pengawasModel = new PengawasModel();
        $this->presensiModel = new PresensiModel();

        $date = Time::now();
        $dateString = $date->toDateTimeString();
        $dateArray = explode(" ", $dateString);
        $tanggal = $dateArray[0];


        $username = session()->get('username');
        $userid = session()->get('id');

        $presensi = $this->presensiModel->getPresensiByUserIddanTanggal($userid, $tanggal);
        if ($presensi) {
            $mulai = $presensi['mulai'];
            $selesai = $presensi['selesai'];

            $mulaiArray = explode(":", $mulai);
            $mulai = $mulaiArray[0] . ":" . $mulaiArray[1];

            $selesaiArray = explode(":", $selesai);
            $selesai = $selesaiArray[0] . ":" . $selesaiArray[1];

            $data = [
                'title' => 'Web PST',
                'pengawas' => $this->pengawasModel->getPengawas($username),
                'presensi' => $this->presensiModel->getPresensiByUserIddanTanggal($userid, $tanggal),
                'mulai' => $mulai,
                'selesai' => $selesai,
            ];

            return view('home', $data);
        }

        $data = [
            'title' => 'Web PST',
            'pengawas' => $this->pengawasModel->getPengawas($username),
            'presensi' => $this->presensiModel->getPresensiByUserIddanTanggal($userid, $tanggal),
        ];

        return view('home', $data);
    }
    public function arsip(): string
    {
        $this->pengawasModel = new PengawasModel();
        $this->presensiModel = new PresensiModel();

        $data = [
            'title' => 'Arsip | Web PST',
            'pengawas' => $this->pengawasModel->getPengawas(),
            'presensi' => $this->presensiModel->orderBy('tanggal', 'desc')->paginate(10),
            'pager' => $this->presensiModel->pager
        ];
        return view('pages/arsip', $data);
    }
}
