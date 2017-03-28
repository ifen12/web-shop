<?php
	//koneksi ke database
	include "../koneksi/konek.php";

	//ambil data dari form
	$merek 		= $_POST['merek'];
	$nama  		= $_POST['nama'];
	$lokasifile = $_FILES['upfile']['tmp_name'];
	$namafile 	= $_FILES['upfile']['name'];
	$spek  		= $_POST['spek'];
	$warna 		= $_POST['warna'];
	$harga 		= $_POST['harga'];


	//tujuan
	$tujuan = "img/$namafile";

	$upload = move_uploaded_file($lokasifile, $tujuan);

	$input = "INSERT INTO motor(merek_motor,nama_motor,foto,spek_motor, warna_motor,harga) VALUES ('$merek','$nama','$namafile','$spek','$warna','$harga')";

	$hasil = mysqli_query($konek,$input);

	//apabila query untuk input data benar
	if($hasil OR $upload){
		header("location:listmotor.php");
		//echo "benar";
	}else{
		header("location:inputmotor.php");
		//echo "gagal BOZZ";
	}
?>