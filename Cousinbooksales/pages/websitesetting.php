<?php
    $page_title="Web Site Settings";
    $page_name="websitesetting";
    include '../hf/header.php';
    require_once("../transactions/statusquery.php");
    
?>
<?php
 $settings    =   $dbconnect->prepare("select * from settings LIMIT 1");
 $settings->execute();
 $settings    =   $settings->fetchall(PDO::FETCH_ASSOC);
 if ($userr["Status"]==1) {
?>

   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Web Site Settings</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Site Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Keywords</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Copyright</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Logo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Email Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Agreement</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Link</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Sign in img</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Sign up img</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>




<?php
 if ($settings>0) {
   # code...
foreach ($settings as $key) {
?>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteName"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteTitle"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteDescription"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteKeywords"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteCopyright"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteLogo"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteEmail"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteEmailPassword"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteAgreement"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteLink"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteInimg"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["SiteUpimg"] ?></span>
                      </td>
                    


                      <td class="align-middle">
                        <a href="<?php echo $stlink ?>/pages/websitesetting-update.php" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                         <h6> Düzenle</h6>
                        </a>
                      </td>
<?php 
}
?>
                    </tr>
<?php
}
else {
    # code...
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
}else{
  header("location:../transactions/exit.php");
  exit();
}
include '../hf/footer.php';
?>
   

