<?php
	//koneksi ke database
	include "koneksi/konek.php";

	//ambil data dari form
	$nama		= $_POST['nama'];
	$last 		= $_POST['last'];
	$alamat  	= $_POST['alamat'];
	$hp 		= $_POST['hp'];
	$pos 		= $_POST['pos'];
	$email 		= $_POST['email'];

	$input = "INSERT INTO pembeli(nama_pembeli,nama_lengkap,alamat,hp,kodepos,email) VALUES ('$nama','$last','$alamat','$hp','$pos','$email')";

	$hasil = mysqli_query($konek,$input);

	//apabila query untuk input data benar
	if('$hasil'){
		header("location:pembayaran.php");
		//echo "benar";
	}else{
		header("location:frombeli.php");
		//echo "gagal BOZZ";
	}
?>