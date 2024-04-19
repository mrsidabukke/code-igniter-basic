<?= $this->extend('template/template') ?>
<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>PRODI</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">prodi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content ">
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
                    <th width="5%">ID </th>
                    <th width="10%">ID JURUSAN </th>
                    <th>KODE PROGRAM STUDI </th>
                    <th>NAMA PROGRAM STUDI </th>
                    <th>AKSI </th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($prodi as $index => $prd) { ?>
                    <tr>
                      <td> <?= $prd['id'] ?> </td>
                      <td> <?= $prd['id_jurusan'] ?> </td>
                      <td> <?= $prd['kode_program_studi'] ?> </td>
                      <td> <?= $prd['nama_program_studi'] ?> </td>
                      <td class="text-center">
                        <button type="buttton" class="btn btn-sm btn-warning edit-data" data-toggle="modal" data-target="#edit" data-id="<?= $prd['id'] ?>" data-id_jur="<?= $prd['id_jurusan'] ?>" data-kode_prodi="<?= $prd['kode_program_studi'] ?>" data-nama_prodi="<?= $prd['nama_program_studi'] ?>"><i class="fa fa-edit"></i></button>

                        <button type="button" class="btn btn-sm btn-danger hapus-data" data-toggle="modal" data-target="#hapus" data-id="<?= $prd['id'] ?>">
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

<!--Modal Tambah data-->
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> prodi/simpandata" method="post">
        <div class="modal-body">
          <p>Silahkan Tambahkan Data</p>
          <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="id" placeholder="masukkan id anda">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Id Jurusan</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="id_jurusan" placeholder="masukkan id jurusan anda">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Kode Program Studi</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="kode_program_studi" placeholder="masukkan Kode Program Studi anda">
          </div>

          <div class="form-group">
            <label for="jenkel">Nama Program Studi</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_program_studi" placeholder="masukkan nama Program Studi anda">
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-light"> <i class="fa fa-save"></i>Save</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Data-->
<div class="modal fade" id="edit">1
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">edit prodi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> prodi/updatedata" method="post">
        <div class="modal-body">
          <p>Yakin Data Prodi mau Di Edit</p>
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input type="number" readonly class="form-control" id="id" name="id" placeholder="Masukkan id">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Id Jurusan</label>
            <input type="number" class="form-control" id="id_jur" name="id_jurusan" placeholder="masukkan Id Jurusan">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Kode Prodi</label>
            <input type="text" class="form-control" id="kode_program_studi" name="kode_program_studi" placeholder="masukkan kode prodi">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama Prodi</label>
            <input type="text" class="form-control" id="nama_program_studi" name="nama_program_studi" placeholder="masukkan nama prodi">
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"> <i class="fa fa-save"></i>Update</button>
          </div>
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
      <form action="<?= base_url() ?> prodi/hapusdata" method="post">
        <div class="modal-body">
          <p id="pesan">Yakin Data Prodi Mau di Hapus?</p>
          <div class="form-group">
            <input type="hidden" id="id" name="id">
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
<!-- /.content-wrapper -->
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
  $(document).ready(function() {

    $(document).on("click", ".edit-data", function() {
      var Id = $(this).data('id');
      var Id_jur = $(this).data('id_jur');
      var Kode_Prodi = $(this).data('kode_prodi');
      var Nama_Prodi = $(this).data('nama_prodi');
      $(".modal-body #id").val(Id);
      $(".modal-body #id_jur").val(Id_jur);
      $(".modal-body #kode_program_studi").val(Kode_Prodi);
      $(".modal-body #nama_program_studi").val(Nama_Prodi);
    });

    $(document).on("click", ".hapus-data", function() {
      var Id = $(this).data('id');
      $(".modal-body #id").val(Id);
      $(".modal-body #pesan").html("<code>Yakin data akan di hapus dengan id:" + Id + "??</code");
    });
  });
</script>

<?= $this->endSection() ?>