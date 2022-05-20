<?php
    $page_title="Ana Sayfa Kitaplar";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/first.css" />');
    $page_name="customer";

    include '../hf/header.php';
if (!isset($_SESSION["user"])) {    
if (isset($_GET["tur"])) {
        $turvalue = $_GET["tur"];
        $bookquery= $dbconnect->prepare("select * from books where Aktif=1 and kitapTuru like :tur "); 
        $tur = "%|".$turvalue."|%";
        $bookquery->bindParam('tur', $tur, PDO::PARAM_STR);
        
      }else {
        $bookquery= $dbconnect->prepare("select * from books  where Aktif=1");
      }



      $bookquery->execute();
      $bookquery=$bookquery->fetchall(PDO::FETCH_ASSOC);




      $booktype = $dbconnect->prepare("select * from booktype");
      $booktype->execute();
      $booktype   = $booktype->fetchall(PDO::FETCH_ASSOC); 
?>


    <nav style="border-radius:15px; width:98%;" class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">

	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="main_nav">
		<ul class="navbar-nav">
		
			<li class="nav-item dropdown has-megamenu">
				<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Kitap Kategorileri  </a>
				<div style="background-color:#D6EAF8;" class="dropdown-menu megamenu" >
          <h6 style="margin-left:45%; ">Kategoriler</h6>

            <h6 style="margin-left:4%;">Kitaplar</h6>
            <div class="a" style="width:15%;">
            <?PHP
            $a=1;
            foreach ($booktype as $key) {
            ?>
            <div class="list-group">
            <a style="margin-left:2%; " href="<?php echo $stlink  ?>/pages/first.php?tur=<?php  echo $key["id"];  ?>" class="list-group-item list-group-item-action "><?php  echo $a." - ".$key["type"];  ?></a>
          </div>
            <?php
            if ($a<=$key["id"]) {
              $a++;
            }
            }
            ?>
             </div>
				</div> <!-- dropdown-mega-menu.// -->
			</li>
      <li class="nav-item active"> <a class="nav-link" href="<?php echo $stlink ?>/pages/first.php">Tüm Kitaplar </a> </li>
		</ul>
	</div> <!-- navbar-collapse.// -->
</div> <!-- container-fluid.// -->
</nav>






      <div style=" width:99%;" class="row mt-4"  >
<?php
foreach ($bookquery as $key) {
  $kitapTuru=(str_replace("|","",$key["kitapTuru"]));
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
      <div class="col-lg-4 col-md-6 mt-4 mb-4" style="width:20%; height:100%;">
      <a href="<?php echo $stlink."/pages/bookdetail.php?id=".$key["id"] ?>">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div  class="bg-light shadow-primary border-radius-lg py-3 pe-1">                
                <div class="chart" style="text-align: center;">
                <img src="<?php echo $stlink."/images/".$key["kitapResim"] ?>" width="100px" height="150px" >          
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "><?php echo $key["kitapAdi"] ?></h6>          
              <p class="text-sm "><?php echo $b?></p>
              <h6 class="mb-0 "><?php echo $key["Fiyat"]." ₺" ?></h6>
              <a  href="<?php echo $stlink."/pages/sign-in.php"?>">
                <button style="margin-left:20%; border: none; border-radius: 12px;  background-color:lightblue; color: black; text-align: center; display: inline-block; text-decoration: none; font-size: 11px;" >Sepete Ekle</button>
              </a>

              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"><?php echo $key["kitapbTarih"] ?> </p>
              </div>
            </div>
          </div>
          </a>
        </div>
       
<?php
}
?>
      </div>
     <!--   ------------------------------------------------------  -->













































































<?php
    include '../hf/footer.php';

}else {
    header("location:".$stlink."/transactions/exit.php");
    exit;
}  
?>