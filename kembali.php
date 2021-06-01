<?php
//Include file koneksi ke database
include "connection/koneksi.php";

//menerima nilai dari kiriman form input-barang 

$id_sewa=$_POST["id_sewa"];

$sql2="SELECT * FROM penyewaan WHERE id_sewa=$id_sewa";

$hasil2=mysqli_query($conn,$sql2);
while ($data2 = mysqli_fetch_array($hasil2)){
$id_mobil=$data2['id_mobil'];
$id_customer=$data2['id_customer'];
}

$id_admin=$_POST["id_admin"];


$tanggal_kembali=$_POST["tanggal_kembali"];
$keterangan=$_POST["keterangan"];
$denda=$_POST["denda"];
//Query input menginput data kedalam tabel barang
               
  $sql="CALL pengembalian ($id_admin,$id_mobil,$id_customer,$id_sewa,'$tanggal_kembali','$keterangan',$denda)";

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
    echo "$id_sewa";
    echo "$id_mobil";
    echo "$id_customer";
    echo "$id_sewa";
    echo "$tanggal_kembali";
    echo "$keterangan";
    echo "$denda";
	exit;
}  


?>