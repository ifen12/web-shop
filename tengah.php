<?php 
 $batas = 4;
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

  <div class="row" style="margin-top: 50px;">
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
              ?>

              <?php
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
  </div>

<script>
</script>