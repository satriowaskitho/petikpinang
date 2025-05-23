<?php 

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
  protected $table = "presensi";
  protected $id = "id";
  protected $allowedFields = ['id_user', 'tanggal', 'ada', 'mulai', 'selesai'];


  public function getPresensi($tanggal = false){
    if($tanggal==false){
      return $this->findAll();
    }
    return $this->where(['tanggal' => $tanggal])->first();
  }
  public function getPresensiBy($id_presensi = false){
    if($id_presensi==false){
      return $this->findAll();
    }
    return $this->where(['id' => $id_presensi])->first();
  }
  public function getPresensiByUserId($id_user = false){

    return $this->where(['id_user' => $id_user])->findAll();
  }
  public function getPresensiByUserIddanTanggal($id_user = false, $tanggal = false){
    return $this->where(['id_user' => $id_user, 'tanggal' => $tanggal])->first();
  }
}