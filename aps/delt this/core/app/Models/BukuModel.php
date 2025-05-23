<?php 

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
  protected $table = "buku";
  protected $id = "id";
  protected $allowedFields = ['id_publikasi', 'judul', 'hardcopy','softcopy'];

  public function getBuku($id = false){
    if($id==false){
      return $this->findAll();
    }
    return $this->where(['id' => $id])->first();
  }
  public function getBukuById($id_buku = false){
    return $this->where(['id_publikasi' => $id_buku])->first();
  }
  public function getBukuByJudul($judul = false){
    return $this->where(['judul' => $judul])->first();
  }
  public function search($keyword){
    return $this->table('buku')->like('judul',$keyword);
  }
  public function getPaginated($n,$keyword=null){
    if ($keyword) {
      $this->builder()->like('judul',$keyword);
    }
    return[
      'buku'=>$this->orderBy('id', 'asc')->paginate($n),
      'pagerBuku'=>$this->pager,
    ];
  }
}