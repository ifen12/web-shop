<?php
	$id_barang =$_GET['id_barang'];

	include "../koneksi/konek.php";

	$perintah ="SELECT * FROM pembeli WHERE id_barang = '$id_barang'";

	$hasil = mysqli_query($konek, $perintah);

	$data = mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail</title>
	<link rel="stylesheet" href="../css/iconmaterial.css">
	  	<link rel="stylesheet" href="../css/materialize.css">
	  	<link rel="stylesheet" href="../css/css.css">
	  	<link rel="stylesheet" href="../css/dropify.min.css">

	  	<script src="../js/jquery-3.1.0.min.js"></script>
	  	<script src="../js/materialize.js"></script>
	  	<script src="../js/dropify.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col s12 m8 l12"> <!-- Note that "m8 l9" was added -->
			<div class="col s12 z-depth-4 card-panel">
			<div class="container">
				
			    <div class="row">
						<h1 class="center"><?php echo $data['nama_pembeli'];?> <?php echo $data['nama_lengkap'];?></h1><br>
						<table class="striped centered">

							<tr>
								<td>Nama</td>
								<td><?php echo $data['nama_pembeli'];?></td>
							</tr>

							<tr>
								<td>nama lengkap</td>
								<td><?php echo $data['nama_lengkap'];?></td>
							</tr>

							<tr>
								<td>alamat</td>
								<td><?php echo $data['alamat'];?></td>
							</tr>

							<tr>
								<td>nomor handpone</td>
								<td><?php echo $data['hp'];?></td>
							</tr>

							<tr>
								<td>jode pos</td>
								<td><?php echo $data['kodepos'];?></td>
							</tr>

							<tr>
								<td>email</td>
								<td><?php echo $data['email'];?></td>
							</tr>

						</table>
			            <a href="edintas.php">
							<button class="btn waves-effect waves-light">Back</button>
			          	</a>
					</div><!-- end col  -->
			    </div><!-- end class row -->
			    </div>
			</div><!-- end countainer -->
		</div>
	<script>
	
	</script>
		</div>
</body>
</html>