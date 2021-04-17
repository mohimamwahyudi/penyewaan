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

<div class="container table-history">
    <div class="row mt-5">
        <div class="col rounded shadow p-sm-4">
            <div class="row mb-sm-3">
                <div class="col">
                    <h4>History</h4>
                    <small class="font-weight-light">Daftar penyewaan yang pernah di lakukan.</small>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Bayar</th>
                        <th scope="col">Tgl Transaksi</th>
                        <th scope="col">Penyewa</th>
                        <th scope="col">Jumlah Uang</th>
                        <th scope="col">Harga Sewa</th>
                        <th scope="col">Kembalian</th>
                    </tr>
                <tbody>
                    <?php
                     $result = $conn->query(" SELECT a.*, c.nama FROM 18132_pembayaran a, 18132_mpenyewaan b, 18132_user c WHERE a.id_sewa=b.id_sewa AND b.id_user=c.id_user ANd c.id_user = '".$_SESSION['id']."' ORDER BY a.tgl_bayar ASC");

                    if ($result->num_rows > 0) {       
                    while($row = $result->fetch_assoc()) 
                    {
                ?>
                    <tr>
                        <td class="text-center"><?= $row['id_bayar'] ?></td>
                        <td><?= $row['tgl_bayar'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td>Rp.<?= number_format($row['jml_uang']) ?></td>
                        <td>Rp.<?= number_format($row['total_bayar']) ?></td>
                        <td>Rp.<?= number_format($row['kembalian']) ?></td>
    
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include './template/footer.php'; ?>