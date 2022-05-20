<?php
      $page_title="KULLANICILAR";
      $page_name="kullanicilar";
      $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/tablesusers.css" />');
    include '../hf/header.php';
    require_once("../transactions/statusquery.php");
    
?>
<?php
if (isset($_GET["s"])) { 
  if ($_GET["s"]=="et") {
    $users    = $dbconnect->prepare("select * from user");
  }elseif($_GET["s"]=="az"){
  $users   = $dbconnect->prepare("select * from user ORDER BY Name ASC");
  }elseif($_GET["s"]=="Customer"){
    $users   = $dbconnect->prepare("select * from user where Customer=1");
  }elseif($_GET["s"]=="Active"){
    $users   = $dbconnect->prepare("select * from user where Active=1");
  }elseif($_GET["s"]=="Status"){
    $users   = $dbconnect->prepare("select * from user where Status=1");
  }
}else{
  $users    = $dbconnect->prepare("select * from user");
}


$users->execute();
$userdata =$users->fetchAll(PDO::FETCH_ASSOC);

?>


   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Kullanıcılar</h6>
<div class="list">
<details>
<summary>Listeleme</summary>
<a href="<?php echo $stlink ?>/pages/tables.php?s=et"><button>Eklenme Sırası </button></a>
<a href="<?php echo $stlink ?>/pages/tables.php?s=az"><button>A - Z</button></a>
<a href="<?php echo $stlink ?>/pages/tables.php?s=Customer"><button>Müşteriler</button></a>
<a href="<?php echo $stlink ?>/pages/tables.php?s=Active"><button>Personeller</button></a>
<a href="<?php echo $stlink ?>/pages/tables.php?s=Status"><button>Admin/Yönetici</button></a>
</details>
</div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kimlik</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cinsiyet</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kayıt Tarihi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aktiflik</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yönetici</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Müşteri</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>




<?php
 if ($userr["Status"]==1) {
   # code...
foreach ($userdata as $key) {
?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>

                          <?php
                            if ($key["Sex"]=="Male")
                            {
                            ?>

                            <img src="../assets/img/male.png" alt="profile_image" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">

                            <?php
                            }elseif ($key["Sex"]=="Female") 
                            {
                            ?>
                            <img src="../assets/img/female.png" alt="profile_image" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            <?php
                            }else 
                            {
                            ?>
                            <img src="../assets/img/not.png" alt="profile_image" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            <?php
                            }
                            ?>
                          </div>


                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $key["Name"]." ".$key["Surname"];  ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $key["Email"] ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $key["Sex"]; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["RegisterDate"]; ?></span>
                      </td>
                      <td>
                      <div class="d-flex flex-column justify-content-center">
                            <p style="text-align:center;" class="mb-0 text-sm"><?php echo $key["Active"]?></p>
                      </div>
                      </td>

                      <td>
                      <div class="d-flex flex-column justify-content-center">
                            <p style="text-align:center;" class="mb-0 text-sm"><?php echo $key["Status"]?></p>
                      </div>
                      </td>
                      <td>
                      <div class="d-flex flex-column justify-content-center">
                            <p style="text-align:center;" class="mb-0 text-sm"><?php echo $key["Customer"]?></p>
                      </div>
                      </td>


                      <td class="align-middle">
                        <a href="<?php echo $stlink ?>/pages/users-update.php?id=<?php echo $key["id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Düzenle
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="<?php echo $stlink ?>/transactions/users-del.php?id=<?php echo $key["id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          SİL
                        </a>
                      </td>
<?php 
}
?>
                    </tr>
<?php
}
else {
  header("location:../transactions/exit.php");
  exit();
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>




<!--             -----------------------------------------------------     -->
<?php
include '../hf/footer.php';
?>
   

