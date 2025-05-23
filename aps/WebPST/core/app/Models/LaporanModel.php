<?php 

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
  protected $table = "laporan";
  protected $id = "id";
  protected $allowedFields = ['id_presensi', 'whatsapp', 'inputWA', 'webchat', 'inputWC', 'pengunjung', 'inputP', 'catatan'];
  protected $useTimestamps = true;

  public function getLaporan($id_laporan = false){
    if($id_laporan==false){
      return $this->findAll();
    }
    return $this->where(['id' => $id_laporan])->first();
  }
  public function getLaporanByUserId($id_user = false){
    return $this->where(['id_user' => $id_user])->first();
  }
  public function getLaporanByPresensiId($id_presensi = false){
    return $this->where(['id_presensi' => $id_presensi])->first();
  }
  public function getLaporanByUserIddanPresensiId($id_user = false, $id_presensi = false){
    return $this->where(['id_user' => $id_user, 'id_presensi' => $id_presensi])->first();
  }
}