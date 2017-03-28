<?php 
$id_motor = $_GET['id_motor'];

include "../koneksi/konek.php";

$hapus = "DELETE FROM motor WHERE id_motor ='$id_motor'";
$hasil = mysqli_query($konek,$hapus);

if ('$hasil') {
	header("location:listmotor.php");
	//echo "benar";
}else{
	echo "hapus gagal";
}

 ?>