<?php 
 $batas = 8;
  $halaman = @$_GET ['halaman'];
  if (empty($halaman)) {
    $posisi = 0;
    $halaman = 1;
  }else{
    $posisi = ($halaman-1)*$batas;
  }

	include "koneksi/konek.php";
if (isset($_GET['cari'])) {
    $q = $_GET['s'];
    $tampil = "SELECT * FROM motor WHERE id_motor LIKE '%$q%' OR nama_motor LIKE '%q%' OR merek_motor LIKE '%$q%' OR warna_motor LIKE '%$q%' OR harga LIKE '%$q%' LIMIT $posisi, $batas";
}else{
    $tampil = "SELECT * FROM motor ORDER BY nama_motor LIMIT $posisi, $batas";
  }

	$hasil = mysqli_query($konek,$tampil);

  $jlmhasil = mysqli_num_rows($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>shop</title>

	<link rel="stylesheet" href="css/iconmaterial.css">

  	<link rel="stylesheet" href="css/materialize.min.css">

  	<script src="js/jquery-3.1.0.min.js"></script>

  	<script src="js/materialize.min.js"></script>

</head>
	<style>
    h3 ,h2{color: #4caf50 !important;}
	</style>
<body>
 <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Ifen12-Motor</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.html">home</a></li>
        <li><a href="#">shop</a></li>
        <li><a href="#"><i class="material-icons right">perm_identity</i>Login admin</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="sass.html"><i class="material-icons left">perm_identity</i>Login admin</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


      <nav class="container">
        <div class="nav-wrapper" style="padding-left: 20px;">
            <form action="shop.php" method="GET">
              <div center class="input-field">
                <input id="search" type="text" placeholder="Search..." name="s" style="margin-left: 20px;">
                <label for="search"><i class="material-icons">search</i></label>
              </div>
              <input class="" type="hidden" name="cari">
            </form>
        </div>
      </nav>
  
<div class="row" style="margin-top: 50px;">
  	<div class="container">
  		<div class="row">
						<?php 
							if($jlmhasil < 1){
								echo"<tr>";
								echo "<td colspan='5' style='text-align: center'> error 404 </td>";
								echo"</tr>";
							}else{
								//penomoran
								$id_motor = $posisi + 1;
								//tampil nama, email dan pesan
							while( $data=mysqli_fetch_array($hasil)){

                  $foto = $data['foto'];

                  if ($foto == NULL){
                    $foto = "suzuki1.png";
                  }
						?>
	  		<div class="col l3 m6 s12 ">
				    <div class="card lighten-4">
				        <div class="card-image waves-effect waves-block waves-light">
				            <img class="activator gambar" src="motor/img/<?php echo $foto; ?>" height="175" width="200">                
				        </div>

				        <div class="card-content activator">               
				        	<i class="material-icons">visibility</i><p>selengkapnya soal harga</p>
				        </div>

				     	<div class="card-reveal">
				   			<span class="card-title grey-text text-darken-4"><?php echo "$data[nama_motor]"; ?><i class="material-icons right">close</i></span>
					    <?php

								echo "Merek : $data[merek_motor] <br>";
								echo "Warna : $data[warna_motor] <br>" ;
							 	echo "Harga : $data[harga] <br>" ;
              ?>  
                <hr>
              <?php  
                echo "tentang motor :<br> <p>$data[spek_motor]</p>";
              ?>
                
              <?php

						  ?>
				   		</div>

				   		<div class="card-action">
				      		<a <?php echo "a href='frombeli.php?id_motor=$data[id_motor]' " ?> > 
                    <button class="btn waves-effect waves-light blue-grey">
                      <i class="material-icons">
                        shopping_cart
                      </i>
                    </button>
                  </a>
				   		</div>

					</div>
	  		</div><!-- end col l4 -->
	  					<?php
	  							$id_motor++;
								}
							}
						?>
	  	</div><!-- end row -->
      <?php
        $tampil2 = "SELECT * FROM motor";

        $hasil2 = mysqli_query($konek, $tampil2);
        $jmldata = mysqli_num_rows($hasil2);
        $jmlhalaman = ceil($jmldata / $batas);
    ?>
    
    <div class="row">
            <ul class="pagination" style="padding: 10px;">
              
              <li class="disabled">
                  <a href="#!">
                    <i class="material-icons">chevron_left</i>
                  </a>
              </li>
                  <?php      
                      for ($i=1; $i <= $jmlhalaman; $i++) {
                  ?>               
                  <?php   
                      if ($i != $halaman) {
                  ?>
              <li class="waves-effect">
                    <?php echo "<a href =$_SERVER[PHP_SELF]?halaman=$i> $i </a>" ?>
              </li> 
                  <?php      
                      }else{
                  ?>
                            
              <li class="active" style="padding: 6px;">
                    <?php echo "<b> $i </b>" ?></a> 
              </li>
                  <?php
                      } 
                  }
                  ?>
              <li class="disabled">
                  <a href="#!">
                    <i class="material-icons">chevron_right</i>
                  </a>
              </li> 
            </ul>
          </div><!-- and class row -->
  	</div><!-- end coutaine -->
</div><!-- end row -->

<footer class="page-footer" style="background-color: #263238 !important;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">CV.kredit online</h5>
                <p class="grey-text text-lighten-4" style="font-family: arial;">
                	Address:<br>
					Bandung-Jawa Barat-Indonesia ...... <br>
					Phone Numbers: <br>
					+440 875369208 - Central Office<br>

					+440 353363114 - Fax<br>

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

	<script>
  	$(".button-collapse").sideNav();
  	$('.slider').slider();
  	$('.materialboxed').materialbox();
  </script> 
</body>
</html>     	  