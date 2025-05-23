<?php

namespace App\Models;

use CodeIgniter\Model;

class KecModel extends Model
{
    protected $table      = 'kode_kec';
    protected $primaryKey = 'id_kec';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';

    public function getData($kategori, $tahun, $komponen)
    {
       $this->builder()
            ->where('tahun', $tahun)
            ->select('tahun');
        if ($kategori == 1) {
            $this->builder()
                ->join('geografi_kec', 'geografi_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 1) {
                $this->builder()
                    ->select('geografi_kec.luas');
            }
            if ($komponen == 2) {
                $this->builder()
                    ->select('geografi_kec.jumlah_pulau as Jumlah Pulau');
            }
            if ($komponen == 3) {
                $this->builder()
                    ->select('geografi_kec.tinggi_wilayah as Tinggi Wilayah');
            }
            if ($komponen == 4) {
                $this->builder()
                    ->select('geografi_kec.jarak_ibukota as Jarak ke Ibukota');
            }
        } elseif ($kategori == 2) {
            $this->builder()
                ->join('pemerintahan_kec', 'pemerintahan_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 5) {
                $this->builder()
                    ->select('pemerintahan_kec.jumlah_kel as Jumlah Kelurahan');
            }
            if ($komponen == 6) {
                $this->builder()
                    ->select('pemerintahan_kec.jumlah_RT as Jumlah RT');
            }
            if ($komponen == 7) {
                $this->builder()
                    ->select('pemerintahan_kec.jumlah_RW as Jumlah RW');
            }
            if ($komponen == 8) {
                $this->builder()
                    ->select('pemerintahan_kec.jumlah_PNS as Jumlah PNS');
            }
        } elseif ($kategori == 3) {
            $this->builder()
                ->join('penduduk_kec', 'penduduk_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 9) {
                $this->builder()
                    ->select('penduduk_kec.jumlah_penduduk as Jumlah Penduduk');
            }
            if ($komponen == 10) {
                $this->builder()
                    ->select('penduduk_kec.persentase_penduduk as Persentase Penduduk');
            }
            if ($komponen == 11) {
                $this->builder()
                    ->select('penduduk_kec.kepadatan_penduduk as Kepadatan Penduduk');
            }
            if ($komponen == 12) {
                $this->builder()
                    ->select('penduduk_kec.rasio_jk as Rasio Jenis Kelamin');
            }
        } elseif ($kategori == 4) {
            $this->builder()
                ->join('sosial_kec', 'sosial_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 13) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_TK as Jumlah TK');
            }
            if ($komponen == 14) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_TK as Jumlah Guru TK');
            }
            if ($komponen == 15) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_TK as Jumlah Murid TK');
            }
            if ($komponen == 16) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_RA as Jumlah RA');
            }
            if ($komponen == 17) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_RA as Jumlah Guru RA');
            }
            if ($komponen == 18) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_RA as Jumlah Murid RA');
            }
            if ($komponen == 19) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_SD as Jumlah SD');
            }
            if ($komponen == 20) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_SD as Jumlah Guru SD');
            }
            if ($komponen == 21) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_SD as Jumlah Murid SD');
            }
            if ($komponen == 22) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_MI as Jumlah MI');
            }
            if ($komponen == 23) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_MI as Jumlah Guru MI');
            }
            if ($komponen == 24) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_MI as Jumlah Murid MI');
            }
            if ($komponen == 25) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_SMP as Jumlah SMP');
            }
            if ($komponen == 26) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_SMP as Jumlah Guru SMP');
            }
            if ($komponen == 27) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_SMP as Jumlah Murid SMP');
            }
            if ($komponen == 28) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_MTS as Jumlah MTS');
            }
            if ($komponen == 29) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_MTS as Jumlah Guru MTS');
            }
            if ($komponen == 30) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_MTS as Jumlah Murid MTS');
            }
            if ($komponen == 31) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_SMA as Jumlah SMA');
            }
            if ($komponen == 32) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_SMA as Jumlah Guru SMA');
            }
            if ($komponen == 33) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_SMA as Jumlah Murid SMA');
            }
            if ($komponen == 34) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_MA as Jumlah MA');
            }
            if ($komponen == 35) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_MA as Jumlah Guru MA');
            }
            if ($komponen == 36) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_MA as Jumlah Murid MA');
            }
            if ($komponen == 37) {
                $this->builder()
                    ->select('sosial_kec.jumlah_sekolah_SMK as Jumlah SMK');
            }
            if ($komponen == 38) {
                $this->builder()
                    ->select('sosial_kec.jumlah_guru_SMK as Jumlah Guru SMK');
            }
            if ($komponen == 39) {
                $this->builder()
                    ->select('sosial_kec.jumlah_murid_SMK as Jumlah Murid SMK');
            }
            if ($komponen == 40) {
                $this->builder()
                    ->select('sosial_kec.jumlah_gugus as Jumlah Gugus');
            }
            if ($komponen == 41) {
                $this->builder()
                    ->select('sosial_kec.jumlah_RS as Jumlah Rumah Sakit');
            }
            if ($komponen == 42) {
                $this->builder()
                    ->select('sosial_kec.jumlah_poli as Jumlah Poliklinik');
            }
            if ($komponen == 43) {
                $this->builder()
                    ->select('sosial_kec.jumlah_puskesmas as Jumlah Puskesmas');
            }
            if ($komponen == 44) {
                $this->builder()
                    ->select('sosial_kec.jumlah_pustu as Jumlah Puskesmas Pembantu');
            }
            if ($komponen == 45) {
                $this->builder()
                    ->select('sosial_kec.jumlah_apotek as Jumlah Apotek');
            }
            if ($komponen == 46) {
                $this->builder()
                    ->select('sosial_kec.jumlah_dokter as Jumlah Dokter');
            }
            if ($komponen == 47) {
                $this->builder()
                    ->select('sosial_kec.jumlah_doktergigi as Jumlah Dokter Gigi');
            }
            if ($komponen == 48) {
                $this->builder()
                    ->select('sosial_kec.jumlah_perawat as Jumlah Perawat');
            }
            if ($komponen == 49) {
                $this->builder()
                    ->select('sosial_kec.bidan as Jumlah Bidan');
            }
            if ($komponen == 50) {
                $this->builder()
                    ->select('sosial_kec.jumlah_tenagakesehatan as Jumlah Tenaga Kesehatan');
            }
            if ($komponen == 51) {
                $this->builder()
                    ->select('sosial_kec.jumlah_kefarmasian as Jumlah Kefarmasian');
            }
            if ($komponen == 52) {
                $this->builder()
                    ->select('sosial_kec.jumlah_tenagagizi as Jumlah Tenaga Gizi');
            }
            if ($komponen == 53) {
                $this->builder()
                    ->select('sosial_kec.jumlah_klinik as Jumlah Klinik');
            }
            if ($komponen == 54) {
                $this->builder()
                    ->select('sosial_kec.jumlah_posyandu as Jumlah Posyandu');
            }
            if ($komponen == 55) {
                $this->builder()
                    ->select('sosial_kec.jumlah_polindes as Jumlah Polindes');
            }
            if ($komponen == 56) {
                $this->builder()
                    ->select('sosial_kec.gizi_buruk as Jumlah Gizi Buruk');
            }
            if ($komponen == 57) {
                $this->builder()
                    ->select('sosial_kec.dbd as Jumlah Kasus Demam Berdarah');
            }
            if ($komponen == 58) {
                $this->builder()
                    ->select('sosial_kec.jumlah_diare as Jumlah Kasus Diae');
            }
            if ($komponen == 59) {
                $this->builder()
                    ->select('sosial_kec.tb as Jumlah Kasus Tuberculosis');
            }
            if ($komponen == 60) {
                $this->builder()
                    ->select('sosial_kec.wus as Jumlah Wanita Usia Subur');
            }
            if ($komponen == 61) {
                $this->builder()
                    ->select('sosial_kec.pus as Jumlah Pasangan Usia Subur');
            }
            if ($komponen == 62) {
                $this->builder()
                    ->select('sosial_kec.klinik_kb as Jumlah Klinik Keluarga Berencana');
            }
            if ($komponen == 63) {
                $this->builder()
                    ->select('sosial_kec.islam as Persentase Penduduk Agama Islam');
            }
            if ($komponen == 64) {
                $this->builder()
                    ->select('sosial_kec.kristen_protestan as Persentase Penduduk Agama Kristen Protestan');
            }
            if ($komponen == 65) {
                $this->builder()
                    ->select('sosial_kec.kristen_katolik as Persentase Penduduk Agama Kristen Katolik');
            }
            if ($komponen == 66) {
                $this->builder()
                    ->select('sosial_kec.hindu as Persentase Penduduk Agama Hindu');
            }
            if ($komponen == 67) {
                $this->builder()
                    ->select('sosial_kec.budha as Persentase Penduduk Agama Budha');
            }
            if ($komponen == 68) {
                $this->builder()
                    ->select('sosial_kec.masjid as Jumlah Masjid');
            }
            if ($komponen == 69) {
                $this->builder()
                    ->select('sosial_kec.mushola as Jumlah Mushola');
            }
            if ($komponen == 70) {
                $this->builder()
                    ->select('sosial_kec.gereja_protestan as Jumlah Gereja Protestan');
            }
            if ($komponen == 71) {
                $this->builder()
                    ->select('sosial_kec.gereja_katolik as Jumlah Gereja Katolik');
            }
            if ($komponen == 72) {
                $this->builder()
                    ->select('sosial_kec.vihara as Jumlah Vihara');
            }
            if ($komponen == 73) {
                $this->builder()
                    ->select('sosial_kec.klenteng as Jumlah Klenteng');
            }
            if ($komponen == 74) {
                $this->builder()
                    ->select('sosial_kec.bencana as Jumlah Kejadian Bencana Alam');
            }
            if ($komponen == 75) {
                $this->builder()
                    ->select('sosial_kec.haji as Jumlah Jemaah Haji Yang Berangkat');
            }
            if ($komponen == 76) {
                $this->builder()
                    ->select('sosial_kec.nikah as Jumlah Pernikahan');
            }
        } elseif ($kategori == 5) {
            $this->builder()
                ->join('pertanian_kec', 'pertanian_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 77) {
                $this->builder()
                    ->select('pertanian_kec.bawangdaun_luas as Luas Panen Bawang Daun');
            }
            if ($komponen == 78) {
                $this->builder()
                    ->select('pertanian_kec.bawangmerah_luas as Luas Panen Bawang Merah');
            }
            if ($komponen == 79) {
                $this->builder()
                    ->select('pertanian_kec.bayam_luas as Luas Panen Bayam');
            }
            if ($komponen == 80) {
                $this->builder()
                    ->select('pertanian_kec.cabaibesar_luas as Luas Panen Cabai Besar');
            }
            if ($komponen == 81) {
                $this->builder()
                    ->select('pertanian_kec.cabaikeriting_luas as Luas Panen Cabai Keriting');
            }
            if ($komponen == 82) {
                $this->builder()
                    ->select('pertanian_kec.cabairawit_luas as Luas Panen Cabai Rawit');
            }
            if ($komponen == 83) {
                $this->builder()
                    ->select('pertanian_kec.jamur_luas as Luas Panen Jamur');
            }
            if ($komponen == 84) {
                $this->builder()
                    ->select('pertanian_kec.kacang_luas as Luas Panen Kacang Panjang');
            }
            if ($komponen == 85) {
                $this->builder()
                    ->select('pertanian_kec.kangkung_luas as Luas Panen Kangkung');
            }
            if ($komponen == 86) {
                $this->builder()
                    ->select('pertanian_kec.ketimun_luas as Luas Panen Ketimun');
            }
            if ($komponen == 87) {
                $this->builder()
                    ->select('pertanian_kec.petsai_luas as Luas Panen Petsai');
            }
            if ($komponen == 88) {
                $this->builder()
                    ->select('pertanian_kec.terung_luas as Luas Panen Terung');
            }
            if ($komponen == 89) {
                $this->builder()
                    ->select('pertanian_kec.bawangdaun_produksi as Produksi Bawang Daun');
            }
            if ($komponen == 90) {
                $this->builder()
                    ->select('pertanian_kec.bawangmerah_produksi as Produksi Bawang Merah');
            }
            if ($komponen == 91) {
                $this->builder()
                    ->select('pertanian_kec.bayam_produksi as Produksi Bayam');
            }
            if ($komponen == 92) {
                $this->builder()
                    ->select('pertanian_kec.cabaibesar_produksi as Produksi Cabai Besar');
            }
            if ($komponen == 93) {
                $this->builder()
                    ->select('pertanian_kec.cabaikeriting_produksi as Produksi Cabai Keriting');
            }
            if ($komponen == 94) {
                $this->builder()
                    ->select('pertanian_kec.cabairawit_produksi as Produksi Cabai Rawit');
            }
            if ($komponen == 95) {
                $this->builder()
                    ->select('pertanian_kec.jamur_produksi as Produksi Jamur');
            }
            if ($komponen == 96) {
                $this->builder()
                    ->select('pertanian_kec.kacang_produksi as Produksi Kacang Panjang');
            }
            if ($komponen == 97) {
                $this->builder()
                    ->select('pertanian_kec.kangkung_produksi as Produksi Kangkung');
            }
            if ($komponen == 98) {
                $this->builder()
                    ->select('pertanian_kec.ketimun_produksi as Produksi Ketimun');
            }
            if ($komponen == 99) {
                $this->builder()
                    ->select('pertanian_kec.petsai_produksi as Produksi Petsai');
            }
            if ($komponen == 100) {
                $this->builder()
                    ->select('pertanian_kec.terung_produksi as Produksi Terung');
            }
            if ($komponen == 101) {
                $this->builder()
                    ->select('pertanian_kec.jahe_luas as Luas Panen Jahe');
            }
            if ($komponen == 102) {
                $this->builder()
                    ->select('pertanian_kec.kunyit_luas as Luas Panen Kunyit');
            }
            if ($komponen == 103) {
                $this->builder()
                    ->select('pertanian_kec.lengkuas_luas as Luas Panen Lengkuas');
            }
            if ($komponen == 104) {
                $this->builder()
                    ->select('pertanian_kec.serai_luas as Luas Panen Serai');
            }
            if ($komponen == 105) {
                $this->builder()
                    ->select('pertanian_kec.jahe_produksi as Produksi Jahe');
            }
            if ($komponen == 106) {
                $this->builder()
                    ->select('pertanian_kec.kunyit_produksi as Produksi Kuyit');
            }
            if ($komponen == 107) {
                $this->builder()
                    ->select('pertanian_kec.lengkuas_produksi as Produksi Lengkuas');
            }
            if ($komponen == 108) {
                $this->builder()
                    ->select('pertanian_kec.serai_produksi as Produksi Serai');
            }
            if ($komponen == 109) {
                $this->builder()
                    ->select('pertanian_kec.melati_luas as Luas Panen Melati');
            }
            if ($komponen == 110) {
                $this->builder()
                    ->select('pertanian_kec.palem_luas as Luas Panen Palem');
            }
            if ($komponen == 111) {
                $this->builder()
                    ->select('pertanian_kec.pedang_luas as Luas Panen Pedang-pedangan');
            }
            if ($komponen == 112) {
                $this->builder()
                    ->select('pertanian_kec.melati_produksi as Produksi Melati');
            }
            if ($komponen == 113) {
                $this->builder()
                    ->select('pertanian_kec.palem_produksi as Produksi Palem');
            }
            if ($komponen == 114) {
                $this->builder()
                    ->select('pertanian_kec.pedang_produksi as Produksi Pedang-pedangan');
            }
            if ($komponen == 115) {
                $this->builder()
                    ->select('pertanian_kec.alpukat as Produksi Alpukat');
            }
            if ($komponen == 116) {
                $this->builder()
                    ->select('pertanian_kec.belimbing as Produksi Belimbing');
            }
            if ($komponen == 117) {
                $this->builder()
                    ->select('pertanian_kec.durian as Produksi Durian');
            }
            if ($komponen == 118) {
                $this->builder()
                    ->select('pertanian_kec.jambuair as Produksi Jambu Air');
            }
            if ($komponen == 119) {
                $this->builder()
                    ->select('pertanian_kec.jambubiji as Produksi Jambu Biji');
            }
            if ($komponen == 120) {
                $this->builder()
                    ->select('pertanian_kec.jengkol as Produksi Jengkol');
            }
            if ($komponen == 121) {
                $this->builder()
                    ->select('pertanian_kec.jeruk as Produksi Jeruk Siam');
            }
            if ($komponen == 122) {
                $this->builder()
                    ->select('pertanian_kec.mangga as Produksi Mangga');
            }
            if ($komponen == 123) {
                $this->builder()
                    ->select('pertanian_kec.manggis as Produksi Manggis');
            }
            if ($komponen == 124) {
                $this->builder()
                    ->select('pertanian_kec.markisa as Produksi Markisa');
            }
            if ($komponen == 125) {
                $this->builder()
                    ->select('pertanian_kec.melinjo as Produksi Melinjo');
            }
            if ($komponen == 126) {
                $this->builder()
                    ->select('pertanian_kec.nangka as Produksi Nangka');
            }
            if ($komponen == 127) {
                $this->builder()
                    ->select('pertanian_kec.nanas as Produksi Nanas');
            }
            if ($komponen == 128) {
                $this->builder()
                    ->select('pertanian_kec.pepaya as Produksi Pepaya');
            }
            if ($komponen == 129) {
                $this->builder()
                    ->select('pertanian_kec.petai as Produksi Petai');
            }
            if ($komponen == 130) {
                $this->builder()
                    ->select('pertanian_kec.pisang as Produksi Pisang');
            }
            if ($komponen == 131) {
                $this->builder()
                    ->select('pertanian_kec.rambutan as Produksi Rambutan');
            }
            if ($komponen == 132) {
                $this->builder()
                    ->select('pertanian_kec.sawo as Produksi Sawo');
            }
            if ($komponen == 133) {
                $this->builder()
                    ->select('pertanian_kec.sirsak as Produksi Sirsak');
            }
            if ($komponen == 134) {
                $this->builder()
                    ->select('pertanian_kec.sukun as Produksi Sukun');
            }
            if ($komponen == 135) {
                $this->builder()
                    ->select('pertanian_kec.naga as Produksi Buah Naga');
            }
            if ($komponen == 136) {
                $this->builder()
                    ->select('pertanian_kec.kelapa_luas as Luas Areal Kelapa');
            }
            if ($komponen == 137) {
                $this->builder()
                    ->select('pertanian_kec.karet_luas as Luas Areal Karet');
            }
            if ($komponen == 138) {
                $this->builder()
                    ->select('pertanian_kec.lada_luas as Luas Areal Lada');
            }
            if ($komponen == 139) {
                $this->builder()
                    ->select('pertanian_kec.kelapa_produksi as Produksi Kelapa');
            }
            if ($komponen == 140) {
                $this->builder()
                    ->select('pertanian_kec.karet_produksi as Produksi Karet');
            }
            if ($komponen == 141) {
                $this->builder()
                    ->select('pertanian_kec.lada_produksi as Produksi Lada');
            }
            if ($komponen == 142) {
                $this->builder()
                    ->select('pertanian_kec.sapi as Populasi Sapi');
            }
            if ($komponen == 143) {
                $this->builder()
                    ->select('pertanian_kec.kerbau as Populasi Kerbau');
            }
            if ($komponen == 144) {
                $this->builder()
                    ->select('pertanian_kec.kambing as Populasi Kambing');
            }
            if ($komponen == 145) {
                $this->builder()
                    ->select('pertanian_kec.babi as Populasi Babi');
            }
            if ($komponen == 146) {
                $this->builder()
                    ->select('pertanian_kec.pedaging as Populasi Ayam Ras Pedaging');
            }
            if ($komponen == 147) {
                $this->builder()
                    ->select('pertanian_kec.petelur as Populasi Ayam Ras Petelur');
            }
            if ($komponen == 148) {
                $this->builder()
                    ->select('pertanian_kec.kampung as Populasi Ayam Kampung');
            }
            if ($komponen == 149) {
                $this->builder()
                    ->select('pertanian_kec.itik as Produksi Itik');
            }
            if ($komponen == 150) {
                $this->builder()
                    ->select('pertanian_kec.telur as Produksi Telur');
            }
        } elseif ($kategori == 6) {
            $this->builder()
                ->join('industri_kec', 'industri_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 151) {
                $this->builder()
                    ->select('industri_kec.industri_besar as Jumlah Industri Besar');
            }
            if ($komponen == 152) {
                $this->builder()
                    ->select('industri_kec.tenaga_kerja as Jumlah Tenaga Kerja');
            }
            if ($komponen == 153) {
                $this->builder()
                    ->select('industri_kec.industri_kecil as Jumlah Industri Kecil');
            }
        } elseif ($kategori == 7) {
            $this->builder()
                ->join('pariwisata_kec', 'pariwisata_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 154) {
                $this->builder()
                    ->select('pariwisata_kec.restoran as Jumlah Restoran');
            }
            if ($komponen == 155) {
                $this->builder()
                    ->select('pariwisata_kec.objek_wisata as Jumlah Objek Wisata');
            }
            if ($komponen == 156) {
                $this->builder()
                    ->select('pariwisata_kec.hotel as Jumlah Hotel');
            }
            if ($komponen == 157) {
                $this->builder()
                    ->select('pariwisata_kec.kamar_hotel as Jumlah Kamar Hotel');
            }
        } elseif ($kategori == 8) {
            $this->builder()
                ->join('transportasi_kec', 'transportasi_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 158) {
                $this->builder()
                    ->select('transportasi_kec.pos as Jumlah Kantor Pos Pemantau');
            }
            if ($komponen == 159) {
                $this->builder()
                    ->select('transportasi_kec.menara as Jumlah Tower');
            }
            if ($komponen == 160) {
                $this->builder()
                    ->select('transportasi_kec.warnet as Jumlah Warnet');
            }
        } elseif ($kategori == 9) {
            $this->builder()
                ->join('keuangan_kec', 'keuangan_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 161) {
                $this->builder()
                    ->select('keuangan_kec.koperasi as Jumlah Koperasi');
            }
            if ($komponen == 162) {
                $this->builder()
                    ->select('keuangan_kec.nilai_pajak as Nilai Pajak');
            }
        } elseif ($kategori == 10) {
            $this->builder()
                ->join('perdagangan_kec', 'perdagangan_kec.id_Kec = kode_kec.kode_kec')
                ->select('kode_kec.kode_kec as kode_kec , kode_kec.nama_kec as nama_kec');

            if ($komponen == 163) {
                $this->builder()
                    ->select('perdagangan_kec.pasar_tradisional as Jumlah Pasar Tradisional');
            }
            if ($komponen == 164) {
                $this->builder()
                    ->select('perdagangan_kec.toko_modern as Jumlah Toko Modern');
            }
        }


        return $this->builder()
            ->get()
            ->getResultArray();    }
}
