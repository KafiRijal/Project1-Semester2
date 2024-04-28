<?php
require_once './layouts/top.php';
require_once './layouts/navbar.php';
require_once './layouts/sidebar.php';

require_once './db_koneksi.php';

// Perintah untuk mengambil data dari table pasien
$sql = 'SELECT * FROM pasien';
// Jalanin query
$getPasien = $dbh->query($sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pasien</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pasien</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table tablebordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Nama Pasien</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($getPasien as $key => $pasien) : ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $pasien['kode'] ?></td>
                <td><?= $pasien['nama'] ?></td>
                <td><?= $pasien['alamat'] ?></td>
                <td><?= $pasien['email'] ?></td>
                <td>
                  <a href="./form_pasien.php?id=<?= $pasien['id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                  <form action="proses_pasien.php" method="post">
                    <input type="hidden" name="id_pasien" value="<?= $pasien['id'] ?>">
                    <input type="submit" name="proses" class="btn btn-sm btn-danger" value="Hapus">
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once './layouts/bottom.php';
?>