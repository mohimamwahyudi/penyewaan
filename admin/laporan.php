<?php 
    include '../koneksi/koneksi.php'; 
    include '../template/admin_header.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col shadow p-sm-5 rounded">
            <div class="row mb-sm-3">
                <div class="col">
                    <h3>Laporan Penyewaan Mobil</h3>
                </div>
            </div>
            <form method="post">
                <div class="form-row">
                    <!--  -->
                    <div class="col" style="line-height:6.3">
                        <!-- <button type="submit" class="btn btn-dark">Klik</button> -->
                        <a href="print-laporan.php?awal=<?= @$_POST['awal'].'&akhir='.@$_POST['akhir'] ?>" target="_blank"><button type="button" class="btn btn-dark" >Cetak</button></a>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal/Jam Transaksi</th>
                        <th scope="col">Penyewa</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">Harga Sewa</th>
                        <th scope="col">Lama Sewa</th>
                        <th scope="col">Total</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                $no=0;
               $sum=0;
                $sql = "SELECT a.*,b.lama_sewa,c.nama AS namauser,d.nama,d.harga_sewa FROM 18132_pembayaran a, 18132_mpenyewaan b, 18132_user c,18132_mobil d WHERE a.id_sewa=b.id_sewa AND b.id_user=c.id_user AND b.id_mobil = d.id_mobil ORDER BY a.tgl_bayar";
                $result = $conn->query($sql) or die($conn->error);
                if ($result->num_rows > 0) {       
                    while($row = $result->fetch_assoc()) 
                    {

                ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['tgl_bayar'] ?></td>
                <td><?= $row['namauser'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td>Rp.<?= number_format($row['harga_sewa']); ?></td>
                <td class="text-center"><?= $row['lama_sewa']; ?> Hari</td>
                <td>Rp.<?= number_format($row['total_bayar']); ?></td>
            </tr>
            
            <?php
                    $sum+=$row['total_bayar'];
                        }
                    }
                ?>
                <tr>
                    <td colspan="6" class="text-right">Total :</td>
                    <td>Rp.<?= number_format($sum) ?></td>
                </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include '../template/admin_footer.php'; ?>