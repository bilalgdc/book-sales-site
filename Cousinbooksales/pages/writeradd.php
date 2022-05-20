<?php
    $page_title="YAZAR EKLE";
    $page_name="writers";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {

?>
<?php


?>
   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <!--
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center" >Yazar Ekle</h6>
              </div>
                 -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->

<div class="row">
  <div class="col-75">
    <div class="container">
        
<form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/writers-add.php" method="post">



            <h3> Yazar Ekle</h3>

            <label for="yazarAdi"><i class="fa fa-pen-nib"></i> Yazar Adı</label>
            <input type="text" id="yazarAdi" name="yazarAdi" >

            <label for="yazarSoyadi"><i class="fa fa-pen-nib"></i> Yazar Soyadı</label>
            <input type="text" id="yazarSoyadi" name="yazarSoyadi" >

            <label for="yazarBilgisi"><i class="fa fa-pen-nib"></i> Yazar Bilgisi</label>
            <input type="text" id="yazarBilgisi" name="yazarBilgisi" >

            <label for="yazarEmail"><i class="fa fa-pen-nib"></i> Yazar İletişim Email</label>
            <input type="email" id="yazarEmail" name="yazarEmail" >

            <label for="yazaril"><i class="fa fa-pen-nib"></i> Yazar İl</label>
            <input type="text" id="yazaril" name="yazaril" >

            <label for="yazardTarih"><i class="fa fa-pen-nib"></i> Yazar Doğum Tarih</label>
            <input type="text" id="yazardTarih" name="yazardTarih" >

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Kaydet</button>
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
   

