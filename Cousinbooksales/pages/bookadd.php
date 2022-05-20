<?php
    $page_title="KİTAP EKLE";
    $page_name="books";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {
?>
<?php
$yayinevi    = $dbconnect->prepare("select * from publisher order by yAdi asc ");
$yayinevi->execute();
$yayinevi =$yayinevi->fetchall(PDO::FETCH_ASSOC);
/*---------------------------*/
$yazarlar    = $dbconnect->prepare("select * from writers  order by yazarAdi asc ");
$yazarlar->execute();
$yazarlar =$yazarlar->fetchall(PDO::FETCH_ASSOC);

$booktype    = $dbconnect->prepare("select * from booktype");
$booktype->execute();
$booktype =$booktype->fetchall(PDO::FETCH_ASSOC);

?>
   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <!--
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Kitap Ekle</h6>
              </div>
                -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->


      <div class="row">
  <div class="col-75">
    <div class="container">
        
    <form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/books-add.php"  method="post" enctype="multipart/form-data">


            <h3> Kitap Ekle</h3>
            <label for="kitapAdi"><i class="fa fa-book"></i> Kitap Adı</label>
            <input type="text" id="kitapAdi" name="kitapAdi" >
<!--
            <label for="kitapTuru"><i class="fa fa-book"></i> Kitap Türü</label>
            <input type="text" id="kitapTuru" name="kitapTuru" >
            -->

            <label for="kitapTuru"><i class="fa fa-book"></i> Kitap Türü</label><br>
            <?php
            foreach ($booktype as $key) {
            ?>

           <!-- <input  type="checkbox" name="kitapTuru[]" value="<?php echo $key["id"]; ?>"/> <?php echo $key["type"]; ?><br>-->
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="kitapTuru[]" value="<?php echo $key["id"]; ?>">
            <label class="form-check-label" for="inlineCheckbox2"><?php echo $key["type"]; ?></label>
            </div>

            <?php
            }
            ?>


<br>
            <label for="kitapKonusu"><i class="fa fa-book"></i> Kitap Konusu</label>
            <input type="text" id="kitapKonusu" name="kitapKonusu" >

            <label for="kitapFiyat"><i class="fa fa-book"></i> Kitap Fiyatı</label>
            <input type="text" id="kitapFiyat" name="kitapFiyat" >

            <label for="yayinevi"><i class="fa fa-book"></i> Yayın Evi</label>
            <Select style="background-color:lightblue; color:black; " id="yayinevi" name="yayinevi" class="form-control">
            <?php   foreach ($yayinevi as $yayinevikey) {  ?>
            <option value="<?php echo $yayinevikey["yid"];  ?>"><?php echo $yayinevikey["yAdi"];  ?></option>
            <?php } ?>
            </Select>

            <label for="yazar"><i class="fa fa-book"></i> Yazar</label>
            <Select style="background-color:lightblue; color:black; " id="yazar" name="yazar" class="form-control" value ="">
            <?php   foreach ($yazarlar as $yazarlarkey) {  ?>
            <option value="<?php echo $yazarlarkey["id"];  ?>"><?php echo $yazarlarkey["yazarAdi"]." ".$yazarlarkey["yazarSoyadi"]  ?></option>
            <?php } ?>
            </Select>

            <label for="kitapbTarih"><i class="fa fa-book"></i> Kitap Basım Tarihi</label>          
            <input  type="text" id="kitapbTarih"name="kitapbTarih" >

            <label for="kitapResim"><i class="fa fa-file"></i> Kitap Resim</label>
            <input type="file" id="kitapResim" name="kitapResim" value="">

            <br><br><div class="form-check form-switch d-flex align-items-center mb-3">
                    <input type="checkbox"  class="form-check-input" id="aktif" name="aktif"  <?php echo 'checked'?>>
                    <label class="form-check-label mb-0 ms-2" for="aktif">Satışa Açık</label>
                  </div>

              
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Kaydet</button>
             </div>
             <div class="text-center">
                    <a href="books.php" class="btn bg-gradient-primary w-100 my-4 mb-2">Geri</a>
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
   

