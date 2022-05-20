<?php
    $page_title="SATIN ALDIKLARIM";
    $page_name="bought";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/boughtlist.css" />');
    include '../hf/header.php';
    if ($userr["Customer"]==1) {


    if (isset($_GET["list"])) {
        $list   =   $_GET["list"];
        if ($list=="today") {
            $mysales    =    $dbconnect->prepare("select * from sales  where satistarihi > date_sub(now(), interval 1 day)  and musteriid=? order by satistarihi desc ");
        }elseif ($list=="first") {
            $mysales    =    $dbconnect->prepare("select * from sales where musteriid=? order by satistarihi asc ");
        }elseif ($list=="last") {
            $mysales    =    $dbconnect->prepare("select * from sales where musteriid=? order by satistarihi desc ");
        }elseif ($list=="last3days") {
            $mysales    =    $dbconnect->prepare("select * from sales  where satistarihi > date_sub(now(), interval 2 day)  and musteriid=? order by satistarihi desc ");
        }elseif ($list=="thismonth") {
            $mysales    =    $dbconnect->prepare("select * from sales  where satistarihi > date_sub(now(), interval 1 month)  and musteriid=? order by satistarihi desc ");
        }elseif ($list=="thisyear") {
            $mysales    =    $dbconnect->prepare("select * from sales  where satistarihi > date_sub(now(), interval 1 year)  and musteriid=? order by satistarihi desc ");
        }else {
            $mysales    =    $dbconnect->prepare("select * from sales where musteriid=? order by satistarihi desc ");
        }
    }else {
        $mysales    =    $dbconnect->prepare("select * from sales where musteriid=? order by satistarihi desc");
    }
    
    
    $mysales->execute([$userr["id"]]);
    $mysalesc   =   $mysales->rowCount(); 
    $mysales    =    $mysales->fetchall(PDO::FETCH_ASSOC);       
    
?>

<div class="list">
<details>
<summary>Listeleme</summary>
<a href="<?php echo $stlink ?>/pages/bought2.php?list=first"><button>Önce İlk Sipariş</button></a>
<a href="<?php echo $stlink ?>/pages/bought2.php?list=last"><button>Önce Son Sipariş</button></a>
<a href="<?php echo $stlink ?>/pages/bought2.php?list=today"><button>Bugün Alınanlar</button></a>
<a href="<?php echo $stlink ?>/pages/bought2.php?list=last3days"><button>Son 3 Gün</button></a>
<a href="<?php echo $stlink ?>/pages/bought2.php?list=thismonth"><button>Bu Ay</button></a>
<a href="<?php echo $stlink ?>/pages/bought2.php?list=thisyear"><button>Bu Yıl</button></a>
</details>
</div>
<div class="shopping-cart">
            
            <div class="title">
            Satın Aldıklarım
 </div>



    

<?php
if ($mysalesc>0) {
    foreach ($mysales as $mysaleskey) {

?>

  <!-- Product #1 -->
  <div class="item">

                <div class="avatar-group mt-3">
                <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                    <img  alt="Image placeholder" src="../assets/img/book.jpg">
                    </a>
                </div>

                    <div class="a" >
                            <div class="satisid">
                            <span><?php echo "Sipariş No ".$mysaleskey["salesid"] ?></span>
                            </div>

                            <div class="satistarih">
                            <span><?php echo $mysaleskey["satistarihi"] ?></span>
                            </div>
                    </div>

                    <?php
                    if ($mysaleskey["satisDurumu"]==0) {                
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu </label><br>
                        <span style="color:yellow;" id="durum" >&nbsp<?php echo "Onaylanmayı Bekliyor."  ?></span>
                        </div>
                    <?php
                    }elseif ($mysaleskey["satisDurumu"]==1) {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu </label><br>
                        <span style="color:green;" id="durum" >&nbsp<?php echo "Onayladı"  ?></span>
                        </div>
                    <?php
                    }elseif ($mysaleskey["satisDurumu"]==2) {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu </label><br>
                        <span style="color:yellow;" id="durum" >&nbsp<?php echo "Sipariş Hazırlanıyor"  ?></span>
                        </div>
                    <?php
                    }elseif ($mysaleskey["satisDurumu"]==3) {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu </label><br>
                        <span style="color:yellow;" id="durum" >&nbsp<?php echo "Siparişiniz Kargoda"  ?></span>
                        </div>
                    <?php
                    }elseif ($mysaleskey["satisDurumu"]==4) {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu</label><br>
                        <span style="color:Green;" id="durum" >&nbsp<?php echo "Tamamlandı"  ?></span>
                        </div>
                    <?php
                    }elseif ($mysaleskey["satisDurumu"]==5) {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu</label><br>
                        <span style="color:purple;" id="durum" >&nbsp<?php echo " İade/Degişim"  ?></span>
                        </div>
                    <?php
                    }elseif ($mysaleskey["satisDurumu"]==6) {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu</label><br>
                        <span style="color:red;" id="durum" >&nbsp<?php echo "Siparişiniz Tamamlanmadı!"  ?></span>
                        </div>
                    <?php
                    }else {
                    ?>
                        <div class="satisdurum">
                        <label for="durum">Satış Durumu</label><br>
                        <span style="color:red;" id="durum" >&nbsp<?php echo "Siparişiniz ile ilgili bir sorun oluştu"  ?></span>
                        </div>
                    <?php   
                    }
                    ?>


                                            
                    <div class="price">
                    <label for="price">Sipariş Tutarı</label><br>
                    <span id="price" >&nbsp<?php echo $mysaleskey["toplamfiyat"];  ?>&nbsp₺</span>
                    </div>

                    <div class="buton">
                            <a href="boughtdetail.php?satisid=<?php echo $mysaleskey["salesid"] ?>&satistarihi=<?php echo $mysaleskey["satistarihi"]?>"><button class="albutton">Detay</button></a>
                    </div>

    </div>  
<?php
}
?>
<?php
}else
{
?>
 <div class="item">
   Satın Aldığınız Bir Kitap Yok
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