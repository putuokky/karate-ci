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