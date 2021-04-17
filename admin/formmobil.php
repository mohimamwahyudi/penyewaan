<?php 
    include '../koneksi/koneksi.php'; 
    include '../template/admin_header.php'; 

$id='';
if ($_GET){
  $id=$_GET['id'];
  $data = $conn->query("SELECT * FROM 18132_mobil where id_mobil='$id'")->fetch_row();
}

if ($_POST) {
  $error='';
  $nama_alat=$_POST['nama'];
  $harga_sewa=$_POST['harga_sewa'];
  $no_polisi=$_POST['no'];
  $keterangan=$_POST['keterangan'];

  $nama = 'default.jpg';

  if ($_FILES['gambar']['error'] !== 4) {

    $nama = $_FILES['gambar']['name'];
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
  
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 10440700){			
            if ($id) {
                $nm_gambar = $conn->query("SELECT gambar from 18132_mobil where id_mobil='$id'")->fetch_row()[0];
                if (file_exists('../assets/img/'.$nm_gambar) && $nm_gambar !== 'default.jpg') {
                    unlink('../assets/img/'.$nm_gambar);
                }
            }
            $nm_gambar="../assets/img/".$nama;
            move_uploaded_file($file_tmp, $nm_gambar);
        }
        else {
            $error='UKURAN FILE TERLALU BESAR!';
        }
    }
    else{
        $error='EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }
  }

  if (!$error) {
    if (!$id) {
      $exec = $conn->query("INSERT INTO 18132_mobil VALUES (null, '$nama_alat', '$no_polisi', '$harga_sewa', '$nama', '$keterangan')") or die($conn->error);
      echo "<script>alert('mobil berhasil ditambahkan');window.location='./datamobil.php'</script>";
    }
    else {
      $exec = $conn->query("UPDATE 18132_mobil SET nama='$nama_alat', no_polisi='$no_polisi', harga_sewa='$harga_sewa', gambar='$nama', keterangan='$keterangan' where id_mobil='$id'") or die($conn->error);
      echo "<script>alert('mobil berhasil diubah');window.location='./datamobil.php'</script>";
    }
  }
}

?>

<div class="container">
    <div class="row">
        <div class="col shadow p-sm-5 rounded">
            <div class="row mb-sm-3">
                <div class="col">
                    <h3><?= (@$id) ? 'Edit Mobil' : 'Tambah Mobil' ?></h3>
                </div>
                <div class="col text-right">
                    <a href="datamobil.php"><button class="btn btn-outline-dark"><< Data Mobil</button></a>
                </div>
            </div>
            <?= (@$error) ? "<div class='alert alert-danger'>$error</div>" : '' ?>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Mobil</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Mobil" ?
                        required >
                </div>
                <div class="form-group">
                    <label>Harga Sewa</label>
                    <input type="number" class="form-control" name="harga_sewa" placeholder="Harga Sewa"
                         required>
                </div>
                <div class="form-group">
                    <label>No.Polisi</label>
                    <input type="text" class="form-control" name="no" placeholder="No.Polisi" 
                        required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" name="keterangan"
                        placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control-file" name="gambar">
                </div>
                <button type="submit" class="btn btn-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php include '../template/admin_footer.php'; ?>