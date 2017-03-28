<?php 

$id_motor = $_GET['id_motor'];

include "../koneksi/konek.php";

//query menampilkan data
$tampil = "SELECT * FROM motor WHERE id_motor = '$id_motor' ";
$hasil = mysqli_query($konek,$tampil);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];

  if ($foto == NULL){
    $foto = "honda1.jpg";
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit</title>

	<link rel="stylesheet" href="../css/iconmaterial.css">
  	<link rel="stylesheet" href="../css/materialize.css">
  	<link rel="stylesheet" href="../css/dropify.min.css">

  	<script src="../js/jquery-3.1.0.min.js"></script>
  	<script src="../js/materialize.js"></script>
  	<script src="../js/dropify.min.js"></script>

</head>
  <style>
    
  </style>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Ifen12-Motor</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons left">perm_identity</i>Login admin</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="sass.html"><i class="material-icons left">perm_identity</i>Login admin</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">

      <br><br>
      <h1 class="header center orange-text">Welcome !!!</h1>
      <div class="row center">
        <h5 class="header col s12 light">form input motor</h5>
      </div>

    </div>
  </div>

<div class="row">

  <div class="container">

    <div class="card-panel" style="background-color: white !important; padding: 10px !important; overflow: hidden !important ;">
        <div col class="l12 m12 s12">
          <h4>Menginputkan Motor ke Server</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      <form class="col s12" method="POST" enctype="multipart/form-data" action="prosesupdate.php">

        <input type="hidden" name="id_motor" value="<?php echo $data['id_motor']; ?>">

        <input id="input-file-to-destroy" class="dropify" data-default-file="img/<?php echo $foto; ?>" type="file" name="fprofil">

        <input type="hidden" value="<?php echo $data['foto']; ?>" name="fotolama">

          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Merek" id="merek" type="text" class="validate" name="merek" value="<?php echo $data['merek_motor']; ?>">
              <label for="merek">Merek Motor</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Nama motor" id="name" type="text" class="validate" name="nama" value="<?php echo $data['nama_motor']; ?>">
              <label for="name">Name Motor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textarea1" placeholder="Spesifikasi Motor" class="materialize-textarea" name="spek" value="<?php echo $data['spek_motor']; ?>"></textarea>
              <label for="textarea1">Spedifikasi</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="warna Motor" id="warna" type="text" class="validate" name="warna" value="<?php echo $data['warna_motor']; ?>">
              <label for="warna">Warna Motor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Rp.?" id="haraga" type="text" class="validate" name="harga" value="<?php echo $data['harga']; ?>">
              <label for="haraga">Harga</label>
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

  </div><!-- end container -->

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
                  <td><a class="grey-text text-lighten-3" href="https://www.facebook.com"><img src="../img/icons/facebook-icon.png"></a></td>
                  <td><a class="grey-text text-lighten-3" href="https://www.instagram.com"><img src="../img/icons/instagram-icon.png"></a></td>
                  <td><a class="grey-text text-lighten-3" href="https://twitter.com/"><img src="../img/icons/twitter-icon.png"></a></td>
                  <td><a class="grey-text text-lighten-3" href="https://www.google.com"><img src="../img/icons/google-icon.png"></a></td>
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
    $('.slider').slider();


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
</body>
</html>