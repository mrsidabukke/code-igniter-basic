<?php

namespace App\Controllers;

use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
    
    public function index()
    {
        $session = session();
        $jrs = new ModelJurusan();

        if ($session->get('username') != NULL) {
        $data = [
            'jur' => $jrs->findAll()
        ];    
        return view('mahasiswa/v_jurusan', $data);
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
        $nama_jur = $this->request->getVar('nama_jurusan');
        $data = [
            'id' => $id,
            'nama_jurusan' => $nama_jur
        ];
        $mhsModel =  new ModelJurusan();

        $ada = $mhsModel->where('id', $id)->first();
        if (!$ada) {
            $mhsModel->insert($data); //simpan data
            $session->setFlashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>Sukses
        Simpan Data Jurusan.</h5>
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
        return redirect()->to('jurusan');
    }

    public function updatedata()
    {
        $session = session();
        $id = $this->request->getVar('id');
        $nama_jur = $this->request->getVar('nama_jur');
        $data = [
            'id' => $id,
            'nama_jurusan' => $nama_jur,
        ];
        $where = [
            'id' => $id
        ];
        $mhsModel = new ModelJurusan();
        $mhsModel->update($where, $data); //update data
        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5?><i class="icon fas fa-check"></i>Sukses, 
                Update Data Mahasiswa.</h5>
                </div>'
        );
        return redirect()->to('jurusan');
    }

    public function hapusdata()
    {
        $session = session();
        $mhsModel = new ModelJurusan();
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
        return redirect()->route('jurusan');
    }
}
