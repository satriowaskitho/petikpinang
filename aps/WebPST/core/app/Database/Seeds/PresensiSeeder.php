<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class PresensiSeeder extends Seeder
{
    public function run()
    {
      $date = Time::now();     // 11:30 am today
      $dateString = $date->toDateTimeString();
      $dateArray = explode(" ", $dateString);
      $tanggal = $dateArray[0];
      $mulai = $dateArray[1];
      $selesai = $dateArray[1];
      $format = "Y-m-d";
      $dateTimeObject = Time::createFromFormat($format, $tanggal);

      $data = [
        [
          'id_user'=>'1',
          'tanggal'=> $dateTimeObject,
          'mulai'=> $dateTimeObject,
          'selesai'=> $dateTimeObject,
        ],
        [
          'id_user'=>2,
          'tanggal'=> $dateTimeObject,
          'mulai'=> $dateTimeObject,
          'selesai'=> $dateTimeObject,
        ]
      ];
      $this->db->table('presensi')->insertBatch($data);
    }
}