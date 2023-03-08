
<?php 
include '../layouts/header.php';
?>

<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="row">
      <!-- /.col-md-6 -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="col-lg-12 text-center">
              <h5 class="m-0"> Laporan Hasil Lelang Online</h5>
            </div>
          </div>
          <div class="card-body">
            
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Lelang</th>                      
                    <th>Pemenang Lelang</th>
                    <th>Harga Tertinggi</th>
                    <th>Status Lelang</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  include "../koneksi.php";
                  $tb_lelang    = mysqli_query($koneksi, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas ");
                  while ($d_tb_lelang = mysqli_fetch_array($tb_lelang)) {
                    $harga_tertinggi = mysqli_query($koneksi, "select max(penawaran_harga) as penawaran_harga FROM history_lelang where id_lelang='$d_tb_lelang[id_lelang]'");
                    $harga_tertinggi = mysqli_fetch_array($harga_tertinggi);
                    $d_harga_tertinggi = $harga_tertinggi['penawaran_harga'];
                    $pemenang = mysqli_query($koneksi, "SELECT * FROM history_lelang where penawaran_harga='$harga_tertinggi[penawaran_harga]'");
                    $d_pemenang = mysqli_fetch_array($pemenang);
                    //$tb_masyarakat = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat where id_user='$d_pemenang[id_user]'");

                    if (isset($d_pemenang) && isset($d_pemenang['id_user'])) {
                      $id_user = $d_pemenang['id_user'];
                      $tb_masyarakat = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat where id_user='$id_user'");
                      // continue processing the query result here
                    } else {
                      // display a message to inform the user that there is no winner for the auction or the winner data is not complete

                    }
                    $d_tb_masyarakat = mysqli_fetch_array($tb_masyarakat);
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?= $d_tb_lelang['nama_barang'] ?></td>
                      <td><?= $d_tb_lelang['tgl_lelang'] ?></td>
                      <td>
                        <?php if ($d_tb_lelang['status'] == 'dibuka') { ?>
                          -
                        <?php } else { ?>
                          <?= $d_tb_masyarakat['nama_lengkap'] ?>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($d_tb_lelang['status'] == 'dibuka') { ?>
                          -
                        <?php } else { ?>
                          Rp. <?= number_format($d_harga_tertinggi) ?>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($d_tb_lelang['status'] == '') { ?>
                          <div class="btn btn-warning btn-sm">Lelang Belum Aktif</div>
                        <?php } else if ($d_tb_lelang['status'] == 'dibuka') { ?>
                          <div class="btn btn-danger btn-sm">Lelang Belum Ditutup</div>
                        <?php } else { ?>
                          <div class="btn btn-success btn-sm">Lelang Selesai</div>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
              </tbody>
            </table>      
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<script>
 window.print();
</script>
<!-- /.content-wrapper -->
<?php 
?>