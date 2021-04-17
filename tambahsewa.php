 <?php 
 include './template/header.php';
 if (empty($_SESSION['id']) || $_SESSION['role'] !=='penyewa') {
        echo "<script>alert('Silahkan login terlebih dahulu!');window.location='login.php'</script>";
        die;
    }  
 $ids = $_GET['id'];

 if (isset($_POST['sewa'])) {
 	$tgl_sewa = $_POST['tgl_sewa'];
 	$lama = $_POST['lama'];
  $tgl_kembali=date('Y-m-d H:i:s', strtotime($tgl_sewa . " + $lama day"));
  
 	try{

  $coon = new PDO('mysql:host=kprikaryasehat.site;dbname=kprikary_resto','kprikary_kuliah','unijoyo2020');
  $coon -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $tambah = $coon->query("INSERT INTO 18132_mpenyewaan (id_sewa, id_user, tgl_sewa,tgl_kembali, lama_sewa, id_mobil,status) VALUES (NULL,'".$_SESSION['id']."', '$tgl_sewa','$tgl_kembali' ,'$lama', '$ids','disewa');");
  
  if ($tambah->rowCount()>0  ) {
    $query = $coon->query("UPDATE 18132_mobil SET keterangan = 'disewa' WHERE id_mobil =  $ids;");
    $query->execute();
    header('Location: penyewaan.php'); 
    exit();
    
  }

 
  
  }catch (PDOException $err) {
		echo $err->getMessage();
	}
 }

  ?>
 <form method="post" action="">
                <div class="form-row justify-content-center mt-2">
                    <div class="col-4">
                        <label>Tanggal Menyewa</label>
                        <input type="datetime-local" name="tgl_sewa" class="form-control" placeholder="Tanggal Menyewa" required>
                    </div>
                    <div class="col-2">
                        <label>Lama Penyewaan</label>
                        <input type="number" name="lama" class="form-control d-inline" min="1" placeholder="[Berapa Hari]" required>
                    </div>
                    <div class="col-3 text-center" style="line-height:6.2">
                        <button class="btn btn-outline-dark" name="sewa">Sewa Sekarang</button>
                    </div>
                </div>
            </form>
 <div class="mt-4">

               
       

   </div>