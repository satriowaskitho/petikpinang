<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\PengawasModel;
use App\Models\PresensiModel;
use \Dompdf\Dompdf;

class Laporan extends BaseController
{
  protected $presensiModel;
  protected $laporanModel;
  protected $pengawasModel;

  public function index()
  {
    $userid = session()->get('id');
    $this->presensiModel = new PresensiModel();
    $data = [
      'title' => 'Laporan | Web PST',
      'presensi' => $this->presensiModel->orderBy('tanggal', 'desc')->where(['id_user' => $userid])->paginate(10),
      'pager' =>  $this->presensiModel->pager
    ];

    return view('pages/laporanku', $data);
  }

  public function lapor($id_presensi)
  {
    $this->presensiModel = new PresensiModel();
    $this->laporanModel = new LaporanModel();
    $this->pengawasModel = new PengawasModel();

    $laporan = $this->laporanModel->getLaporanByPresensiId($id_presensi);
    $presensi = $this->presensiModel->getPresensiBy($id_presensi);
    $pengawas = $this->pengawasModel->getPengawasById($presensi['id_user']);

    $mulai = $presensi['mulai'];
    $selesai = $presensi['selesai'];

    $mulaiArray = explode(":", $mulai);
    $mulai = $mulaiArray[0] . ":" . $mulaiArray[1];

    $selesaiArray = explode(":", $selesai);
    $selesai = $selesaiArray[0] . ":" . $selesaiArray[1];

    $hari = date_create($presensi['tanggal']);
    $hari = $hari->format('l');

    switch ($hari) {
      case "Monday":
        $hari = "Senin";
        break;
      case "Tuesday":
        $hari = "Selasa";
        break;
      case "Wednesday":
        $hari = "Rabu";
        break;
      case "Thursday":
        $hari = "Kamis";
        break;
      case "Friday":
        $hari = "Jumat";
        break;
      case "Saturday":
        $hari = "Sabtu";
        break;
      case "Sunday":
        $hari = "Minggu";
        break;
    }

    if ($laporan) {
      $data = [
        'title' => 'Laporan | Web PST',
        'laporan' => $laporan,
        'presensi' => $presensi,
        'pengawas' => $pengawas,
        'mulai' => $mulai,
        'selesai' => $selesai,
        'hari' => $hari,
      ];
      return view('pages/lapor', $data);
    } else {
      return redirect()->to('Laporan/create/' . $id_presensi);
    }
  }

  public function create($id_presensi)
  {
    $data = [
      'title' => 'Laporan | Web PST',
      'id_presensi' => $id_presensi,
    ];
    return view('pages/createlaporan', $data);
  }
  public function buatLaporan()
  {
    $this->laporanModel = new LaporanModel();
    $this->presensiModel = new PresensiModel();

    $data = [
      'ada' => true,
    ];
    $id_presensi = $this->request->getPost('id_presensi');
    $this->presensiModel->update($id_presensi, $data);

    $this->laporanModel->insert([
      'id_presensi' => $this->request->getPost('id_presensi'),
      'whatsapp' => $this->request->getPost('whatsapp'),
      'inputWA' => $this->request->getPost('inputWA'),
      'webchat' => $this->request->getPost('webchat'),
      'inputWC' => $this->request->getPost('inputWC'),
      'pengunjung' => $this->request->getPost('pengunjung'),
      'inputP' => $this->request->getPost('inputP'),
      'catatan' => $this->request->getPost('catatan'),
    ]);

    return redirect()->to('/Laporan');
  }

  public function hapus($id_laporan)
  {
    $this->laporanModel = new LaporanModel();
    $this->presensiModel = new PresensiModel();

    $laporan = $this->laporanModel->getLaporan($id_laporan);
    $presensi = $this->presensiModel->getPresensiBy($laporan['id_presensi']);

    $data = [
      'ada' => false,
    ];
    $id_presensi = $presensi['id'];
    $this->presensiModel->update($id_presensi, $data);

    $this->laporanModel->delete($id_laporan);
    return redirect()->to('/laporan');
  }

  public function edit($id_laporan)
  {
    $this->laporanModel = new LaporanModel();
    $data = [
      'id_presensi' => $this->request->getPost('id_presensi'),
      'whatsapp' => $this->request->getPost('whatsapp'),
      'inputWA' => $this->request->getPost('inputWA'),
      'webchat' => $this->request->getPost('webchat'),
      'inputWC' => $this->request->getPost('inputWC'),
      'pengunjung' => $this->request->getPost('pengunjung'),
      'inputP' => $this->request->getPost('inputP'),
      'catatan' => $this->request->getPost('catatan'),
    ];
    $this->laporanModel->update($id_laporan, $data);
    return redirect()->to('/Laporan/' . $data['id_presensi']);
  }

  public function laporpdf($id_presensi)
  {
    $dompdf = new Dompdf();
    $this->presensiModel = new PresensiModel();
    $this->laporanModel = new LaporanModel();
    $this->pengawasModel = new PengawasModel();

    $laporan = $this->laporanModel->getLaporanByPresensiId($id_presensi);
    $presensi = $this->presensiModel->getPresensiBy($id_presensi);
    $pengawas = $this->pengawasModel->getPengawasById($presensi['id_user']);

    $mulai = $presensi['mulai'];
    $selesai = $presensi['selesai'];

    $mulaiArray = explode(":", $mulai);
    $mulai = $mulaiArray[0] . ":" . $mulaiArray[1];

    $selesaiArray = explode(":", $selesai);
    $selesai = $selesaiArray[0] . ":" . $selesaiArray[1];

    $hari = date_create($presensi['tanggal']);
    $hari = $hari->format('l');

    switch ($hari) {
      case "Monday":
        $hari = "Senin";
        break;
      case "Tuesday":
        $hari = "Selasa";
        break;
      case "Wednesday":
        $hari = "Rabu";
        break;
      case "Thursday":
        $hari = "Kamis";
        break;
      case "Friday":
        $hari = "Jumat";
        break;
      case "Saturday":
        $hari = "Sabtu";
        break;
      case "Sunday":
        $hari = "Minggu";
        break;
    }
    $data = [
      'title' => 'Laporan | Web PST',
      'laporan' => $laporan,
      'presensi' => $presensi,
      'pengawas' => $pengawas,
      'mulai' => $mulai,
      'selesai' => $selesai,
      'hari' => $hari,
    ];
    $html = view("pages/laporpdf", $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Laporan Ku.pdf',array(
      "Attachment" => false
    ));
  }
}
