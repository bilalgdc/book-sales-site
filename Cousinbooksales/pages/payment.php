<?php
      $page_title="BAKİYE YÜKLE";
      $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
      $page_name="payment";
    include '../hf/header.php';
    if ($userr["Customer"]==1) {
?>
<?php
$adres=$dbconnect->prepare("select * from adress where musteriid=? ");
$adres->execute([$userr["id"]]);
$adrescount=$adres->rowCount();
$adres=$adres->fetchall(PDO::FETCH_ASSOC);
?>
<form role="form" action="<?php echo $stlink; ?>/transactions/pay.php"  method="post" >
<input type="hidden" name="id" value="<?php echo $userr["id"] ?>">
<?php
if ($adrescount>0) {
?>


<div class="row">
  <div class="col-75">
    <div class="container">
      

        <div class="row">
          <div class="col-50">
            <h3>Fatura Adresi</h3>
            <?php
            foreach ($adres as $key ) 
            {
            ?>
            <label for="fname"><i class="fa fa-user"></i> Ad Soyad</label>
            <input type="text" id="fname" name="firstname" Value="<?php  echo $userr["Name"]." ".$userr["Surname"] ?>">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" Value="<?php  echo $userr["Email"]?>" >
            <label for="city"><i class="fa fa-institution"></i> Şehir</label>
            <input type="text" id="city" name="city"Value="<?php  echo $key["il"]?>">

            <div class="row">
              <div class="col-50">
                <label for="state">İlçe</label>
                <input type="text" id="state" name="state" Value="<?php  echo $key["ilce"]?>">
              </div>
              <div class="col-50">
                <label for="zip">Posta Kodu</label>
                <input type="text" id="zip" name="zip" Value="<?php  echo $key["postaKodu"]?>">
              </div>
            </div>
            <label for="adr"><i class="fa fa-address-card-o"></i> Adres</label>
            <input type="text" id="adr" name="address" Value="<?php  echo $key["acikAdres"]?>">
          </div>
          <?php
            }
          ?>
<?php
}else
{
?>
<div class="row">
  <div class="col-75">
    <div class="container">

        <div class="row">
          <div class="col-50">
            <h3>Fatura Adresi</h3>
            <label for="fname"><i class="fa fa-user"></i> Ad Soyad</label>
            <input type="text" id="fname" name="firstname" Placeholder="Bilal Gidiciii">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email"  Placeholder="örnek@example.com" >
            <label for="city"><i class="fa fa-institution"></i> Şehir</label>
            <input type="text" id="city" name="city" Placeholder="İstanbul">
            <div class="row">
              <div class="col-50">
                <label for="state">İlçe</label>
                <input type="text" id="state" name="state"  Placeholder="Beylikdüzü">
              </div>
              <div class="col-50">
                <label for="zip">Posta Kodu</label>
                <input type="text" id="zip" name="zip"  Placeholder="34500">
              </div>
            </div>
            <label for="adr"><i class="fa fa-address-card-o"></i> Adres</label>
            <input type="text" id="adr" name="address"  Placeholder="Merkez mah. 1241.sok. no:21 daire:69">
          </div>
        
<?php
}
?>

          <div class="col-50">
            <h3>Ödeme Ekranı</h3>
            <label for="fname">Kabul Edilen Kartlar</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Kart Üzerindeki İsim</label>
            <input type="text" id="cname" name="cardname" placeholder="Bilal GİDİCİ">
            <label for="ccnum">Kart Numarası</label>
            <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" min="1000000000000000" max="9999999999999999">

            <div class="row">
            <div class="col-50">
                <label for="expyear">Ay</label>
                <input type="number" id="expmonth" name="expmoth" placeholder="07" min="01" max="12">
              </div>
              <div class="col-50">
                <label for="expyear">Yıl</label>
                <input type="number" id="expyear" name="expyear" placeholder="22"min="22" max="99">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input   type="number"  id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Fatura Adresini Teslimat Adresi İle Aynı Yap.
        </label>




        <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl">
                  <img src="../assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                  <span class="mask bg-gradient-dark opacity-10"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="material-icons text-white p-2">wifi</i>
                    <p class="text-white text-sm opacity-8 mb-0">Kart No</p>
                    <h5 id="h5kartno" class="text-white mt-4 mb-5 pb-2"></h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Kart Sahibi</p>
                          <h6 id="h6isim" class="text-white mb-0"></h6>
                        </div>
                        <div >
                          <p class="text-white text-sm opacity-8 mb-0">Ay</p>
                          <h6 id="h6ay" class="text-white mb-0"></h6>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div >
                          <p class="text-white text-sm opacity-8 mb-0">Yıl</p>
                          <h6 id="h6yıl" class="text-white mb-0"></h6>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div >
                          <p class="text-white text-sm opacity-8 mb-0">CVV</p>
                          <h6 id="h6cvv"class="text-white mb-0"></h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <input type="submit" value="Onayla" class="btn">
    </div>
  </div>
  
            <div  class="col-25" >
                <div class="container">
                  <h4>Ödeme Tutarı
                  <span class="price" style="color:black">
                  <i class="fa fa-money"></i>
                  </span>
                  </h4>
                  <input  type="number" id="tutar" name="tutar" min=1  placeholder="1₺" style="text-align:center;">
                  </span></p>
                  <hr>
                  <p>Toplam <span id="total" class="price"  ><b></b></span>&nbsp;&nbsp;₺</p>
                </div>
            </div>




</div>
</form>


<?php
    include '../hf/footer.php';
  }else {
    header("location:".$stlink."/transactions/exit.php");
    exit();
  }
?>







