<?php
    $page_title="YAYIN EVİ EKLE";
    $page_name="yayinevleri";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {

?>
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <!--
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Yayın Evi Ekle</h6>
              </div>
                -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->
<div class="row">
  <div class="col-75">
    <div class="container">
        

<form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/publisher-add.php" method="post">

                <h3> Yayın Evi Ekle</h3>

                <label for="yAdi"><i class="fa fa-pen-nib"></i> Yayın Evi Adı</label>
                <input type="text" id="yAdi" name="yAdi" >

                <label for="yAdres"><i class="fa fa-pen-nib"></i> Yayın Evi Adresi</label>
                <input type="text" id="yAdres" name="yAdres" >

                <label for="yTel"><i class="fa fa-pen-nib"></i> Yayın Evi Telefon</label>
                <input type="number" id="yTel" name="yTel" >

                <label for="yEmail"><i class="fa fa-pen-nib"></i> Yayın Evi Email</label>
                <input type="email" id="yEmail" name="yEmail" >
                

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Kaydet</button>
                  </div>

                  <div class="text-center">
                    <a href="publisher.php" class="btn bg-gradient-primary w-100 my-4 mb-2">Geri</a>
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
   

