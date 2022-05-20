<?php
    $page_title="SATIN ALDIKLARIMIN DETAYI ";
    $page_name="bought";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/boughtdetail.css" />');
    include '../hf/header.php';
    if ($userr["Customer"]==1) {




    
?>
<div class="shopping-cart">
            
                      
<?php
if (isset($_GET["satisid"]) && isset($_GET["satistarihi"]) ) {
    $satisid        =   $_GET["satisid"];
    $satistarihi    =   $_GET["satistarihi"];

    $mysales    =    $dbconnect->prepare("select * from sales where salesid=?");
    $mysales->execute([$satisid]);
    $mysalesc   =   $mysales->rowCount(); 
    $mysales    =    $mysales->fetch(PDO::FETCH_ASSOC);  
?>
    <div class="title"> 
            <h6 style="float:left;"><?php echo "Satış Tarihi &nbsp".$satistarihi;  ?></h6>
            <h6 style="float:right;"><?php echo "Satış No &nbsp".$satisid ?></h6>
        </div>        
            <h6 style="color:darkgrey;" id="kargoname" ><label for="kargoname">Kargo Şirketi :&nbsp</label><?php echo $mysales["kargo"]  ?>&nbsp&nbsp</h6> 
            <h6 style="color:darkgrey;" id="kargoname" ><label for="kargoname">Kargo Takip No :</label><?php echo $mysales["kargoNo"]  ?></h6>
<?php
    $sd     =   $dbconnect->prepare("select kitapid,kitapadet from salesdetail where salesid=?");
    $sd->execute([$satisid]);
    $sd     =   $sd->fetchall(PDO::FETCH_ASSOC);
    $i=1;
    foreach ($sd as $sdkey) {
        $book   =   $dbconnect->prepare("select * from books where id=?");
        $book->execute([$sdkey["kitapid"]]);
        $book   =   $book->fetchall(PDO::FETCH_ASSOC);

        foreach ($book as $bookkey) {   
          
    $kitapTuru=(str_replace("|","",$bookkey["kitapTuru"]));
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
 <a href="<?php echo $stlink."/pages/bookdetail.php?id=".$bookkey["id"]; ?>">

<div class="item">


<div class="urunno">
      <span class="urunnos"><?php echo $i; ?>
        </span> 
    </div>





    <div class="image">
      <img src="<?php echo $stlink."/images/".$bookkey["kitapResim"] ?>" alt="" />
    </div>
 
    <div class="description">
      <h6><?php echo $bookkey["kitapAdi"]  ?></h6>
      <h6><?php echo $b ?></h6>
    </div>
 
    <div class="quantity">
      <h6 style="color:darkgrey;" >Sipariş Adeti :&nbsp<?php echo $sdkey["kitapadet"]  ?></h6>
    </div>

    <div class="ktpfiyat">
    <span >Kitap Fiyatı:&nbsp<?php echo $bookkey["Fiyat"]  ?>&nbsp₺</span>
    </div>
  </div>

</a>  <!--      -->

<?php
}
$i+=1;
}
?>
<div class="itemend">
    <a href="bought2.php"><button type="submit" class="albutton">Geri</button></a>
  </div>
<?php
}else
{
    header("location:".$stlink."/pages/bought2.php");
    exit;
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
