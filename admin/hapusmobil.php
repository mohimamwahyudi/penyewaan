<?php

if (@$_GET['id']) {
	include '../koneksi/koneksi.php';
      $id=$_GET['id'];
      $nm_gambar = $conn->query("SELECT gambar from 18132_mobil where id_mobil='$id'")->fetch_row()[0];
      if (file_exists('../assets/img/'.$nm_gambar) && $nm_gambar !== 'default.jpg') {
          unlink('../assets/img/'.$nm_gambar);
      }
      $exec = $conn->query("DELETE FROM 18132_mobil where id_mobil='$id'") or die($conn->error);
      if ($exec) {
        echo "<script>alert('mobil berhasil dihapus');window.location='./datamobil.php'</script>";
      }
    }

?>