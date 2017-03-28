<?php
	$id_motor =$_GET['id_motor'];

	include "koneksi/konek.php";

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
	<title>form</title>

	  <link rel="stylesheet" href="css/iconmaterial.css">
  	<link rel="stylesheet" href="css/materialize.css">
  	<link rel="stylesheet" href="css/owl.carousel.min.css">

  	<script src="js/jquery-3.1.0.min.js"></script>
  	<script src="js/materialize.js"></script>
  	<script src="js/owl.carousel.min.js"></script>

</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Ifen12-Motor</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="login.php"><i class="material-icons left">perm_identity</i>Login admin</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="sass.html"><i class="material-icons left">perm_identity</i>Login admin</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

<div class="row" style="padding: 10px;">

	<div class="col s7 push-s5">
		<div class="row">
		    <div class="card-panel" style="background-color: white !important; padding: 10px !important; overflow: hidden !important ;height:700px">
		        <div col class="l12 m12 s12">
		          <h4>isi formulir </h4>
		        </div>
		      	<form class="col s12" method="POST" action="prosesbeli.php">
		          <div class="row">
			        <div class="input-field col s6">
			          <input placeholder="what is your name ?" id="first_name" type="text" class="validate" name="nama">
			          <label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate" name="last">
			          <label for="last_name">Last Name</label>
			        </div>
			      </div>
			      
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="text" class="validate" name="alamat">
			          <label for="password">alamat</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="text" class="validate" name="hp">
			          <label for="password">number phone</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="text" class="validate" name="pos">
			          <label for="password">kode pos</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" class="validate" name="email">
			          <label for="email">Email</label>
			        </div>
			      </div>

		          <div class="row">
		            <div class="col l12 m12 s12">
		              <button type="submit" class="btn blue-grey input-field right waves-effect effect-light">
		              Send Message</button>

		              <button type="reset" style="margin-right: 10px;" class="btn red input-field right waves-effect effect-light">
		              Clear Message</button>
		            </div>
		          </div>
		      	</form>

		    </div><!-- end card -->  

		</div><!-- end row -->
	</div>

	<div class="col s5 pull-s7">
		 <div class="card-panel" style="background-color: white !important; padding: 10px !important; overflow: hidden !important ; height:700px">
		<div class="container">
		<div class="row">
						<table class="striped centered">
							
							<div class="row">
								<div class="col-sm-6 center">
									<img id="input-file-to-destroy" src="motor/img/<?php echo $foto; ?>" height="175" width="200" style="margin-top:10px;">
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

						</table><br><br><br><br>
					</div><!-- end col  -->
					</div>
		</div>
	</div>

</div>


<?php 
	include"tengah.php"
?>

	<footer class="page-footer" style="background-color: #263238 !important;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">CV.kredit online</h5>
                <p class="grey-text text-lighten-4" style="font-family: arial;">
                	Address:<br>
        					Bandung-Jawa Barat-Indonesia ...... <br>
        					Phone Numbers: <br>
        					+085320598046 - Central Office<br>

        					+085320598046 - Fax<br>

        					Email Address:<br>
        					fendicilau@gmail.com.com
                </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <tr>
                  <td><a class="grey-text text-lighten-3" href="https://www.facebook.com"><img src="img/icons/facebook-icon.png"></a></td>
                  <td><a class="grey-text text-lighten-3" href="https://www.instagram.com"><img src="img/icons/instagram-icon.png"></a></td>
                  <td><a class="grey-text text-lighten-3" href="https://twitter.com/"><img src="img/icons/twitter-icon.png"></a></td>
                  <td><a class="grey-text text-lighten-3" href="https://www.google.com"><img src="img/icons/google-icon.png"></a></td>
                </tr><br><br>

				<div class="row">
					<form action="">
		                <div class="row">
					        <div class="input-field col s12 grey-text text-lighten-3">
					          <input id="email" type="email" class="validate">
					          <label for="email">Email</label>
					        </div>
					    </div>

					    <div class="row">
					        <div class="input-field col s12 grey-text text-lighten-3">
					          <input id="password" type="password" class="validate">
					          <label for="password">Password</label>
					        </div>
					    </div>

					    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
						    <i class="material-icons right">send</i>
						</button>
					</form>
				</div>

              </div>
            </div>
          </div>
          <div class="footer-copyright"  style="background-color: #37474f;">
            <div class="container">
            © 2017 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">My profile</a>
            </div>
          </div>
        </footer>

  <script>
  	$(".button-collapse").sideNav();

  	$('.materialboxed').materialbox();

  	var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
});
	</script>
</body>
</html>