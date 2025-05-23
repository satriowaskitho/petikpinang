<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\VersiModel;
use App\Models\AksesModel;

class Home extends BaseController
{
    protected $bukuModel;
    protected $versiModel;
    protected $aksesModel;

    public function index(): string
    {
        $this->bukuModel = new BukuModel();
        $this->versiModel = new VersiModel();

        $buku = $this->bukuModel->getBuku();
        $versi = $this->versiModel->getVersi();

        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $buku = $this->bukuModel->getPaginated(10, $keyword);
        } else {
            $buku = $this->bukuModel->getPaginated(10);
        }
        $data = [
            'title' => 'Perpus Pinang | PST',
            'versi' => $versi,
        ];
        $data = array_merge($data, $buku);

        return view('index', $data);
    }

    public function admin()
    {
        if (session('admin')) {
            return redirect()->to('Home');
        }
        $data = [
            'title' => 'admin | PST'
        ];

        return view('admin', $data);
    }

    public function masuk()
    {
        $this->aksesModel = new AksesModel();

        $login = $this->request->getPost();
        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');


            $admin = $this->aksesModel->where('username', $username)->first();

            if ($admin !== null) {
                if ($admin['password'] != $password) {
                    $err = "password tidak sesuai";
                }
            } else {
                $err = "username tidak ditemukan";
            }

            if (empty($err)) {
                $dataSesi = [
                    'admin' => true,
                ];
                session()->set($dataSesi);
                return redirect()->to('Home');
            } else {
                session()->setFlashdata('error', $err);
                return redirect()->to('admin');
            }
        }
    }
    public function keluar()
    {
        session()->destroy();
        return redirect()->to('Home');
    }
}
