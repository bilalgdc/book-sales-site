<?php
       $page_title="YAZARLAR";
       $page_name="writers";
       $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/writers.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {
?>

<?php
if (isset($_GET["s"])) { 
  if ($_GET["s"]=="et") {
    $writers    = $dbconnect->prepare("select * from writers");
  }
  elseif($_GET["s"]=="az")
  {
  $writers   = $dbconnect->prepare("select * from writers ORDER BY yazarAdi ASC");
  }
  elseif($_GET["s"]=="dt")
  {
  $writers   = $dbconnect->prepare("select * from writers ORDER BY yazardTarih ASC");
  }
}else{
  $writers    = $dbconnect->prepare("select * from writers");
}
$writers->execute();
$writers =$writers->fetchAll(PDO::FETCH_ASSOC);

?>






<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Yazarlar</h6>

                               <!--                        Listeleme     -->
            <div style="float:left; margin-top:-2%; width:14%;">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active "  href="<?php echo $stlink ?>/pages/writeradd.php" role="tab" aria-selected="true">
                <i class="material-icons text-lg position-relative">settings</i>
                <span class="ms-1">Yazar Ekle </span>
                  </a>
                </li>
              </ul>
            </div>
            
<!--
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li style="width:15%;" class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active "  href="<?php echo $stlink ?>/pages/writers.php?s=et" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span style="text-size:5px;" class="ms-1">Eklenme  </span>
                  </a>
                </li>
                <li style="width:15%;" class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 "  href="<?php echo $stlink ?>/pages/writers.php?s=az" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span style="text-size:5px;" class="ms-1">A - Z</span>
                  </a>
                </li>
                <li style="width:15%;" class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 "  href="<?php echo $stlink ?>/pages/writers.php?s=dt" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span style="text-size:5px;" class="ms-1">DoğumT</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>

-->
<div class="list">
<details>
<summary>Listeleme</summary>
<a href="<?php echo $stlink ?>/pages/writers.php?s=et"><button>Eklenme Sırası </button></a>
<a href="<?php echo $stlink ?>/pages/writers.php?s=az"><button>A - Z</button></a>
<a href="<?php echo $stlink ?>/pages/writers.php?s=dt"><button>Doğum Tarihi</button></a>
</details>
</div>








              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yazar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bilgisi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Doğum Tarihi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yazar İl</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <!--        kİTAPLAR --------------  -->






        <tbody>

<?php
    foreach ($writers as $key) {
?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/writer.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $key["yazarAdi"]." ".$key["yazarSoyadi"] ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $key["yazarEmail"] ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["yazarBilgisi"] ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $key["yazardTarih"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["yazaril"] ?></span>
                      </td>
                      <td class="align-middle">
                        <a href="writers-update.php?id=<?php echo $key["id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <h6>Güncelle</h6>
                        </a>
                      </td>

                      <td class="align-middle">
                        <a href="../transactions/writers-del.php?id=<?php echo $key["id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                         <h6>Sil</h6>
                        </a>
                      </td>




                    </tr>
<?php
    }
?>


        </tbody>



<!--        kİTAPLAR ---------- FORM----  -->






                </table>
              </div>
            </div>
          </div>
        </div>
      </div>







































<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  die();
}
?>
   