<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('log/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><?= $subjudul; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?= $subjudul; ?> Sukses <?= $this->session->flashdata('message'); ?>.
                </div>
              <?php endif; ?>
              <a href="<?= base_url('log/user/tambah'); ?>" class="btn btn-md btn-primary">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
                    <th>No</th>
                    <th>Opsi</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role User</th>
                    <th>Status</th>
                    <th>Date Created</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="btn-dark">
                    <th>No</th>
                    <th>Opsi</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role User</th>
                    <th>Status</th>
                    <th>Date Created</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($users as $us) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><a href="<?= base_url('log/user/ubah/' . $us['id']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                      <td><?= $us['name']; ?></td>
                      <td><?= $us['usrname']; ?></td>
                      <td><?= $us['role']; ?></td>
                      <td><?php
                          if ($us['is_active'] == 1) { ?>
                          <button type="button" class="btn btn-sm btn-success">Aktif</button>
                        <?php } else { ?>
                          <button type="button" class="btn btn-sm btn-danger">Non Aktif</button>
                        <?php } ?></td>
                      <td><?= date('d F Y', $us['date_user']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->