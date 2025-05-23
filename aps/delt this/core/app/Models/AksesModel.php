<?php 

namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
  protected $table = "akses";
  protected $id = "id";
  protected $allowedFields = ['username', 'password'];

  public function getUser($username = false){
    if($username==false){
      return $this->findAll();
    }
    return $this->where(['username' => $username])->first();
  }
}