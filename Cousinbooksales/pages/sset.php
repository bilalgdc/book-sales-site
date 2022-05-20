<?php
       $page_title="Tüm Satış İşlemleri";
       $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/sset.css" />');
       $page_name="satislar";
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {

?>
<?php
if (isset($_GET["sid"])) {
    if ($_GET["sid"]!="") {
        $cmsid =    $_GET["sid"];

        $bid   =   $dbconnect->prepare("select * from salesdetail where salesid=?");
        $bid->execute([$cmsid]);
        $bid   =   $bid->fetchall(PDO::FETCH_ASSOC); 
?>
<div class="salestablo">
<table style="width:100%; " class="table table-light text-center table-condensed">
  <thead>
    <tr>
    <th scope="col">Sipariş ID</th>
    <th scope="col">Müşteri ID</th>
    <th scope="col">Sipariş Tarihi</th>
    <th scope="col">Sipariş Tutarı</th>
    <th scope="col">Sipariş Durumu</th>
    <th scope="col">Kargo Şirketi</th>
    <th scope="col">Kargo No</th>
    </tr>
  </thead>
  <form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/s-edit.php" method="post">
<input type="hidden" name="sid" value="<?php echo $cmsid ?>">
<?php

 $cms   =   $dbconnect->prepare("select * from sales where salesid=?");
 $cms->execute([$cmsid]);
 $cms   =   $cms->fetchall(PDO::FETCH_ASSOC);
 foreach ($cms as $cmskey) {
?>

  <tbody>
    <tr>
    <th id="row" scope="row"><?php echo $cmskey["salesid"] ?></th>
      <th><?php echo $cmskey["musteriid"] ?></th>
      <td><?php echo $cmskey["satistarihi"] ?></td>
      <td><?php echo $cmskey["toplamfiyat"] ?>&nbsp₺</td>
      <td><?php echo $cmskey["satisDurumu"] ?></td>
      <td><?php echo $cmskey["kargo"] ?></td>
      <td><?php echo $cmskey["kargoNo"] ?></td>
    </tr>
  </tbody>



<?php
}
?>
</table>
 </div>

 
 <div style="float:left; margin-left:5%;">
        <label for="satisdurumu">Satış Durumu</label><br>
        <div style="float:left;" class="input-group input-group-outline mb-3">
                      <Select id="satisdurumu" name="satisdurumu" style="background-color:lightblue; color:black; "class="w3-input">
                      <option value="<?php echo $cmskey["satisDurumu"];  ?>"> <?php echo $cmskey["satisDurumu"];  ?></option>
                      <option value="0">(0)Onaylanmayı Bekliyor</option>
                      <option value="1">(1)Onayladı</option>
                      <option value="2">(2)Sipariş Hazırlanıyor</option>
                      <option value="3">(3)Sipariş Kargoda</option>
                      <option value="4">(4)Tamamlandı</option>
                      <option value="5">(5)İade/Degişim</option>
                      <option value="6">(6)Sipariş Tamamlanmadı!</option>
                      <option value="7">(7)Sipariş ile ilgili bir sorun oluştu</option>
                      </Select>
        </div>
        </div>  


<div class="asd">
<div style="float:left; margin-left:1%;">
        <label  for="kargos">Kargo Şirketi:&nbsp</label><br>
        <input  type="text" id="kargos" name="kargos" class="w3-input"  value="<?php echo $cmskey["kargo"];  ?>" ><br>
</div>
<div style="float:left; margin-left:1%;">
        <label  for="kargono">Kargo No:&nbsp</label><br>
        <input type="text" id="kargono" name="kargono"class=" w3-input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $cmskey["kargoNo"];  ?>" ><br>
</div>
   
        <div class="gr">
        <a href="dashboard.php" class="btn bg-gradient-primary  my-4 mb-2">Geri</a>
        </div>

        <div class="gnc">
        <button type="submit"  class="btn bg-gradient-primary my-4 mb-2 ">Satışı Güncelle</button>
        </div>



 </form>
</div>

           

    <div class="container">
<?php 
$kno=1;
    foreach ($bid as $bid) {
        $book   =   $dbconnect->prepare("select * from books where id=?");
        $book->execute([$bid["kitapid"]]);
        $book   =   $book->fetchall(PDO::FETCH_ASSOC);
  
        foreach ($book as $bookkey) {
    
?>


  <div class="card">
    <div style="background-image:url(<?php echo $stlink ?>/images/<?php echo $bookkey["kitapResim"] ?>);" class="box" >
    <!-- <img src="<?php echo $stlink ?>/images/<?php echo $bookkey["kitapResim"] ?>"alt=""> -->
      <div class="content">  
        <p style="margin-left:30%;">Kitap:&nbsp<?php echo $kno; ?></p>
        <h6><?php echo $bookkey["kitapAdi"] ?></h6>
        <p>Adet:&nbsp<?php echo  $bid["kitapadet"] ?></p>
        <p><?php echo $bookkey["Fiyat"] ?>&nbsp₺</p>
        <a href="#">Kitap Detayı</a>
      </div>
    </div>
  </div>


<?php
}$kno+=1;
}// foreach
?>
<!-- --------------------  döngü sonu ---- -->
</div>




























<?php
    }else {
        header("location:".$stlink."/pages/sales.php");
        exit();
    }
    
    
}else
{
    header("location:".$stlink."/pages/sales.php");
    exit();
}


































































?>
<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  exit();
}
?>