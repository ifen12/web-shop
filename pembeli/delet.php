<?php 
$id_barang = $_GET['id_barang'];

include "../koneksi/konek.php";

$hapus = "DELETE FROM pembeli WHERE id_barang ='$id_barang'";
$hasil = mysqli_query($konek,$hapus);

if ('$hasil') {
	header("location:edintas.php");
	//echo "benar";
}else{
	echo "hapus gagal";
}

 ?>