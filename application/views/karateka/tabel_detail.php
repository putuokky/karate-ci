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
              <h3>Nama : <?= $biodata['nama']; ?></h3>
              <a href="<?= base_url('log/karateka'); ?>" class="btn btn-md btn-info">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Opsi</th>
                    <th>Sabuk</th>
                    <th>Tanggal Ujian</th>
                    <th>No Ijasah</th>
                    <th>Tanggal Ijasah</th>
                    <th>Nilai Rata-rata</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Opsi</th>
                    <th>Sabuk</th>
                    <th>Tanggal Ujian</th>
                    <th>No Ijasah</th>
                    <th>Tanggal Ijasah</th>
                    <th>Nilai Rata-rata</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($karate as $krt) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td>opsi</td>
                      <td style="background-color: <?= $krt['warna_sabuk']; ?>; color: <?= $krt['warna_tulisan']; ?>;"><?= $krt['nama_sabuk']; ?></td>
                      <td><?php if (!empty($krt['tgl_ujian'])) {
                            echo date('d-m-Y', strtotime($krt['tgl_ujian']));
                          } else {
                            echo 'Belum Ujian';
                          }
                          ?></td>
                      <td><?php if (!empty($krt['no_ijasah'])) {
                            echo $krt['no_ijasah'];
                          } else {
                            echo 'Belum Ada No. Ijasah';
                          }
                          ?></td>
                      <td><?php if (!empty($krt['tgl_ijasah'])) {
                            echo date('d-m-Y', strtotime($krt['tgl_ijasah']));
                          } else {
                            echo 'Belum Ada Ijasah';
                          }
                          ?></td>
                      <td><?php if (!empty($krt['nilai_rata'])) {
                            echo number_format($krt['nilai_rata'], 2, ",", ".");
                          } else {
                            echo 'Belum Ada Nilai';
                          }
                          ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <?php if (empty($karate)) { ?>
                    <th colspan="7" class="text-center">Belum Ada Data</th>
                  <?php } ?>
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