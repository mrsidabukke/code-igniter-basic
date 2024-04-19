<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index() //: string
    {
        echo 'ini adalah fungsi index pada controller home';
        // return view('welcome_message');
    }

    public function fungsi1()
    {
        echo 'ini adalah fungsi satu pada index controller home';
    }

    public function tampilnama()
    {
        $nama = " rahmat";
        echo "nama 1:" . $nama;
    }

    public function kirimdatakeview()
    {
        $data['nama'] = " Desi";
        $data['alamat'] = " Medan";
        return view('tampildata', $data);
    }

    public function tampilparameter($nama = "", $usia = "")
    {
        echo "nama saya:" . $nama;
        echo "<br>";
        echo "usia saya:" . $usia;
    }

    public function tampilusia($usia)
    {
        echo "usia saya:" . $usia;
    }

    public function mahasiswa()
    {
        $data['nama'] = " Desi";
        $data['alamat'] = " Medan";
        return view('mahasiswa/v_mahasiswa', $data);
    }

    public function dosen()
    {
        $data['nama'] = " ani";
        $data['alamat'] = " Binjai";
        return view('mahasiswa/v_dosen', $data);
    }

    public function jurusan()
    {
        $data['matkul'] = " Agama";
        $data['dosen'] = " Adi";
        return view('jurusan/v_jurusan', $data);
    }
}
