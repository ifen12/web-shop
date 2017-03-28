<?php
	$id_motor =$_GET['id_motor'];

	include "../koneksi/konek.php";

	$perintah ="SELECT * FROM motor WHERE id_motor = '$id_motor'";

	$hasil = mysqli_query($konek, $perintah);

	$data = mysqli_fetch_array($hasil);

	$foto = $data['foto'];

	if ($foto == NULL){
		$foto = "suzuki1.png";
	}

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
						<h1 class="center"><?php echo $data['nama_motor'];?></h1><br>
						<table class="striped centered">
							
							<div class="row">
								<div class="col-sm-6">
									<img id="input-file-to-destroy" data-default-file="img/<?php echo $foto; ?>" >
								</div>	
							</div>

							<tr>
								<td>MEREK</td>
								<td><?php echo $data['merek_motor'];?></td>
							</tr>

							<tr>
								<td>Nama Motor</td>
								<td><?php echo $data['nama_motor'];?></td>
							</tr>

							<tr>
								<td>Spesifikasi</td>
								<td><?php echo $data['spek_motor'];?></td>
							</tr>

							<tr>
								<td>Warna motor</td>
								<td><?php echo $data['warna_motor'];?></td>
							</tr>

							<tr>
								<td>Harga</td>
								<td><?php echo $data['harga'];?></td>
							</tr>

						</table>
			            <a href="listmotor.php">
							<button class="btn waves-effect waves-light">Back</button>
			          	</a>
					</div><!-- end col  -->
			    </div><!-- end class row -->
			    </div>
			</div><!-- end countainer -->
		</div>
	<script>
	$(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
	</script>
		</div>
</body>
</html>