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
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sabuk</th>
                    <th>Dojo</th>
                    <th>Tanggal Ujian</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sabuk</th>
                    <th>Dojo</th>
                    <th>Tanggal Ujian</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($karate as $krt) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $krt['nama']; ?></td>
                      <td style="background-color: <?= $krt['warna_sabuk']; ?>; color: <?= $krt['warna_tulisan']; ?>;"><?= $krt['nama_sabuk']; ?></td>
                      <td><?= $krt['nama_dojo']; ?></td>
                      <td><?= date('d-m-Y', strtotime($krt['tgl_ujian'])); ?></td>
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