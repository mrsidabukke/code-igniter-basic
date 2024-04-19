<?= $this->extend('template/template') ?>
<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DATA MAHASISWA</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Mahasiswa</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                <i class="fa fa-plus"></i>Tambah</button>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <?php if ((session()->getFlashdata('pesan') !== NULL)) {
                echo session()->getFlashData('pesan');
              } ?>
              <table class="table" >
                <thead>
                  <tr>
                    <th width="5%">NO </th>
                    <th width="10%">NIM </th>
                    <th>NAMA </th>
                    <th>ALAMAT </th>
                    <th>JENIS KELAMIN </th>
                    <th>AKSI </th>

                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($mahasiswa as $index => $mhs) { ?>
                    <tr>
                      <td><?= $index + 1 ?> </td>
                      <td> <?= $mhs['nim'] ?> </td>
                      <td> <?= $mhs['nama'] ?> </td>
                      <td> <?= $mhs['alamat'] ?> </td>
                      <td> <?= $mhs['jenkel'] ?> </td>
                      <td class="text-center">
                        <button type="buttton" class="btn btn-sm btn-warning edit-data" data-toggle="modal" data-target="#edit" data-nim="<?= $mhs['nim'] ?>" data-nama="<?= $mhs['nama'] ?>" data-alamat="<?= $mhs['alamat'] ?>" data-jk="<?= $mhs['jenkel'] ?>" data-id_jurusan="<?= $mhs['id_jurusan'] ?>" data-kode_prodi="<?= $mhs['kode_prodi'] ?>"><i class="fa fa-edit"></i></button>

                        <button type="button" class="btn btn-sm btn-danger hapus-data" data-toggle="modal" data-target="#hapus" data-nim="<?= $mhs['nim'] ?>">
                          <i class="fa fa-trash"></i></button>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--MOdal Tambah-->
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">tambah Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> mahasiswa/simpandata" method="post">
        <div class="modal-body">
          <p>Silahkan Tambahkan Data</p>
          <div class="form-group">
            <label for="exampleInputEmail1">nim</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nim" placeholder="masukkan Nim anda">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="masukkan Nama anda">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" placeholder="masukkan Alamat anda">
          </div>

          <div class="form-group">
            <label for="jenkel">Jenis Kelamin</label>
            <select name="jk" class="form-control">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="nim">PRODI</label>
            <select name="prodi" class="form-control">
              <option value="..::PILIH::.."></option>
              <?php foreach ($prodi as $prd) { ?>
                <option value="<?= $prd['id_jurusan'] . '-' . $prd['kode_program_studi'] ?>"> <?= $prd['nama_program_studi'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-light"> <i class="fa fa-save"></i>Save</button>
        </div>
      </form>
    </div>
  </div>
  <!-- /.modal-content -->

  <!-- /.modal-dialog -->
</div>

<!--Modal Edit-->
<div class="modal fade" id="edit">1
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">edit mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> mahasiswa/updatedata" method="post">
        <div class="modal-body">
          <p>Yakin Data Mahasiswa Mau di Hapus?</p>
          <div class="form-group">
            <label for="exampleInputEmail1">Nim</label>
            <input type="text" readonly class="form-control" id="nim_e" name="nim" placeholder="Masukkan Nim">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan Nama anda">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukkan Alamat anda">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select class="form-control" id="jk" name="jk">
              <option value="L"> Laki-Laki</option>
              <option value="P"> Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Prodi</label>
            <select class="form-control" id="prodi" name="prodi" required>
              <option value="">..::PILIH PRODI::..</option>
              <?php foreach ($prodi as $prd) { ?>
                <option value="<?php echo $prd['id_jurusan'] . '-' . $prd['kode_program_studi'] ?>">
                  <?php echo $prd['nama_program_studi'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning"> <i class="fa fa-save"></i>Update</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!--Modal Hapus-->
<div class="modal fade" id="hapus">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">Info Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> mahasiswa/hapusdata" method="post">
        <div class="modal-body">
          <p id="pesan">Yakin Data Mahasiswa Mau di Hapus?</p>
          <div class="form-group">
            <input type="hidden" id="nim" name="nim">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-light"> <i class="fa fa-save"></i>Delete</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
  $(document).ready(function() {

    $(document).on("click", ".edit-data", function() {
      var Nim = $(this).data('nim');
      var Nama = $(this).data('nama');
      var Alamat = $(this).data('alamat');
      var Jk = $(this).data('jk');
      var Jur = $(this).data('id_jurusan');
      var Prodi = $(this).data('kode_prodi');
      $(".modal-body #nim_e").val(Nim);
      $(".modal-body #nama").val(Nama);
      $(".modal-body #alamat").val(Alamat);
      $(".modal-body #jk").val(Jk);
      $(".modal-body #prodi").val(Jur + '-' + Prodi);
    });

    $(document).on("click", ".hapus-data", function() {
      var Nim = $(this).data('nim');
      $(".modal-body #nim").val(Nim);
      $(".modal-body #pesan").html("<code>Yakin data akan di hapus dengan Nim:" + Nim + "??</code");
    });
  });
</script>

<?= $this->endSection() ?>