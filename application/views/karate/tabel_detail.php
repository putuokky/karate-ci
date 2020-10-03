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
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
              <?php if ($this->session->flashdata('message')) : ?>
                <!-- <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?= $subjudul; ?> Sukses <?= $this->session->flashdata('message'); ?>.
                </div> -->
              <?php endif; ?>
              <h3>Nama : <b><?= $biodata['nama']; ?></b></h3>
              <h3>Dojo : <b><?= $dojo['nama_dojo']; ?></b></h3>
              <br>
              <a href="<?= base_url('log/karateka'); ?>" class="btn btn-md btn-secondary">Kembali</a>
              <?php
              if ($sabuk == null) { ?>
                <a href="<?= base_url('log/karateka/tambahsabuk/' . $biodata['id_biodata']); ?>" class="btn btn-md btn-primary">Tambah Data Sabuk</a>
              <?php } ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
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
                  <tr class="btn-dark">
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
                      <td><a href="<?= base_url('log/karateka/ubahdetail/' . $krt['id_karateka']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="<?= base_url('log/karateka/hapusdetail/' . $krt['id_karateka']); ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                        <?php if (empty($krt['tgl_ujian']) && empty($krt['no_ijasah'])) : ?>
                          <a href="<?= base_url('log/karateka/ujian/' . $krt['id_karateka']); ?>" class="btn btn-sm btn-default" title="Ujian"><i class="fas fa-file-signature"></i></a>
                        <?php endif ?>
                        <?php if (!empty($krt['tgl_ujian']) && empty($krt['no_ijasah'])) : ?>
                          <a href="<?= base_url('log/karateka/ijasah/' . $krt['id_karateka']); ?>" class="btn btn-sm btn-info" title="ijasah"><i class="fas fa-file"></i></a>
                        <?php endif ?>
                      </td>
                      <td style="background-color: <?= $krt['warna_sabuk']; ?>; color: <?= $krt['warna_tulisan']; ?>;"><?= $krt['nama_sabuk']; ?></td>
                      <td><?php if (!empty($krt['tgl_ujian'])) {
                            echo date('d-m-Y', strtotime($krt['tgl_ujian']));
                          } else {
                            echo '00-00-0000';
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
                            echo '00-00-0000';
                          }
                          ?></td>
                      <td><?php if (!empty($krt['nilai_rata'])) {
                            echo number_format($krt['nilai_rata'], 2, ",", ".");
                          } else {
                            echo '0,00';
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