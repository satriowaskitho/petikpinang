<?php 

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
  protected $table = "jadwal";
  protected $id = "id";
  protected $allowedFields = ['tanggal', 'gambar', 'bulan'];

  public function getJadwal($id_jadwal = false){
    if($id_jadwal==false){
      return $this->findAll();
    }
    return $this->where(['id' => $id_jadwal])->first();
  }
  public function getJadwalByTanggal($tanggal = false){
    return $this->where(['tanggal' => $tanggal])->first();
  }
}