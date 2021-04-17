<?php 
    include '../koneksi/koneksi.php'; 
    include '../koneksi/function.php'; 
    include '../template/admin_header.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col shadow p-sm-5 rounded">
            <div class="row mb-sm-3">
                <div class="col">
                    <h3>Daftar di Sewa/Pembayaran</h3>
                </div>
            </div>
            <table id="tabel" class="table table-striped table-bordered">
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
                        <th scope="col">Dikembalikan/ Bayar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=0;
                    $result = $conn->query("SELECT a.*,b.nama,b.no_polisi,b.harga_sewa,b.gambar,c.nama AS namauser FROM 18132_mpenyewaan a, 18132_mobil b,18132_user c WHERE a.id_mobil = b.id_mobil AND a.id_user = c.id_user ANd a.status = 'disewa' ") or die($conn->error);
                    if ($result->num_rows > 0) {       
                        while($row = $result->fetch_assoc()) 
                        {
                            
                    ?>
                     <tr>
                        <td><?= $row['namauser']  ?></td>
                        <td><img style="width:50px; height:50px;" src="../assets/img/<?= $row['gambar'] ?>" alt=".."></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['no_polisi'] ?></td>
                        <td><?= $row['tgl_sewa'] ?></td>
                        <td><?= $row['tgl_kembali'] ?></td>
                        <td><?= $row['lama_sewa'] ?></td>
                        <td><?= $row['harga_sewa'] ?></td>
                        <?php $total =  $row['lama_sewa']*$row['harga_sewa']; ?>
                        <td><button class="btn my-1 bg-dark text-white" data-toggle="modal"
                                data-target="#transaksi" data-id="<?= $row['id_sewa'] ?>" data-total="<?= $total ?>">Bayar</button></td>
                        
                    </tr>
                    <tr>
                        <th colspan="6" class="text-right">&nbsp;</th>
                         <th colspan="2" class="text-right"><?= $row['lama_sewa'] ?> HARI x Rp. <?= $row['harga_sewa'] ?></th>

                    </tr>
                    <tr>
                        <th colspan="6" class="text-right"></th>
                         <th colspan="2" class="text-right">Total Rp. <?= $total; ?></th>

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
<div class="modal fade" id="transaksi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaksi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="transaksi.php" method="post" id="bayar">
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4"> Total Bayar : Rp.0 </h4>
                    <div class="form-row">
                        <div class="col">
                            <label>Jumlah Uang</label>
                            <input type="hidden" name="id">
                            <input type="hidden" name="total" value="320000">
                            <input type="text" name="jml_uang" class="form-control" placeholder="Jumlah Uang" required>
                        </div>
                        <div class="col">
                            <label>Kembalian</label>
                            <input type="text" name="kembalian" class="form-control" placeholder="Kembalian" value="0" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-dark text-white btn-block">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../template/admin_footer.php'; ?>