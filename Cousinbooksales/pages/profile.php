<?php
    $page_title="PROFİL";
    $page_name="profile";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/profile.css" />');
    include '../hf/header.php';
    if($userr["Status"]==1 || $userr["Active"]==1 || $userr["Customer"]==1){  

        $adres  =$dbconnect->prepare("select * from adress where musteriid=? ");
        $adres->execute([$userr["id"]]);
        $adresc =    $adres->rowCount();
        $adres  =$adres->fetch(PDO::FETCH_ASSOC);
        if ($adresc>0) {
            $il =   $adres["il"];
            $ilce =   $adres["ilce"];
            $postaKodu =   $adres["postaKodu"];
            $acikAdres =   $adres["acikAdres"];

        }else {
            $il =   "yok";
            $ilce =   "yok";
            $postaKodu =  "yok";
            $acikAdres =   "yok";
        }
        if ($userr["Sex"]=="Male") {
            $cins   ="Erkek";
            $cinsresim="male.png";
        }elseif ($userr["Sex"]=="Female") {
            $cins   ="Kadın";
            $cinsresim="female.png";
        }else {
            $cins   ="Belirtmek İstemedi";
            $cinsresim="not.png";
        }

    
?>


<div style="width:97%;" class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $stlink."/assets/img/".$cinsresim;  ?> ?>"><span class="font-weight-bold"><?php $userr["Name"];  ?></span><span class="text-black-50"><?php echo $userr["Email"];  ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profilim</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Adım</label><input type="text" class="form-control" disabled  value="<?php  echo $userr["Name"];   ?>"></div>
                    <div class="col-md-6"><label class="labels">Soyadım</label><input type="text" class="form-control"disabled value="<?php  echo $userr["Surname"];   ?>" ></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Cinsiyet</label><input type="text" class="form-control" disabled  value="<?php  echo $cins;   ?>"></div>
                    <div class="col-md-12"><label class="labels">Telefon Numaram</label><input type="text" class="form-control" disabled  value="xxx"></div>
                    <div class="col-md-12"><label class="labels">Email Adresi</label><input type="text" class="form-control" disabled  value="<?php  echo $userr["Email"];   ?>"></div>
                    <div class="col-md-12"><label class="labels">Hesap Bakiyem</label><input type="text" class="form-control"  disabled value="<?php  echo $userr["Bakiye"];   ?>&nbsp₺"></div>
                    <div class="col-md-12"><label class="labels">Posta Kodu</label><input type="text" class="form-control" disabled value="<?php   echo $postaKodu;  ?>"></div>
                    <div class="col-md-12"><label class="labels">Açık Adres</label><input type="text" class="form-control" disabled value="<?php   echo $acikAdres;  ?>"></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">İl</label><input type="text" class="form-control" disabled value="<?php   echo $il;  ?>"></div>
                    <div class="col-md-6"><label class="labels">İlçe</label><input type="text" class="form-control" disabled value="<?php   echo $ilce;  ?>" ></div>
                </div>
                <a href="<?php echo $stlink."/pages/accountupdate.php?id=".$userr["id"]; ?>">
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Bilgileri Güncelle</button></div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Kayıt Bilgisi</span></div><br>
                <div class="col-md-12"><label class="labels"></label><input type="text" class="form-control" disabled value="<?php echo $userr["RegisterDate"] ?>"></div> <br>
                
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
  die();
}