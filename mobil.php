<?php 

    include './koneksi/koneksi.php'; 

    include './template/header.php'; 

    include './template/nav.php'; 

?>



<div class="container table-mobil">

    <div class="row mt-5">

        <div class="col p-sm-4">

            <div class="row mb-sm-3">

                <div class="col">

                    <h4>Daftar Penyewaan Mobil</h4>

                    <small class="font-weight-light">Silangkan pilih mobil yang akan anda sewa.</small>

                </div>

            </div>

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th scope="col">Gambar</th>

                        <th scope="col">Nama Mobil</th>

                        <th scope="col">Harga Sewa</th>
                        <th scope="col">no polisi</th>


			<th scope="col">Keterangan</th>

                        <th scope="col">Sewa</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $result = $conn->query("SELECT * FROM 18132_mobil") or die($conn->error);

                    if ($result->num_rows > 0) {       

                    while($row = $result->fetch_assoc()) 

                    {

                ?>

                    <tr>

                        <th scope="row"><img style="width:50px; height:50px;" src="assets/img/<?= $row['gambar'] ?>" alt=".."></th>

                        <td><?= $row['nama'] ?></td>

                        <td>Rp.<?= number_format($row['harga_sewa']) ?></td>

                        <td><?= $row['no_polisi']  ?> </td>

                        </td>
			             <td><?= $row['keterangan'] ?></td>

                        
                        <?php if ($row['keterangan'] =='tersedia') {
                            echo "<td><a href='tambahsewa.php?id=$row[id_mobil]'>sewa</a>";
                        } ?>

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



<!-- Modal -->

<?php include './template/footer.php'; ?>