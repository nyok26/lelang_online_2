<?php
include '../layouts/header.php';
include '../layouts/navbar_masyarakat.php';

?>
<!DOCTYPE html>
<html lang="en">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">

                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card">
                        <?php
                        $no = 1;
                        include '../koneksi.php';
                        $tb_masyarakat = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat where username='$_SESSION[username]'");
                        while ($tabel_masyarakat = mysqli_fetch_array($tb_masyarakat)) {
                        ?>
                            <div class="card-body">
                                <h6 class="card-title">Selamat Datang <b><?= $tabel_masyarakat['username'] ?>!</b></h6>
                                <br>
                                <p class="card-text">silahkan masukkan penawaran anda pada tombol dibawah</p>
                                <a href="penawaran.php" class="btn btn-primary">Penawaran</a>
                            </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php } ?>
<!-- /.content-wrapper -->
<?php
include '../layouts/footer.php';
?>