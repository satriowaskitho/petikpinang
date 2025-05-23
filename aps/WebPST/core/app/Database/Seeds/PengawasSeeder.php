<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PengawasSeeder extends Seeder
{
    public function run()
    {
        $data = [
          [
            'nama' => 'Albert Assidiq',
            'username'    => 'albertassidiq',
            'password'    => 'albertassidiq',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Ardini',
            'username'    => 'ardini',
            'password'    => 'ardini',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Asa Alfan Nahandi',
            'username'    => 'asaalfannahandi',
            'password'    => 'asaalfannahandi',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Arlita Gariana',
            'username'    => 'arlitagariana',
            'password'    => 'arlitagariana',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Decky Franoza Patria',
            'username'    => 'deckyfranozapatria',
            'password'    => 'deckyfranozapatria',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Dian Fitriana Arthati',
            'username'    => 'dianfitrianaarthati',
            'password'    => 'dianfitrianaarthati',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Deasy Dirgantari',
            'username'    => 'deasydirgantari',
            'password'    => 'deasydirgantari',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Dewi Sartika Sari',
            'username'    => 'dewisartikasari',
            'password'    => 'dewisartikasari',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Fadhila Annisa Maksum',
            'username'    => 'fadhilaannisamaksum',
            'password'    => 'fadhilaannisamaksum',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Iman Rahadiansyah',
            'username'    => 'imanrahadiansyah',
            'password'    => 'imanrahadiansyah',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Natasya Afira',
            'username'    => 'natasyaafira',
            'password'    => 'natasyaafira',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'M. Nurfajar Kapriaji',
            'username'    => 'nurfajarkapriaji',
            'password'    => 'nurfajarkapriaji',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Nurul Wahida',
            'username'    => 'nurulwahida',
            'password'    => 'nurulwahida',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Olga Srikandi Sinaga',
            'username'    => 'olgasrikandisinaga',
            'password'    => 'olgasrikandisinaga',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Rizka Novalina',
            'username'    => 'rizkanovalina',
            'password'    => 'rizkanovalina',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Sudarmanto',
            'username'    => 'sudarmanto',
            'password'    => 'sudarmanto',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Siti Kartini Susilowati',
            'username'    => 'sitikartinisusilowati',
            'password'    => 'sitikartinisusilowati',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Vina Astriani',
            'username'    => 'vinaastriani',
            'password'    => 'vinaastriani',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
          [
            'nama' => 'Viki Tria Zianrini',
            'username'    => 'vikitriazianrini',
            'password'    => 'vikitriazianrini',
            'status'    => false,
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
            'role' => 'user',
          ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('pengawas')->insertBatch($data);
    }
}