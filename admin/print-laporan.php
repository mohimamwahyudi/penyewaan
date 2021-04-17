<?php
    include '../koneksi/koneksi.php';
    $tgl_awal=@$_GET['awal'];
    $tgl_akhir=@$_GET['akhir'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="reporting">
    <h2>Laporan Transaksi Penyewaan Mobil Torjun</h2>
    <h4>Jl. Raya Torjun - Sampang</h4>
    <table class="table gtable-striped table-bordered mt-4">
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

    <script>
        window.print();
    </script>

</body>
</html>