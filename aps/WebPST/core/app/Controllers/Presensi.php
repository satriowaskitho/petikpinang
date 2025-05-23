<?php

namespace App\Controllers;
use App\Models\PengawasModel;
use App\Models\PresensiModel;
use CodeIgniter\I18n\Time;

class Presensi extends BaseController
{
    protected $presensiModel;
    public function __construct()
    {
        $this->presensiModel = new PresensiModel();
    }

    public function index()
    {
        $date = Time::now(); 
        $userid = session()->get('id');

        $this->presensiModel->save([
          'id_user' => $userid,
          'tanggal' => $date,
          'ada' => false,
          'mulai' => $date,
          'selesai' => $date
        ]);
        return redirect()->to('pages');
    }
    public function update()
    {
      $userid = session()->get('id');

      $date = Time::now();
      $dateString = $date->toDateTimeString();
      $dateArray = explode(" ", $dateString);
      $tanggal = $dateArray[0];
      
      $presensi = $this->presensiModel->getPresensiByUserIddanTanggal($userid,$tanggal);
      $id_presensi = $presensi['id'];
      
      $data =[
        'selesai' => Time::now(),
      ];
      $this->presensiModel->update($id_presensi,$data);
      return redirect()->to('pages');
    }
}
