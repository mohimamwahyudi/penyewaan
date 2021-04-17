<?php 
    include '../koneksi/koneksi.php'; 
    include '../template/admin_header.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col p-sm-0">
            <div class="jumbotron mb-1 bg-white">
                <h1 class="display-4 text-center">Selamat Datang...</h1>
                <p class="lead text-center">Selamat Datang di Halaman Admin. Dengan akses admin ini, anda dapat mengelola data, transaksi pembayaran, dan laporan.</p>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row text-center mt-3 alur">
        <div class="col-sm-12">
            <h3 class="mb-4 text-center">AKSES ADMIN</h3>
        </div>
        <div class="col-sm-4">
            <img src="../assets/img/mengolahdata.jpg" alt=".." width="150px"class="rounded-circle shadow">
            <h5 class="mt-2">Mengolah Data</h5>
        </div>
        <div class="col-sm-4">
            <img src="../assets/img/abcdc.jpg" alt=".." width="150px" class="rounded-circle shadow">
            <h5 class="mt-2">Transaksi Pembayaran</h5>
        </div>
        <div class="col-sm-4">
            <img src="../assets/img/abcc.jpg" alt=".." width="150px" class="rounded-circle shadow">
            <h5 class="mt-2">Laporan</h5>
        </div>
    </div>

<?php include '../template/admin_footer.php'; ?>