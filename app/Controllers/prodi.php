<?php

namespace App\Controllers;

use App\Models\ModelProdi;

class prodi extends BaseController
{
    public function index()
    {
        $session = session();
        $prodi = new ModelProdi();
        if ($session->get('username') != NULL) {
        $data = [
            'prodi' => $prodi->getJurusanProdi()
        ];
        return view('mahasiswa/v_prodi', $data);
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
        $id = $this->request->getVar('id');
        $id_jurusan = $this->request->getVar('id_jurusan');
        $kode_program_studi = $this->request->getVar('kode_program_studi');
        $nama_program_studi = $this->request->getVar('nama_program_studi');
        $data = [
            'id' => $id,
            'id_jurusan' => $id_jurusan,
            'kode_program_studi' => $kode_program_studi,
            'nama_program_studi' => $nama_program_studi,

        ];
        $MhsModel =  new ModelProdi();
        $MhsModel->insert($data); //simpan data

        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>Sukses
            Simpan Data Mahasiswa.</h5>
            </div>'
        );

        return redirect()->to('prodi');
    }

    public function updatedata()
    {
        $session = session();
        $id = $this->request->getVar('id');
        $id_jurusan = $this->request->getVar('id_jurusan');
        $kode_program_studi = $this->request->getVar('kode_program_studi');
        $nama_program_studi = $this->request->getVar('nama_program_studi');
        $data = [
            'id' => $id,
            'id_jurusan' => $id_jurusan,
            'kode_program_studi' => $kode_program_studi,
            'nama_program_studi' => $nama_program_studi
        ];
        $where = [
            'id' => $id
        ];
        $mhsModel = new ModelProdi();
        $mhsModel->update($where, $data); //update data
        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5?><i class="icon fas fa-check"></i>Sukses, 
                Update Data Mahasiswa.</h5>
                </div>'
        );
        return redirect()->to('prodi');
    }

    public function hapusdata()
    {
        $session = session();
        $mhsModel = new ModelProdi();
        $where = [
            'id' => $this->request->getVar('id')
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
        return redirect()->route('prodi');
    }
}
