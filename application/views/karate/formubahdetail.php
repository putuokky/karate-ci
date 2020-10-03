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
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="card-body">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $karate['id_karateka']; ?>">
                <input type="hidden" class="form-control" id="id_bio" name="id_bio" value="<?= $karate['biodata']; ?>">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control col-md-8" id="nama" name="nama" placeholder="Enter Nama" value="<?= $karate['nama']; ?>" disabled>
                  <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="sabuk">Sabuk</label>
                  <select class="form-control col-md-4 select2bs4" name="sabuk">
                    <option value="0">-</option>
                    <?php foreach ($sabuk as $s) : ?>
                      <?php if ($karate['sabuk'] == $s['id_sabuk']) : ?>
                        <option value="<?= $s['id_sabuk']; ?>" selected><?= $s['nama_sabuk']; ?></option>
                      <?php else : ?>
                        <option value="<?= $s['id_sabuk']; ?>"><?= $s['nama_sabuk']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('sabuk'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('log/karateka/detail/' . $karate['biodata']); ?>" class="btn btn-default">Cancel</a>
              </div>
            </form>
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