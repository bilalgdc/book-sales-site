<?php
      $page_title="ADRES İŞLEMLERİ";
      $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
      $page_name="accountupdate";
    include '../hf/header.php';
    if($userr["Status"]==1 || $userr["Active"]==1 || $userr["Customer"]==1){  
?>
<div class="container-fluid py-4">
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <!--
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 ">
          <h6 class="text-white  text-capitalize ps-3" style="text-align:center" >Düzenle</h6>
        </div>
        -->
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">








<?php

if (isset($_GET["id"])) {
    $musteriid=$_GET["id"];
  

    $adres=$dbconnect->prepare("select * from adress where musteriid=? ");
    $adres->execute([$musteriid]);
    $adrescount=$adres->rowCount();
    $adres=$adres->fetchall(PDO::FETCH_ASSOC);
    if ($adrescount>0) {
?>









<div class="row">
  <div class="col-75">
    <div class="container">

    <form role="form" action="<?php echo $stlink; ?>/transactions/adress-edit.php"  method="post" >
        <div class="row">
          <div class="col-50">
            <h3> Adres</h3>
            <?php
            foreach ($adres as $key ) {
            ?>


            <input type="hidden" name="adresid" value="<?php echo $key["id"] ?>">
            <input type="hidden" name="mustid" value="<?php echo $musteriid ?>">
            <label for="sehir"><i class="fa fa-institution"></i> Şehir</label>
            <input type="text" id="sehir" name="sehir"  value="<?php echo $key["il"]  ?>" >
            <label for="ilce"><i class="fa fa-institution"></i> İlçe</label>
            <input type="text" id="ilce" name="ilce" value="<?php echo $key["ilce"]    ?>" >

            <label for="posta"><i class="fa fa-institution"></i>Posta Kodu</label>
            <input type="text" id="posta" name="posta" value="<?php echo $key["postaKodu"]    ?>">

            <label for="adres"><i class="fa fa-institution"></i> Adres</label>
            <input type="text" id="adres" name="adres"  value="<?php echo $key["acikAdres"]    ?>">
            <div class="text-center">
                    <button type="submit" class="btn btn-secondary w-100 my-4 mb-2">Adresi Güncelle</button>
             </div>
             <div class="text-center">
                    <a href="accountupdate.php" class="btn btn-secondary w-100 my-4 mb-2">Geri</a>
                </div>




            <?php
            }
            ?>
            </div>
          </div>
    </form>
</div>
</div>
</div>





<?php
}else
{
    
    /*  adres eklicek*/
    
?>


<div class="row">
  <div class="col-75">
    <div class="container">
        
      <form role="form" action="<?php echo $stlink; ?>/transactions/adress-add.php"  method="post" >
        <div class="row">
          <div class="col-50">
          <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">


            <h3> Adres</h3>
            <label for="sehir"><i class="fa fa-institution"></i> Şehir</label>
            <input type="text" id="sehir" name="sehir" >
            <label for="ilce"><i class="fa fa-institution"></i> İlçe</label>
            <input type="text" id="ilce" name="ilce" >
            <label for="posta"><i class="fa fa-institution"></i>Posta Kodu</label>
            <input type="text" id="posta"name="posta" >

            <label for="adres"><i class="fa fa-address-card-o"></i> Adres</label>
            <input type="text" id="adres" name="adres" >

              
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Adres Ekle</button>
             </div>



          </div>
        </div>

          
      </form>
</div>
</div>
</div>














<?php
}
?>

</div>
</div>
</div>
</div>
</div>
</div>
<?php
}else {
    header("location:".$stlik."/pages/accountupdate.php");
    die();
}
?>








































<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  die();
}
?>