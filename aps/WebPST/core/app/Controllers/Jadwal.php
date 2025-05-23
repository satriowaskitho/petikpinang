<?php



namespace App\Controllers;



use App\Models\JadwalModel;

use CodeIgniter\I18n\Time;



class Jadwal extends BaseController

{

  protected $jadwalModel;



  public function index()

  {

    $this->jadwalModel = new JadwalModel();

    $data = [

      'title' => 'Jadwal | Web PST',

      'jadwal' => $this->jadwalModel->orderBy('tanggal', 'desc')->paginate(10),

      'pager' =>  $this->jadwalModel->pager

    ];

    return view('pages/jadwal', $data);

  }

  public function buat()

  {

    $this->jadwalModel = new JadwalModel();

    $tanggal = $this->request->getVar('tanggal') . "-" . "01";

    $tanggal = Time::parse($tanggal);



    $cekTanggal = $this->jadwalModel->getJadwalByTanggal($tanggal);



    if ($this->validate(['gambar' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',])) {



      $bulan = $this->request->getVar('tanggal');

      $bulan = strtotime($bulan);

      $bulan = date('F Y', $bulan);



      $fileGambar = $this->request->getFile('gambar');

      $gambar = $fileGambar->getRandomName();

      $fileGambar->move('IMG', $gambar);



      if ($cekTanggal) {

        unlink('IMG/'.$cekTanggal['gambar']);

        $data = [

          'gambar' => $gambar,

        ];

        $this->jadwalModel->update($cekTanggal['id'], $data);

        return redirect()->to('/jadwal');

      }



      $this->jadwalModel->save([

        'tanggal' => $tanggal,

        'gambar' => $gambar,

        'bulan' => $bulan,

      ]);

      return redirect()->to('/jadwal');

    } else {

      return redirect()->to('/jadwal');

    }

  }

  public function hapus($id){

    $this->jadwalModel = new JadwalModel();

    $gambar = $this->jadwalModel->getJadwal($id);

    unlink('IMG/'.$gambar['gambar']);



    $this->jadwalModel->delete($id);

    return redirect()->to('/jadwal');

  }

}

