<?php
	session_start();

	include "koneksi/konek.php";

	$userid = $_POST['userid'];
	$psw = $_POST['psw'];
	$op = $_GET['op'];

	if ($op == "in") {
		$tampil = "SELECT * FROM tabeluser WHERE userid = '$userid' AND password = '$psw'";

		$cek = mysqli_query($konek, $tampil);

		if (mysqli_num_rows($cek) == 1) {
			
			$c = mysqli_fetch_array($cek);
			$_SESSION['userid'] = $c['userid'];
			$_SESSION['password'] = $c['password'];

			if ($c['password'] == "admin") {
					header("location:motor/listmotor.php");
				}elseif($c['password'] == "user"){
					header("location:login.php");
				}
		}else{
			header("location:login.php");
		}
	}elseif($op == "out"){
		unset($_SESSION['userid']);
		unset($_SESSION['password']);
		header("location:motor/listmotor.php");
	}
?>