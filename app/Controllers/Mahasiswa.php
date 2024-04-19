<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $session = session();
        $mhsModel = new ModelMahasiswa();
        $prodi = new ModelProdi();
        if ($session->get('username') != NULL) {
            $data = [
                'mahasiswa' => $mhsModel->findAll(),
                'prodi' => $prodi->getJurusanProdi()
            ];
            return view('mahasiswa/v_mahasiswa', $data);
        } else {
            $session->setFlashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-"></i>Silahkan login terlebih dahulu</h5>
        </div>'
            );
            return redirect()->to(base_url('.'));
        }
    }

    public function simpandata()
    {
        $session = session();
        $nim = $this->request->getVar('nim');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $jk = $this->request->getVar('jk');
        $kd = explode('-',  $this->request->getVar('prodi'));
        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenkel' => $jk,
            'id_jurusan' => $kd[0],
            'kode_prodi' => $kd[1]
        ];
        $mhsModel =  new ModelMahasiswa();

        $ada = $mhsModel->where('nim', $nim)->first();
        if (!$ada) {
            $mhsModel->insert($data); //simpan data
            $session->setFlashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>Sukses
        Simpan Data Mahasiswa.</h5>
        </div>'
            );
        } else {
            $session->setFlashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-xmark"></i>Gagal
        Nim Mahasiswa sudah ada di database.</h5>
        </div>'
            );
        }
        return redirect()->to('mahasiswa');
    }

    public function updatedata()
    {
        $session = session();
        $nim = $this->request->getVar('nim');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $jk = $this->request->getVar('jk');
        $kd = explode('-', $this->request->getVar('prodi'));
        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenkel' => $jk,
            'id_jurusan' => $kd[0],
            'kode_prodi' => $kd[1]
        ];
        $where = [
            'nim' => $nim
        ];
        $mhsModel = new ModelMahasiswa();
        $mhsModel->update($where, $data); //update data
        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5?><i class="icon fas fa-check"></i>Sukses, 
                Update Data Mahasiswa.</h5>
                </div>'
        );
        return redirect()->to('mahasiswa');
    }

    public function hapusdata()
    {
        $session = session();
        $mhsModel = new ModelMahasiswa();
        $where = [
            'nim' => $this->request->getVar('nim')
        ];
        $mhsModel->delete($where); //update data
        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5?><i class="icon fas fa-check"></i>Sukses, 
                Delete Data Mahasiswa.</h5>
                </div>'
        );
        return redirect()->route('mahasiswa');
    }
}
