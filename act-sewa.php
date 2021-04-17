<?php
    session_start();
    if (empty($_SESSION['id']) || $_SESSION['role'] !=='penyewa') {
        echo "<script>alert('Silahkan login terlebih dahulu!');window.location='login.php'</script>";
        die;
    }
    include './koneksi/koneksi.php';
    
    if (@$_POST) {

        $id=$_POST['id'];
        $ket=$_POST['keterangan'];
        
        $jumlah_alat=$conn->query("SELECT jumlah FROM 18132_mobil WHERE id_mobil='$id'")->fetch_row()[0];
        
        if ($jumlah_alat - $jumlah >= 0) {
            $query=$conn->query("SELECT id_sewa FROM 18132_penyewaan WHERE status='temp' AND id_user='".$_SESSION['id']."'");
            if ($query->num_rows == 0){
                $result=$conn->query("SELECT MAX(id_sewa) FROM 18132_penyewaan")->fetch_row()[0];
                $id_sewa='sewa'.sprintf("%02s", substr($result, 4) + 1);
                $conn->query("INSERT INTO 18132_penyewaan (id_sewa, id_user, status) VALUES ('$id_sewa', '".$_SESSION['id']."', 'temp')");      
            }
            else {
                $id_sewa=$query->fetch_row()[0];
            }
    
            if ($conn->query("SELECT id_mobil FROM 18132_d_sewa WHERE id_sewa='$id_sewa' AND id_mobil='$id'")->num_rows == 0) {
                $conn->query("INSERT INTO 18132_d_sewa VALUES('$id_sewa', '$id', '$jumlah', '$ket')");
            }
            else {
                $conn->query("UPDATE 18132_d_sewa SET jumlah=jumlah+$jumlah WHERE id_sewa='$id_sewa' AND id_mobil='$id'");
            }
    
            $conn->query("UPDATE 18132_mobil SET jumlah=jumlah-$jumlah WHERE id_mobil='$id'");
            header('location:penyewaan.php');
        }
        else {
            echo "<script>alert('Jumlah mobil tersedia tidak cukup untuk disewa!');window.location='mobil.php';</script>";
        }

        
    }

?>