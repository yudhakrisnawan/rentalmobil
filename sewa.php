<?php
//Include file koneksi ke database
include "connection/koneksi.php";

//menerima nilai dari kiriman form input-barang 
$id_admin=$_POST["id_admin"];
$id_mobil=$_POST["id_mobil"];
$id_customer=$_POST["id_customer"];
$tanggal_sewa=$_POST["tanggal_sewa"];
$waktu_sewa=$_POST["waktu_sewa"];
//Query input menginput data kedalam tabel barang

  $sql="CALL penyewaan ($id_admin,'$id_mobil','$id_customer','$tanggal_sewa',$waktu_sewa)";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($conn,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
    
	echo "Berhasil insert data";
    
	exit;
  }
else {
	echo "Gagal insert data";
    echo "$id_admin";
    echo "$id_mobil";
    echo "$id_customer";


	exit;
}  


?>