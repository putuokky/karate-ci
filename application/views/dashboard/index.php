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

    <!-- Default box -->
    <div class="row">
      <!-- /.col -->
      <?php foreach ($sabuk as $sbk) : ?>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background-color: <?= $sbk['warna_sabuk']; ?>; color: <?= $sbk['warna_tulisan']; ?>;"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sabuk <?= $sbk['nama_sabuk']; ?></span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      <?php endforeach; ?>
      <!-- /.col -->
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        Start creating your amazing application!
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->