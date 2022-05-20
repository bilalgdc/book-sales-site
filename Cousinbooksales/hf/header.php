<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
require_once("../transactions/sessionquery.php");
require_once("../transactions/statusquery.php");


?>
<?php
if (isset($_SESSION["user"])) {
  $basket =   $dbconnect->prepare("select * from basket where musteriid=?");
  $basket->execute([$userr["id"]]);
  $basket =$basket->fetchall(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link rel="icon"  type="image/ico" href="../assets/img/favicon.ico">-->

  <?php
  if (isset($css_array))
  {
  foreach($css_array as $key){
  echo $key;
  }
  }
  if (isset($css_arrays)) {
    echo $css_arrays;
  }
  ?>

  <title>
  <?=($page_title ?? "")." - ".$sttl?>
  </title>
  <meta name="description" content="<?=$stdc?>">
  <meta name="keywords" content="<?=$stkw?>">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">


<?php
if(isset($_SESSION["user"]))
{
?>
<?php
if ($userr["Status"]==1 && $userr["Active"]==1 && $userr["Customer"]==0) {
?>




<!--    -------------------------------------------------------------  -->



<aside style="width:16%;" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div style="margin-left:-5%;" class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <!--
      <a class="navbar-brand m-0" href="" target="_blank">
     <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> 
      <span class="ms-1 font-weight-bold text-white">MENU</span>
      </a>
      -->
      <a class="navbar-brand m-0" href="../pages/accountupdate.php">
      <span style="color: lightblue;" class="font-weight-bolder mb-0"><i  style="font-size:8px;">&nbsp</i>Hoşgeldiniz  <?php echo $userr["Name"]." ".$userr["Surname"] ?></span>
          </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" style="height:100%!important;" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " id="anasayfa" href="../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Ana Sayfa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  " id="websitesetting" href="../pages/websitesetting.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-cogs"></i>
            </div>
            <span class="nav-link-text ms-1">Web Site Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  " id="kullanicilar" href="../pages/tables.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Kullanıcılar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  " id="books" href="../pages/books.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-book"></i>
            </div>
            <span class="nav-link-text ms-1">Kitaplar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="kitapTuru" href="../pages/booktype.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-book"></i>
            </div>
            <span class="nav-link-text ms-1">Kitap Türü</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " id="writers" href="../pages/writers.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-pen-nib"></i>
            </div>
            <span class="nav-link-text ms-1">Yazarlar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="yayinevleri" href="../pages/publisher.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-pen-nib"></i>
            </div>
            <span class="nav-link-text ms-1">Yayın Evi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="satislar" href="../pages/sales.php?list=bos&page=1">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-cart"></i>
            </div>
            <span class="nav-link-text ms-1">Satışlar</span>
          </a>
        </li>







        <li class="nav-item">
          <a class="nav-link text-white " id="billing" href="../pages/billing.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " id ="notifications" href="../pages/notifications.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="profile" href="../pages/profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profil</span>
          </a>
        </li>    
        <li class="nav-item">
          <a class="nav-link text-white "  id="accountupdate" href="../pages/accountupdate.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user" style="font-size:15px;"></i>
            </div>
            <span class="nav-link-text ms-1">Hesap Ayarları</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " id="sign-out" href="../transactions/exit.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-sign-out-alt" style="font-size:15px;"></i>
            </div>
            <span class="nav-link-text ms-1">Çıkış Yap</span>
          </a>
        </li>



  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0"><?php echo $page_title ?? "Admin" ?></h6>
        </nav>
        <div  style=" margin: auto; position: relative;  left:25%;">
          <nav aria-label="breadcrumb">
            <!--
          <a href="../pages/accountupdate.php">
          <h6 style="color: grey;" class="font-weight-bolder mb-0"><i class="fas fa-user" style="font-size:15px;"></i>&nbspHoşgeldiniz   <?php echo $userr["Name"]." ".$userr["Surname"] ?></h6>
          </a>
              -->
           </nav>
        </div>





        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-flex align-items-center">   
                  <a href="../transactions/exit.php" class="nav-link text-body font-weight-bold px-0">
                <span class="d-sm-inline d-none">Çıkış Yap</span>
                <i class="fa fa-sign-out"></i>
              </a>
            </li>





            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
           <li class="nav-item px-3 d-flex align-items-center">
              <a href="../pages/accountupdate.php?id=<?php echo $userr["id"] ?>" class="nav-link text-body p-0">
                <i class="fa fa-cog      cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->






<?php
}
elseif($userr["Status"]==0 && $userr["Active"]==1 && $userr["Customer"]==0){  
?>

<aside  style="width:16%;" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div style="margin-left:-6%;" class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <!--
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">MENU</span>
      </a>
      -->
      <a class="navbar-brand m-0" href="../pages/accountupdate.php">
      <span style="color: lightblue;" class="font-weight-bolder mb-0"><i  style="font-size:8px;">&nbsp</i>Hoşgeldiniz  <?php echo $userr["Name"]." ".$userr["Surname"] ?></span>
          </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" style="height:100%!important;" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " id="anasayfa" href="../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Ana Sayfa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  " id="books" href="../pages/books.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-book"></i>
            </div>
            <span class="nav-link-text ms-1">Kitaplar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="writers" href="../pages/writers.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-pen-nib"></i>
            </div>
            <span class="nav-link-text ms-1">Yazarlar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="yayinevleri" href="../pages/publisher.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-pen-nib"></i>
            </div>
            <span class="nav-link-text ms-1">Yayın Evi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="satislar"  href="../pages/sales.php?list=bos&page=1">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-cart"></i>
            </div>
            <span class="nav-link-text ms-1">Satışlar</span>
          </a>
        </li>





        <li class="nav-item">
          <a class="nav-link text-white " id="billing" href="../pages/billing.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>






        <li class="nav-item">
          <a class="nav-link text-white " id="notifications" href="../pages/notifications.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="profile" href="../pages/profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profil</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " id="sign-out" href="../transactions/exit.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-sign-out-alt" style="font-size:15px;"></i>
            </div>
            <span class="nav-link-text ms-1">Çıkış Yap</span>
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link text-white " id="accountupdate" href="../pages/accountupdate.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user" style="font-size:15px;"></i>
            </div>
            <span class="nav-link-text ms-1">Hesap Ayarları</span>
          </a>
        </li>


  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0"><?php echo $page_title ?></h6>
        </nav> <!--
        <div  style=" margin: auto; position: relative;  left:25%;">
          <nav aria-label="breadcrumb">    
          <a href="../pages/accountupdate.php">
          <h6 style="color: grey;" class="font-weight-bolder mb-0"><i class="fas fa-user" style="font-size:15px;"></i>&nbspHoşgeldiniz   <?php echo $userr["Name"]." ".$userr["Surname"] ?></h6>
          </a>    
           </nav>
        </div>-->

 
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                  <a href="../transactions/exit.php" class="nav-link text-body font-weight-bold px-0">
                <span class="d-sm-inline d-none">Çıkış Yap</span>
                <i class="fa fa-sign-out"></i>
              </a>
            </li>


            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="../pages/accountupdate.php?id=<?php echo $userr["id"] ?>" class="nav-link text-body p-0">
                <i class="fa fa-cog      cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->






<?php
}elseif ($userr["Status"]==0 && $userr["Active"]==0 && $userr["Customer"]==1) {
?>




<aside style="width:15%;" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div style="margin-left:-15%;" class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <!--
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">MENU</span>
      </a>
        -->
        <a class="navbar-brand m-0" href="../pages/accountupdate.php">
          <span style="color: lightblue;" class="font-weight-bolder mb-0">&nbsp&nbsp&nbsp<i style="font-size:8px;">&nbsp</i>Hoşgeldiniz  <?php echo $userr["Name"]." ".$userr["Surname"] ?></span>
          </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" style="height:100%!important;" id="sidenav-collapse-main">
      <ul class="navbar-nav">




        <li class="nav-item">
          <a class="nav-link text-white  "  id="customer" href="../pages/booksales.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-book"></i>
            </div>
            <span class="nav-link-text ms-1">Kitaplar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="basketlist"  href="../pages/basketlist.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-basket"></i>
              
            </div>
            <span class="nav-link-text ms-1">Alışveriş Sepeti</span>
          </a>
        </li>





        
        <li class="nav-item">
          <a class="nav-link text-white " id="bought"  href="../pages/bought2.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-list-ul"></i>
            </div>
            <span class="nav-link-text ms-1">Satın Aldıklarım</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " id="payment"  href="../pages/payment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="far fa-credit-card"></i>
              
            </div>
            <span class="nav-link-text ms-1">Bakiye Yükleme</span>
          </a>
        </li>


        <!--
        <li class="nav-item">
          <a class="nav-link text-white "  id="profile" href="../pages/profile.php?id=<?php echo $userr["id"] ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10" style="font-size:15px;">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Profilim</span>
          </a>
        </li>
        -->
        <li class="nav-item">
          <a class="nav-link text-white " id="profile" href="../pages/profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profil</span>
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link text-white "  id="accountupdate" href="../pages/accountupdate.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user" style="font-size:15px;"></i>
            </div>
            <span class="nav-link-text ms-1">Hesap Ayarları</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " id="sign-out" href="../transactions/exit.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-sign-out-alt" style="font-size:15px;"></i>
            </div>
            <span class="nav-link-text ms-1">Çıkış Yap</span>
          </a>
        </li>
    




  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0"><?php echo $page_title ?></h6>
        </nav>
        <div  style=" width:25%;height:25px;  margin: auto; position: relative; left:15%;">
          <nav aria-label="breadcrumb">
          <a href="../pages/payment.php">  
          <h6 style="color: Purple;" class="font-weight-bolder mb-0">Hesap Bakiyesi :&nbsp&nbsp<?php echo $userr["Bakiye"] ?>₺</h6>
          </a>
           </nav>
        </div>
<!--
        <div  style=" margin: auto; position: relative;  left:25%;">
          <nav aria-label="breadcrumb">
          <a href="../pages/accountupdate.php">
          <h6 style="color: grey;" class="font-weight-bolder mb-0"><i class="fas fa-user" style="font-size:15px;"></i>&nbspHoşgeldiniz   <?php echo $userr["Name"]." ".$userr["Surname"] ?></h6>
          </a>
           </nav>
        </div>
-->



        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">                      

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                  <a href="../transactions/exit.php" class="nav-link text-body font-weight-bold px-0">
                <span class="d-sm-inline d-none">Çıkış Yap</span>
                <i class="fa fa-sign-out"></i>
              </a>
            </li>
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                
                </div>
              </a>
            </li>



            <li class="nav-item px-3 d-flex align-items-center">
              <a href="../pages/accountupdate.php?id=<?php echo $userr["id"] ?>" class="nav-link text-body p-0">
                <i class="fa fa-cog      cursor-pointer"></i>
              </a>
            </li>


            
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">          
                <img style="height:30px; witdh:30px;" src="../assets/img/sepet.jpg">
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <h6>SEPETİM</h6>
             <?php
            foreach ($basket as $basketkey) {

            $book =   $dbconnect->prepare("select * from books where id=?");
            $book->execute([$basketkey["kitapid"]]);
            $book =$book->fetch(PDO::FETCH_ASSOC);
            ?>
              <li class="mb-2">
                  <div class="dropdown-item border-radius-md">
                    <div class="d-flex py-1">  
                      <div class="my-auto">
                        <img src="<?php echo $stlink."/images/".$book["kitapResim"] ?>" class="avatar avatar-sm  me-3 ">
                      </div>
                      <php
                      ?>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold"><?php echo $book["kitapAdi"] ?></span><br>
                          <span class="font-italic ">Kitap Adeti:&nbsp<?php echo $basketkey["kitapadet"] ?>&nbsp</span>
                          <span class="font-italic ">Fiyat:&nbsp<?php echo $book["Fiyat"] ?>&nbsp₺</span>
                        </h6>
                      </div>
                    </div>
                  </div>
                </li>
            <?php
            } 
            ?>
             <a  href="<?php echo $stlink."/pages/basketlist.php" ?>">
            <div class="dropdown-item border-radius-md text-center">     
                  <span class="font-weight-bold ">Sepete Git</span>          
           </div> </a>
     

              </ul>
            </li>

            









          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->



<?php
}else
{
  header("location:".$stlink."pages/sign-in.php");
  die();
}
?>




<?php
}else {
?>



<aside style="width:15%;" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div style="margin-left:5%;" class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

        <a class="navbar-brand m-0" href="../pages/sign-in.php">
          <span style="color: lightblue;" class="font-weight-bolder mb-0">&nbsp&nbsp&nbsp<i style="font-size:8px;">&nbsp</i>Hoşgeldiniz</span>
          </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" style="height:100%!important;" id="sidenav-collapse-main">
      <ul class="navbar-nav">




        <li class="nav-item">
          <a class="nav-link text-white  "  id="customer" href="../pages/first.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-book"></i>
            </div>
            <span class="nav-link-text ms-1"> Tüm Kitaplar</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white  "  id="customer" href="../pages/sign-in.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-sign-in-alt"></i>
            </div>
            <span class="nav-link-text ms-1">Giriş Yap</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  "  id="customer" href="../pages/sign-up.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Kayıt Ol</span>
          </a>
        </li>
        <span style="color:lightblue;">Alışveriş Yapmak İçin Lütfen Giriş Yapın Veya Kayıt Olun </span>



  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0"><?php echo $page_title ?></h6>
        </nav>


        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">                      

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                  <a href="../pages/sign-in.php" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-sign-in"></i>
                <span class="d-sm-inline d-none">Giriş Yap</span>           
              </a>&nbsp/&nbsp 
            </li>

            <li class="nav-item d-flex align-items-center">
                  <a href="../pages/sign-up.php" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user"></i>
                <span class="d-sm-inline d-none">Kayıt Ol</span>               
              </a>
            </li>
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                
                </div>
              </a>
            </li>










          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->















































<?php
}
?>



