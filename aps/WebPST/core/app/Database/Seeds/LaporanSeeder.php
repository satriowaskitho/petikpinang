<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class LaporanSeeder extends Seeder
{
    public function run()
    {

      $data = [
        [
          'id_presensi'=>13,
          'whatsapp'=>1,
          'webchat'=>1,
          'pengunjung'=>1,
          'catatan'=>"SSSSS",
        ],
        [
          'id_presensi'=>12,
          'whatsapp'=>1,
          'webchat'=>1,
          'pengunjung'=>1,
          'catatan'=>"SSSSS",
        ]
      ];
      $this->db->table('laporan')->insertBatch($data);
    }
}