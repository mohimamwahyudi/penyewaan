<?php 

	 include '../koneksi/koneksi.php'; 
    include '../template/admin_header.php';


 ?>
 <div class="container">
    <div class="row table-alat">
        <div class="col shadow p-sm-5 rounded">
            <div class="row mb-sm-3">
                <div class="col">
                    <h3>Kondisi Mobil</h3>
                </div>
                <!-- <div class="col text-right">
                    <a href="formmobil.php"><button class="btn btn-outline-dark">Tambah</button></a> -->

                </div>
            </div>
            <table id="tabel" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama mobil</th>
                        <th scope="col">Harga Sewa</th>
                        <th scope="col">No.Polisi</th>
                        <th scope="col">Kondisi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=0;
                    $result = $conn->query("SELECT sum(a.lama_sewa) as lama,b.* FROM 18132_mpenyewaan a,18132_mobil b WHERE a.id_mobil = b.id_mobil group by a.id_mobil") or die($conn->error);
                    if ($result->num_rows > 0) {       
                        while($row = $result->fetch_assoc()) 
                        {
                    ?>
                    <tr>
                        <th scope="row"><?= ++$no ?></th>
                        <td class="text-center"><img src="../assets/img/<?= $row['gambar'] ?>" alt=".." width="50px"></td>
                        <td><?= $row['nama']; ?></td>
                        <td>Rp.<?= number_format($row['harga_sewa']) ?></td>
                        <td><?= $row['no_polisi']; ?></td>
                        <td><?php if($row['lama']>=3){
                            echo "ganti oli";
                        }else{
                            echo "masih aman";
                        } ?></td>
                        
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