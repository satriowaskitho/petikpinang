<?php 

namespace App\Models;

use CodeIgniter\Model;

class VersiModel extends Model
{
  protected $table = "versi";
  protected $id = "id";
  protected $allowedFields = ['id_buku','versi','bulan','tahun','penerbit','ruang','lorong','rak','baris','hardcopy','softcopy'];

  public function getVersi($id = false){
    if($id==false){
      return $this->orderBy('tahun','desc')->findAll();
    }
    return $this->where(['id' => $id])->first();
  }
  public function getVersiByIdBuku($id_buku = false){
    return $this->where(['id_buku' => $id_buku]);
  }
}