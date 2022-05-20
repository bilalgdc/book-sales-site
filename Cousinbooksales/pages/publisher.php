<?php
    $page_title="YAYIN EVİ";
    $page_name="yayinevleri";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/publisher.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {

?>
<?php
if (isset($_GET["s"])) { 
  if ($_GET["s"]=="et") {
    $publisher    = $dbconnect->prepare("select * from publisher");
  }
  elseif($_GET["s"]=="az")
  {
  $publisher   = $dbconnect->prepare("select * from publisher ORDER BY yAdi ASC");
  }
}else{
  $publisher    = $dbconnect->prepare("select * from publisher");
}
$publisher->execute();
$publisher =$publisher->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Yayın Evi</h6>
                               <!--                        Listeleme     -->
              <div style="float:left;  margin-top:-2%; width:14%;">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active "  href="<?php echo $stlink ?>/pages/publisheradd.php" role="tab" aria-selected="true">
                <i class="material-icons text-lg position-relative">settings</i>
                <span class="ms-1">Yayın Evi Ekle </span>
                  </a>
                </li>
              </ul>
                 </div>
<!--

         <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active "  href="<?php echo $stlink ?>/pages/publisher.php?s=et" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Eklenme Sırası </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 "  href="<?php echo $stlink ?>/pages/publisher.php?s=az" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">A - Z</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>

-->

<div class="list">
<details>
<summary>Listeleme</summary>
<a href="<?php echo $stlink ?>/pages/publisher.php?s=et"><button>Eklenme Sırası </button></a>
<a href="<?php echo $stlink ?>/pages/publisher.php?s=az"><button>A - Z</button></a>
</details>
</div>





              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yayın Evi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Adres</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tel</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <!--        kİTAPLAR --------------  -->






        <tbody>
 <?php
    foreach ($publisher as $key) {
?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/publisher.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $key["yAdi"] ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $key["yEmail"] ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $key["yAdres"] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $key["yTel"] ?></span>
                      </td>
                      <td class="align-middle">
                        <a href="publisher-update.php?id=<?php echo $key["yid"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <h6>Güncelle</h6>
                        </a>
                      </td>

                      <td class="align-middle">
                        <a href="../transactions/publisher-del.php?id=<?php echo $key["yid"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
  exit();
}
?>
   