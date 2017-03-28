<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>input motor</title>

	  <link rel="stylesheet" href="../css/iconmaterial.css">
  	<link rel="stylesheet" href="../css/materialize.css">

  	<script src="../js/jquery-3.1.0.min.js"></script>
  	<script src="../js/materialize.js"></script>

</head>
  <style>
    body{
      background: #263238;
    }
  </style>
<body>


<div class="row">

  <div class="container">

    <div class="card-panel" style="background-color: white !important; padding: 10px !important; overflow: hidden !important ;">
        <div col class="l12 m12 s12">
          <h4>Menginputkan Motor ke Server</h4>
        </div>
      <form class="col s12" method="POST" enctype="multipart/form-data" action="prosesinput.php">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Merek" id="merek" type="text" class="validate" name="merek">
              <label for="merek">Merek Motor</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Nama motor" id="name" type="text" class="validate" name="nama">
              <label for="name">Name Motor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textarea1" placeholder="Spesifikasi Motor" class="materialize-textarea" name="spek"></textarea>
              <label for="textarea1">Spesifikasi</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="warna Motor" id="warna" type="text" class="validate" name="warna">
              <label for="warna">Warna Motor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Rp.?" id="haraga" type="text" class="validate" name="harga">
              <label for="haraga">Harga</label>
            </div>
          </div>

          <div class="row">
            <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" multiple name="upfile">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload one or more files" name="upfile">
                </div>
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


</body>
</html>