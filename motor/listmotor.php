<?php 
 $batas = 5;
  $halaman = @$_GET ['halaman'];
  if (empty($halaman)) {
    $posisi = 0;
    $halaman = 1;
  }else{
    $posisi = ($halaman-1)*$batas;
  }

	include "../koneksi/konek.php";

if (isset($_GET['cari'])) {
    $q = $_GET['s'];
    $tampil = "SELECT * FROM motor WHERE id_motor LIKE '%$q%' OR nama_motor LIKE '%q%' OR merek_motor LIKE '%$q%' OR spek_motor LIKE '%$q%' OR warna_motor LIKE '%$q%' OR harga LIKE '%$q%' LIMIT $posisi, $batas";
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
	<title>list motor</title>
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

<div class="row" style="padding: 10px;color: #fff">
  <table id="data-table-simple" class="responsive-table centered" cellspacing="0">
  <thead>
    <tr>
      <th>tambah inputan</th>
      <th>logout admin</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td><a href="inputmotor.php"><i class="small material-icons">add</i></a></td>
      <td><a href="../index.html"><i class="small material-icons">settings_power</i></a></td>
    </tr>
  </tbody>
  </table>
</div>

    <nav class="container">
        <div class="nav-wrapper" style="padding-left: 20px;">
            <form action="listmotor.php" method="GET">
              <div center class="input-field">
                <input id="search" type="text" placeholder="Search..." name="s" style="margin-left: 20px;">
                <label for="search"><i class="material-icons">search</i></label>
              </div>
              <input class="" type="hidden" name="cari">
            </form>
        </div>
      </nav>

<div class="container">
	<table id="data-table-simple" class="responsive-table bordered centered striped" cellspacing="0" style="background-color: #efebe9;overflow: hidden;">
          
          <thead>
              <tr>
              <th>No</th>
              <th>merek motor</th>
              <th>Nama motor</th>
              <th>warna</th>
              <th>harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
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
                  echo "<tr>";
                  echo "<td>$id_motor</td>";
                  echo "<td>$data[merek_motor] </td>";
                  echo "<td>$data[nama_motor] </td>";
                  //echo "<td>$data[spek_motor] </td>" ;
                  echo "<td>$data[warna_motor] </td>" ;
                  echo "<td>$data[harga] </td>" ;
              ?>
                <td>
                      <a class="waves-effect" style="padding: 15px;" <?php echo "<a href='delete.php?id_motor=$data[id_motor]'hapus </a>" ?> 
                      <i class="material-icons">delete</i></a>

                      <a class="waves-effect" style="padding: 15px;" <?php echo "<a href='formedit.php?id_motor=$data[id_motor]'edit </a>" ?>
                      <i class="material-icons">settings</i></a>

                      <a class="waves-effect" style="padding: 15px;" <?php echo "<a href='detail.php?id_motor=$data[id_motor]' detail</a>" ?>
                      <i class="material-icons">list</i></a>
                    </td>

              <?php
                  echo "</tr>";
                  $id_motor++;
                  }
                }
              ?>
          </tbody>
        </table>
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
    </div>
</body>
</html>