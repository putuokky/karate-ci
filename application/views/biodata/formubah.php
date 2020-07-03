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
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $biodata['id_biodata']; ?>">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" value="<?= $biodata['nama']; ?>">
                  <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control col-md-6" id="tempat_lahir" name="tempat_lahir" placeholder="Enter Tempat Lahir" value="<?= $biodata['tempat_lahir']; ?>">
                  <small class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tglahir">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepicker" name="tglahir" placeholder="Enter Tanggal Lahir" value="<?= date('m/d/Y', strtotime($biodata['tgl_lahir'])); ?>">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tglahir'); ?></small>
                </div>
                <div class="form-group">
                  <label for="jnskelamin">Jenis Kelamin</label>
                  <div class="col-md-6">
                    <?php if ($biodata['jenis_kelamin'] == 1) { ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jnskelamin" value="1" checked>
                        <label class="form-check-label">Laki - laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jnskelamin" value="2">
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    <?php } else if ($biodata['jenis_kelamin'] == 2) { ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jnskelamin" value="1">
                        <label class="form-check-label">Laki - laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jnskelamin" value="2" checked>
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    <?php } else { ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jnskelamin" value="1">
                        <label class="form-check-label">Laki - laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jnskelamin" value="2">
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    <?php } ?>
                  </div>
                  <small class="form-text text-danger"><?= form_error('jnskelamin'); ?></small>
                </div>
                <div class="form-group">
                  <label for="dojo">Dojo</label>
                  <select class="form-control col-md-4 select2bs4" name="dojo">
                    <option value="0">-</option>
                    <?php foreach ($dojo as $d) : ?>
                      <?php if ($biodata['dojo'] == $d['id_dojo']) : ?>
                        <option value="<?= $d['id_dojo']; ?>" selected><?= $d['nama_dojo']; ?></option>
                      <?php else : ?>
                        <option value="<?= $d['id_dojo']; ?>"><?= $d['nama_dojo']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('dojo'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('log/biodata'); ?>" class="btn btn-default">Cancel</a>
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