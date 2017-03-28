<?php
//koneksi ke database
include "../koneksi/konek.php";
//ambil variabel yang dikirim dari form
	$id_motor 	= $_POST['id_motor'];

	$merek 		= $_POST['merek'];
	$nama  		= $_POST['nama'];

	$spek  		= $_POST['spek'];
	$warna 		= $_POST['warna'];
	$harga 		= $_POST['harga'];
	$fotolama 	= $_POST['fotolama'];

	$namaf 		= $_FILES['fprofil']['name'];
	$lokasif 	= $_FILES['fprofil']['tmp_name'];

if ($namaf != NULL) {

	unlink("img/$fotolama");
	$tujuanf = "img/$namaf";

	$upload = move_uploaded_file($lokasif, $tujuanf);

	$foto = $namaf;
}else{

	$foto = $fotolama;
}

$update = "UPDATE motor SET id_motor ='$id_motor', merek_motor = '$merek', nama_motor = '$nama', spek_motor ='$spek',warna_motor ='$warna',harga ='$harga', foto = '$foto' WHERE id_motor ='$id_motor'";

$hasil = mysqli_query($konek,$update);
if($hasil){
	header("location:listmotor.php");
}else{
	echo "Update data tamu gagal";
}
?>