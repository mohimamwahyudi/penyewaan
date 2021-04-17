<?php 
    include '../koneksi/koneksi.php'; 
    include '../template/admin_header.php'; 
?>

<div class="container ">
    <div class="row ">
        <div class="col shadow p-sm-5">
            <div class="row mb-sm-3">
                <div class="col">
                    <h3>Riwayat Transaksi</h3>
                </div>
            </div>
            <table id="tabel" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID Bayar</th>
                        <th scope="col">Tgl Transaksi</th>
                        <th scope="col">Penyewa</th>
                        <th scope="col">Jumlah Uang</th>
                        <th scope="col">Harga Sewa</th>
                        <th scope="col">Kembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=0;
                    $sum=0;
                    $sql = "SELECT a.*, c.nama FROM 18132_pembayaran a, 18132_mpenyewaan b, 18132_user c WHERE a.id_sewa=b.id_sewa AND b.id_user=c.id_user ORDER BY a.tgl_bayar ASC";
                    $result = $conn->query($sql) or die($conn->error);
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

<?php include '../template/admin_footer.php'; ?>