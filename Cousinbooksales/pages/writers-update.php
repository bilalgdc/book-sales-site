<?php
    $page_title="YAZAR GÜNCELLE";
    $page_name="writers";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {

?>



<?php

if (isset($_GET["id"])) {
   $id=$_GET["id"];
}
else {
    header("location:".$stlink."/pages/writers.php");
    exit;
}
$writers    = $dbconnect->prepare("select * from writers where id= ?");
$writers->execute([$id]);
$writers =$writers->fetch(PDO::FETCH_ASSOC);




/*
----------------------------
*/

?>


   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <!--
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Yazar Güncelle</h6>
              </div>
                -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->

<div class="row">
  <div class="col-75">
    <div class="container">

<form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/writers-edit.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>">

<h3> Yazar Güncelle</h3>

                <label for="yazarAdi"><i class="fa fa-pen-nib"></i> Yazar Adı</label>
                <input type="text" id="yazarAdi" name="yazarAdi" value="<?php echo $writers["yazarAdi"]; ?>" >

                <label for="yazarSoyadi"><i class="fa fa-pen-nib"></i> Yazar Soyadı</label>
                <input type="text" id="yazarSoyadi" name="yazarSoyadi" value="<?php echo $writers["yazarSoyadi"];  ?>" >

                <label for="yazarBilgisi"><i class="fa fa-pen-nib"></i> Yazar Bilgisi</label>
                <input type="text" id="yazarBilgisi" name="yazarBilgisi" value="<?php echo $writers["yazarBilgisi"];  ?>" >

                <label for="yazarEmail"><i class="fa fa-pen-nib"></i> Yazar İletişim Email</label>
                <input type="email" id="yazarEmail" name="yazarEmail" value="<?php echo $writers["yazarEmail"];  ?>">

                <label for="yazaril"><i class="fa fa-pen-nib"></i> Yazar İl</label>
                <input type="text" id="yazaril" name="yazaril" value="<?php echo $writers["yazaril"];  ?>">

                <label for="yazardTarih"><i class="fa fa-pen-nib"></i> Yazar Doğum Tarih</label>
                <input type="text" id="yazardTarih" name="yazardTarih" value="<?php echo $writers["yazardTarih"];  ?>">



                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Güncelle</button>
                  </div>

                  <div class="text-center">
                    <a href="writers.php" class="btn bg-gradient-primary w-100 my-4 mb-2">Geri</a>
                </div>
                  </form>


              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
 </div>
</div>




<!--             -----------------------------------------------------     -->
<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  exit();
}
?>
   

