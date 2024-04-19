<?= $this->extend('template/template') ?>
<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashbor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">jurusan</li>
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
                    <th width="5%">ID </th>
                    <th> Nama Jurusan </th>
                    <th width="20%"> Aksi </th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($jur as $index => $jrs) { ?>
                    <tr>
                      <td> <?= $jrs['id'] ?> </td>
                      <td> <?= $jrs['nama_jurusan'] ?> </td>
                      <td>
                        <button class="btn btn-sm btn-warning edit-data" data-toggle="modal" data-target="#edit" data-id="<?= $jrs['id'] ?>" data-nama_jurusan="<?= $jrs['nama_jurusan'] ?>"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger hapus-data" data-toggle="modal" data-target="#hapus" data-id="<?= $jrs['id'] ?>"><i class="fa fa-trash"></i></button>
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
<!--Modal Tambah-->
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">tambah Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> jurusan/simpandata" method="post">
        <div class="modal-body">
          <p>Silahkan Tambahkan Data</p>
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="id" placeholder="masukkan ID jurusan">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_jurusan" placeholder="masukkan Nama Jurusan">
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-light"> <i class="fa fa-save"></i>Save</button>
          </div>
        </div>
      </form>
    </div>

  </div>
  <!-- /.modal-content -->

  <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Data-->
<div class="modal fade" id="edit">1
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title">edit jurusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?> jurusan/updatedata" method="post">
        <div class="modal-body">
          <p>Yakin Data jurusan mau Di Edit</p>
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input type="number" readonly class="form-control" id="id" name="id" placeholder="Masukkan id Jurusan">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="nama_jur" name="nama_jur" placeholder="masukkan Nama Jurusan">
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
      <form action="<?= base_url() ?> jurusan/hapusdata" method="post">
        <div class="modal-body">
          <p id="pesan">Yakin Data Jurusan Mau di Hapus?</p>
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
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
  $(document).ready(function() {

    $(document).on("click", ".edit-data", function() {
      var Id = $(this).data('id');
      var Nama_Jur = $(this).data('nama_jurusan');
      $(".modal-body #id").val(Id);
      $(".modal-body #nama_jur").val(Nama_Jur);
    });

    $(document).on("click", ".hapus-data", function() {
      var Id = $(this).data('id');
      $(".modal-body #id").val(Id);
      $(".modal-body #pesan").html("<code>Yakin data akan di hapus dengan ID:" + Id + "??</code");
    });
  });
</script>

<?= $this->endSection() ?>