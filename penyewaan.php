<?php 
    include './koneksi/koneksi.php'; 
    include './koneksi/function.php'; 
    include './template/header.php'; 
    
    if (empty($_SESSION['id']) || $_SESSION['role'] !=='penyewa') {
        echo "<script>alert('Silahkan login terlebih dahulu!');window.location='login.php'</script>";
        die;
    }
    include './template/nav.php';
?>

<div class="container table-sewa">
    <div class="row mt-5">
        <div class="col rounded shadow p-sm-4">
            <div class="row mb-sm-3">
                <div class="col">
                    <h4>Penyewaan</h4>
                    <small class="font-weight-light">Daftar mobil yang sedang anda sewa.</small>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Penyewa</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">No Polisi</th>
                        <th scope="col" class="text-center">Tanggal Sewa</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Jumlah Hari</th>
                        <th scope="col">Harga Sewa</th>
                    </tr>
                <tbody>
                    <?php

                    $result = $conn->query("SELECT a.*,b.nama,b.no_polisi,b.harga_sewa,b.gambar,c.nama AS namauser FROM 18132_mpenyewaan a, 18132_mobil b,18132_user c WHERE a.id_mobil = b.id_mobil AND a.id_user = c.id_user AND a.id_user ='".$_SESSION['id']."'") or die($conn->error);
                    if ($result->num_rows > 0):       
                    while($row = $result->fetch_assoc()) 
                    {
                ?>
                    <tr>
                        <td><?= $row['namauser']  ?></td>
                        <td><img style="width:50px; height:50px;" src="./assets/img/<?= $row['gambar'] ?>" alt=".."></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['no_polisi'] ?></td>
                        <td><?= $row['tgl_sewa'] ?></td>
                        <td><?= $row['tgl_kembali'] ?></td>
                        <td><?= $row['lama_sewa'] ?></td>
                        <td><?= $row['harga_sewa'] ?></td>

                        
                    </tr>
                    <tr>
                        <th colspan="6" class="text-right">&nbsp;</th>
                         <th colspan="2" class="text-right"><?= $row['lama_sewa'] ?> Hari x Rp. <?= $row['harga_sewa'] ?></th>

                    </tr>
                    <tr>
                        <th colspan="6" /th>
                         <th colspan="2" class="text-right">Total  Rp. <?= $row['lama_sewa']*$row['harga_sewa']?></th>

                    </tr>

                   <?php } endif;
                    ?>
                </tbody>
                
            </table>
            
            <div class="mt-4">
                <small class="d-block font-weight-light">* Anda harus datang ke tempat kami untuk mengambil mobil,
                    pada tanggal menyewa yang anda tentukan.</small>
                <small class="d-block font-weight-light">* Mobil yang disewa harus dikembalikan setelah mencapai lama
                    peminjaman, pada jam seperti waktu
                    pengambilan mobil.</small>

            </div>
        </div>
    </div>
</div>

