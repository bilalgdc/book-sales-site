<?php
    $page_title="Alışveriş Sepeti";
    $page_name="basketlist";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/basketlist.css" />');
    include '../hf/header.php';
    if ($userr["Customer"]==1) {
    $basketlist   =   $dbconnect->prepare("select * from basket where musteriid=?");
    $basketlist->execute([$userr["id"]]);
    $basketlistC  =   $basketlist->rowCount();
    $basketlist   =   $basketlist->fetchall(PDO::FETCH_ASSOC);
?>

<div class="shopping-cart">
    <!-- Title -->
    <div class="title">
    ALIŞVERİŞ SEPETİM
    <a href="<?php  echo $stlink."/transactions/basketbook-del.php?musteriid=".$userr["id"]  ?>">Tümünü Temizle</a>
  </div>
    
<?php
if ($basketlistC>0) {
  $toplam=0;
  foreach ($basketlist as $key) {
    $kitaplist  = $dbconnect->prepare("select * from books where id=?");
    $kitaplist->execute([$key["kitapid"]]);
    $kitaplist  = $kitaplist->fetch(PDO::FETCH_ASSOC);


    $kitapTuru=(str_replace("|","",$kitaplist["kitapTuru"]));
  $ktpt = explode(',',$kitapTuru);
  $b="";
  foreach ($ktpt as $k) {
    $booktype = $dbconnect->prepare("select type from booktype where id=?");
    $booktype->execute([$k]);
    $booktype   = $booktype->fetchcolumn();
    $b.=$booktype;
    $b.=" ";
  }
    
?>


 
  <!-- Product #1 -->
  <div class="item">
    <div class="buttons">
    <a  href=" <?php echo $stlink."/transactions/basketbook-del.php?basketid=".$key["basketid"]?>">
      <span class="delete-btn">
        <i class="fas fa-times"></i> 
        </span> </a>
    </div>
    <div class="image">
      <img src="<?php echo $stlink."/images/".$kitaplist["kitapResim"] ?>" alt="" />
    </div>
 
    <div class="description">
      <h6><?php echo $kitaplist["kitapAdi"]  ?></h6>
      <h6><?php echo $b  ?></h6>
    </div>
 
    <div class="quantity">
      <a href="<?php echo $stlink."/transactions/basketamount.php?basketupid=".$key["basketid"]."&adet=".$key["kitapadet"] ?>">
      <button class="plus-btn" type="button" name="button">
      <i class="fas fa-plus-square"></i>
      </button>
      </a>
      <input type="text" name="adet" readonly="disable" value="<?php echo $key["kitapadet"] ?>">
      <a href="<?php echo $stlink."/transactions/basketamount.php?basketdownid=".$key["basketid"]."&adet=".$key["kitapadet"] ?>">
      <button class="minus-btn" type="button" name="button">
      <i class="fas fa-minus-square"></i>
      </button>
      </a>
    </div>
 <?php
 $kitapfiyat=($key["kitapadet"]*$kitaplist["Fiyat"]);
 ?>
    <div class="price">
    <h6 style="color:darkgrey;" >Fiyat :&nbsp<?php echo $kitapfiyat;  ?>&nbsp₺</h6>
    </div>
  </div>
  <?php
  $toplam+=$kitapfiyat;
  }  
  ?>

  <form role="form"  action="<?php echo $stlink; ?>/transactions/buy.php"  method="post" >
  <input type="hidden" name="total" value="<?php echo $toplam ?>">
  <input type="hidden" name="userid" value="<?php echo $userr["id"] ?>">
  <div class="itemend">
    <a href="buy.php"><button type="submit" class="albutton">Satın Al</button></a>
    <span class="totalprice">Toplam Fiyat&nbsp:&nbsp<?php echo $toplam ?>&nbsp₺</span>
  </div>

</form>


<?php
}else
{
?>
 <div class="item">
   Alışveriş Sepetiniz Boş
</div>

<?php
}
?>
</div>



















<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  exit();
}
?>