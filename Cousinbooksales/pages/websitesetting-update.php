<?php
    $page_title="Web Site Settings Güncelle";
    $page_name="websitesetting";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
    include '../hf/header.php';
?>

<?php
/*---------------------------*/
$id=$setting["id"];
$wbset    = $dbconnect->prepare("select * from settings where id= ?");
$wbset->execute([$id]);
$wbset =$wbset->fetch(PDO::FETCH_ASSOC);
if ($userr["Status"]==1) {
?>


   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <!--
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Web Sitesi Ayarları Güncelle</h6>
              </div>
                -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->
<div class="row">
  <div class="col-75">
    <div class="container">

<form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/websitesettings-edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id ?>">



    <h3> Web Site Ayarları Güncelle</h3>

    <label for="SiteName"><i class="fa fa-cogs"></i> Site Adı</label>
    <input type="text" id="SiteName" name="SiteName"  value="<?php echo $wbset["SiteName"]; ?>">

    <label for="SiteTitle"><i class="fa fa-cogs"></i> Site Title</label>
    <input type="text" id="SiteTitle" name="SiteTitle"  value="<?php echo $wbset["SiteTitle"]; ?>">

    <label for="SiteDescription"><i class="fa fa-cogs"></i> Site Description</label>
    <input type="text" id="SiteDescription" name="SiteDescription"  value="<?php echo $wbset["SiteDescription"]; ?>">

    <label for="SiteKeywords"><i class="fa fa-cogs"></i> Site Keywords</label>
    <input type="text" id="SiteKeywords" name="SiteKeywords"  value="<?php echo $wbset["SiteKeywords"]; ?>">

    <label for="SiteCopyright"><i class="fa fa-cogs"></i> Site Copyright</label>
    <input type="text" id="SiteCopyright" name="SiteCopyright"  value="<?php echo $wbset["SiteCopyright"]; ?>">

    <label for="SiteLogo"><i class="fa fa-cogs"></i> Site Logosu</label>
    <input type="text" id="SiteLogo" name="SiteLogo"  value="<?php echo $wbset["SiteLogo"]; ?>">

    <label for="SiteEmail"><i class="fa fa-cogs"></i> Site Emaili</label>
    <input type="email" id="SiteEmail" name="SiteEmail"  value="<?php echo $wbset["SiteEmail"]; ?>">

    <label for="SiteEmailPassword"><i class="fa fa-cogs"></i> Adı Şifresi</label>
    <input type="password" id="SiteEmailPassword" name="SiteEmailPassword"  value="<?php echo $wbset["SiteEmailPassword"]; ?>">

    <label for="SiteAgreement"><i class="fa fa-cogs"></i> Site Agreement</label>
    <input type="text" id="SiteAgreement" name="SiteAgreement"  value="<?php echo $wbset["SiteAgreement"]; ?>">

    <label for="SiteLink"><i class="fa fa-cogs"></i> Site Linki</label>
    <input type="text" id="SiteLink" name="SiteLink"  value="<?php echo $wbset["SiteLink"]; ?>">

    <label for="SiteInimg"><i class="fa fa-file"></i> Giriş Ekranı Resim</label>
    <h6><?php echo "Zaten '".$wbset["SiteInimg"]."' Adlı Resim Kayıtlı ";  ?><br>Güncellemek İçin Yeni Resim Ekleyin.</h6><br>
    <input type="file" id="SiteInimg" name="SiteInimg" value=""><br><br>

    <label for="SiteUpimg"><i class="fa fa-file"></i> Kayıt Ol Resim</label>
    <h6><?php echo "Zaten '".$wbset["SiteUpimg"]."' Adlı Resim Kayıtlı ";  ?><br>Güncellemek İçin Yeni Resim Ekleyin.</h6><br>
    <input type="file" id="SiteUpimg" name="SiteUpimg" value="">



<!--
    <label for="SiteInimg"><i class="fa fa-cogs"></i> Site Sign in  img</label>
    <input type="text" id="SiteInimg" name="SiteInimg"  value="<?php echo $wbset["SiteInimg"]; ?>">

    <label for="SiteUpimg"><i class="fa fa-cogs"></i> Site Sign Up  img</label>
    <input type="text" id="SiteUpimg" name="SiteUpimg"  value="<?php echo $wbset["SiteUpimg"]; ?>">
-->
  

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Güncelle</button>
                  </div>

                  <div class="text-center">
                    <a href="dashboard.php" class="btn bg-gradient-primary w-100 my-4 mb-2">Geri</a>
                </div>
                  </form>


              </div>
            </div>
          </div>
        </div>
      </div>




<!--             -----------------------------------------------------     -->
<?php
}else
{
  header("location:".$stlink."/transactions/exit.php");
  die();
}
include '../hf/footer.php';
?>
   

