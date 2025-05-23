<?php

namespace App\Models;

use CodeIgniter\Model;

class KelModel extends Model
{
    protected $table      = 'kode_kel';
    protected $primaryKey = 'id_kel';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';

    public function getData1($kategori1, $tahun1, $komponen1)
    {
        $this->builder()
            ->where('tahun', $tahun1)
            ->select('tahun');
        if ($kategori1 == 1) {
            $this->builder()
                ->join('geografi_kel', 'geografi_kel.id_Kel = kode_kel.kode_kel')
                ->select('kode_kel.kode_kel as kode_kel , kode_kel.nama_kel as nama_kel');

            if ($komponen1 == 1) {
                $this->builder()
                    ->select('geografi_kel.luas as Luas Daerah');
            }
            if ($komponen1 == 2) {
                $this->builder()
                    ->select('geografi_kel.jarak_pusat as Jarak ke Kantor Kecamatan');
            }
            if ($komponen1 == 3) {
                $this->builder()
                    ->select('geografi_kel.jarak_kec as Jarak ke Pusat Kota Tanjungpinang');
            }
            if ($komponen1 == 4) {
                $this->builder()
                    ->select('geografi_kel.tinggi_wilayah as Tinggi Wilayah');
            }
        } elseif ($kategori1 == 2) {
            $this->builder()
                ->join('pemerintahan_kel', 'pemerintahan_kel.id_Kel = kode_kel.kode_kel')
                ->select('kode_kel.kode_kel as kode_kel , kode_kel.nama_kel as nama_kel');

            if ($komponen1 == 5) {
                $this->builder()
                    ->select('pemerintahan_kel.jumlah_RW as Jumlah RW');
            }
            if ($komponen1 == 6) {
                $this->builder()
                    ->select('pemerintahan_kel.jumlah_RT as Jumlah RT');
            }
            if ($komponen1 == 7) {
                $this->builder()
                    ->select('pemerintahan_kel.jumlah_PNS as Jumlah PNS');
            }
        } elseif ($kategori1 == 3) {
            $this->builder()
                ->join('penduduk_kel', 'penduduk_kel.id_Kel = kode_kel.kode_kel')
                ->select('kode_kel.kode_kel as kode_kel , kode_kel.nama_kel as nama_kel');

            if ($komponen1 == 8) {
                $this->builder()
                    ->select('penduduk_kel.jumlah_penduduk as Jumlah Penduduk');
            }
            if ($komponen1 == 9) {
                $this->builder()
                    ->select('penduduk_kel.kepadatan_penduduk as Kepadatan Penduduk per km2');
            }
            if ($komponen1 == 10) {
                $this->builder()
                    ->select('penduduk_kel.rasio_jk as Rasio Jenis Kelamin');
            }
        } elseif ($kategori1 == 4) {
            $this->builder()
                ->join('sosial_kel', 'sosial_kel.id_Kel = kode_kel.kode_kel')
                ->select('kode_kel.kode_kel as kode_kel , kode_kel.nama_kel as nama_kel');

            if ($komponen1 == 11) {
                $this->builder()
                    ->select('sosial_kel.jumlah_sekolah_TK as Jumlah TK');
            }
            if ($komponen1 == 12) {
                $this->builder()
                    ->select('sosial_kel.jumlah_sekolah_SD as Jumlah SD');
            }
            if ($komponen1 == 13) {
                $this->builder()
                    ->select('sosial_kel.jumlah_sekolah_SMP as Jumlah SMP');
            }
            if ($komponen1 == 14) {
                $this->builder()
                    ->select('sosial_kel.jumlah_sekolah_SMA as Jumlah SMA');
            }
            if ($komponen1 == 15) {
                $this->builder()
                    ->select('sosial_kel.jumlah_sekolah_SMK as Jumlah SMK');
            }
            if ($komponen1 == 16) {
                $this->builder()
                    ->select('sosial_kel.jumlah_univ as Jumlah Universitas');
            }
            if ($komponen1 == 17) {
                $this->builder()
                    ->select('sosial_kel.jumlah_masjid as Jumlah Masjid');
            }
            if ($komponen1 == 18) {
                $this->builder()
                    ->select('sosial_kel.jumlah_surau as Jumlah Surau');
            }
            if ($komponen1 == 19) {
                $this->builder()
                    ->select('sosial_kel.jumlah_gereja_katolik as Jumlah Gereja Katolik');
            }
            if ($komponen1 == 20) {
                $this->builder()
                    ->select('sosial_kel.jumlah_gereja_protestan as Jumlah Gereja Protestan');
            }
            if ($komponen1 == 21) {
                $this->builder()
                    ->select('sosial_kel.jumlah_vihara as Jumlah Vihara');
            }
            if ($komponen1 == 22) {
                $this->builder()
                    ->select('sosial_kel.jumlah_klenteng as Jumlah Klenteng');
            }
        } elseif ($kategori1 == 5) {
            $this->builder()
                ->join('pariwisata_kel', 'pariwisata_kel.id_Kel = kode_kel.kode_kel')
                ->select('kode_kel.kode_kel as kode_kel , kode_kel.nama_kel as nama_kel');

            if ($komponen1 == 23) {
                $this->builder()
                    ->select('pariwisata_kel.hotel as Jumlah Hotel');
            }
            if ($komponen1 == 24) {
                $this->builder()
                    ->select('pariwisata_kel.wisma as Jumlah Wisma');
            }
            if ($komponen1 == 25) {
                $this->builder()
                    ->select('pariwisata_kel.kamar_hotel as Jumlah Kamar Hotel');
            }
        } elseif ($kategori1 == 6) {
            $this->builder()
                ->join('keuangan_kel', 'keuangan_kel.id_Kel = kode_kel.kode_kel')
                ->select('kode_kel.kode_kel as kode_kel , kode_kel.nama_kel as nama_kel');

            if ($komponen1 == 26) {
                $this->builder()
                    ->select('keuangan_kel.nilai_pajak as Nilai Pajak');
            }
        }
        return $this->builder()
            ->get()
            ->getResultArray();
    }
}
