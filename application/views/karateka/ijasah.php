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
                <input type="hidden" class="form-control" id="idbio" name="idbio" value="<?= $karate['biodata']; ?>">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <select class="form-control col-md-5" name="nama">
                    <?php foreach ($bio as $b) : ?>
                      <?php if ($karate['biodata'] == $b['id_biodata']) : ?>
                        <option value="<?= $b['id_biodata']; ?>" selected><?= $b['nama']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="sabuk">Sabuk</label>
                  <select class="form-control col-md-4" name="sabuk">
                    <?php foreach ($sabuk as $s) : ?>
                      <?php if ($karate['sabuk'] == $s['id_sabuk']) : ?>
                        <option value="<?= $s['id_sabuk']; ?>" selected><?= $s['nama_sabuk']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('sabuk'); ?></small>
                </div>
                <div class="form-group">
                  <label for="noijasah">No. Ijasah</label>
                  <input type="text" class="form-control col-md-6" id="noijasah" name="noijasah" placeholder="Enter No. Ijasah">
                  <small class="form-text text-danger"><?= form_error('noijasah'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tglijasah">Tanggal Ijasah</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepicker" name="tglijasah" placeholder="Enter Tanggal Ijasah">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tglijasah'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nilairata">Nilai Rata-rata</label>
                  <input type="text" class="form-control col-md-3" id="nilairata" name="nilairata" placeholder="Enter Nilai Rata-rata">
                  <small class="form-text text-danger"><?= form_error('nilairata'); ?></small>
                </div>
                <div class="form-group">
                  <label for="sabukbaru">Sabuk Baru</label>
                  <select class="form-control col-md-4" name="sabukbaru">
                    <?php
                    foreach ($sabuk as $sb) : ?>
                      <?php if ($karate['sabuk'] == $sb['id_sabuk']) : ?>
                        <option value="<?= $sb['id_sabuk']; ?>" selected><?= $sb['nama_sabuk']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('sabukbaru'); ?></small>
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