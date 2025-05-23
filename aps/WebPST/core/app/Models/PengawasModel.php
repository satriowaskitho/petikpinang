<?php 

namespace App\Models;

use CodeIgniter\Model;

class PengawasModel extends Model
{
  protected $table = "pengawas";
  protected $id = "id";
  protected $allowedFields = ['nama', 'username', 'password', 'status'];
  protected $useTimestamps = true;

  public function getPengawas($username = false){
    if($username==false){
      return $this->findAll();
    }

    return $this->where(['username' => $username])->first();
  }
  public function getPengawasById($id = false){
    if($id==false){
      return $this->findAll();
    }
    return $this->where(['id' => $id])->first();
  }
}