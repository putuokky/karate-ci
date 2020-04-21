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
                <div class="form-group">
                  <label for="namasabuk">Nama Sabuk</label>
                  <input type="text" class="form-control col-md-4" id="namasabuk" name="namasabuk" placeholder="Enter Nama Sabuk">
                  <small class="form-text text-danger"><?= form_error('namasabuk'); ?></small>
                </div>
                <div class="form-group">
                  <label for="warnasabuk">Warna Sabuk</label>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control col-md-2" id="warnasabuk" name="warnasabuk" placeholder="Enter Warna Sabuk">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  <small class="form-text text-danger"><?= form_error('warnasabuk'); ?></small>
                </div>
                <div class="form-group">
                  <label for="warnatulisan">Warna Tulisan</label>
                  <div class="input-group my-colorpicker22">
                    <input type="text" class="form-control col-md-2" id="warnatulisan" name="warnatulisan" placeholder="Enter Warna Tulisan">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                    <small class="form-text text-danger"><?= form_error('warnatulisan'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tingkatsabuk">Tingkatan Sabuk</label>
                  <input type="text" class="form-control col-md-3" id="tingkatsabuk" name="tingkatsabuk" placeholder="Enter Tingkatan Sabuk">
                  <small class="form-text text-danger"><?= form_error('tingkatsabuk'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('log/sabuk'); ?>" class="btn btn-default">Cancel</a>
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