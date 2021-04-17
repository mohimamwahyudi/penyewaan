<?php 
    include '../koneksi/koneksi.php'; 
    include '../template/admin_header.php'; 
?>

<div class="container">
    <div class="row table-alat">
        <div class="col shadow p-sm-5 rounded">
            <div class="row mb-sm-3">
                <div class="col">
                    <h3>Data Mobil</h3>
                </div>
                <div class="col text-right">
                    <a href="formmobil.php"><button class="btn btn-outline-dark">Tambah</button></a>
                     <a href="perawatan.php"><button class="btn btn-outline-dark">perawatan</button></a>
                </div>
            </div>
            <table id="tabel" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama mobil</th>
                        <th scope="col">Harga Sewa</th>
                        <th scope="col">no polisi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=0;
                    $result = $conn->query("SELECT * FROM 18132_mobil") or die($conn->error);
                    if ($result->num_rows > 0) {       
                        while($row = $result->fetch_assoc()) 
                        {
                    ?>
                    <tr>
                        <th scope="row"><?= ++$no ?></th>
                        <td class="text-center"><img src="../assets/img/<?= $row['gambar'] ?>" alt=".." width="50px"></td>
                        <td><?= $row['nama'] ?></td>
                        <td>Rp.<?= number_format($row['harga_sewa']) ?></td>
                        <td><?= $row['no_polisi'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td class="text-center">
                            <a href="formmobil.php?id=<?= $row['id_mobil'] ?>"><button class="btn bg-dark text-white">Ubah</button></a>
                            <a href="hapusmobil.php?id=<?= $row['id_mobil'] ?>" onclick="return confirm('anda akan menghapus mobil ini ?')"><button class="btn btn-danger">Hapus</button></a>
                        </td>
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