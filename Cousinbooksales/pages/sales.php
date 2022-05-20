<?php
       $page_title="Tüm Satış İşlemleri";
       $page_name="satislar";
       $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/sales.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {

?>
<?php

    if ( (isset($_GET["list"])) && isset($_GET["page"]) ) {

      if (  ($_GET["list"]=="") || ($_GET["page"]=="") ) {
        header("location:".$stlink."/transactions/exit.php");
        exit;
      }else
      {
          $list =$_GET["list"];
          $page = $_GET["page"];

          $max= ($page*10);
          $min= ($max-10);
                if ($_GET["list"]=="idsb"){
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales  ");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales ORDER BY salesid asc limit :min,:max ");
                }elseif ($_GET["list"]=="idbs") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales ");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales ORDER BY salesid desc limit :min,:max");
                }elseif ($_GET["list"]=="new") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='0'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='0' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="accept") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='1'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='1' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="ready") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='2'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='2' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="cargo") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='3'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='3' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="ok") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='4'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='4' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="return/change") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='5'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='5' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="notcompleted") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu='6'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu='6' ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="fail") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales where satisDurumu!='0' and satisDurumu!='1' and satisDurumu!='2' and satisDurumu!='3' and satisDurumu!='4' and satisDurumu!='5' and satisDurumu!='6'");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales where satisDurumu!='0' and satisDurumu!='1' and satisDurumu!='2' and satisDurumu!='3' and satisDurumu!='4' and satisDurumu!='5' and satisDurumu!='6'  ORDER BY salesid asc limit :min,:max");
                }elseif ($_GET["list"]=="bos") {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales ORDER BY salesid asc limit :min,:max");
                }else {
                  $idcount  = $dbconnect->prepare("SELECT COUNT(salesid) FROM sales ");
                  $idcount->execute();
                  $row = $idcount->fetch();
                  $idcount = $row[0];
                  $idcount= ceil(($idcount/10));
                  $slscm  =   $dbconnect->prepare("select * from sales ORDER BY salesid asc limit :min,:max");
                }
      }
                
    }else {
      header("location:".$stlink."/transactions/exit.php");
      exit;
    }
    



  


$slscm->bindParam('min', $min, PDO::PARAM_INT);
$slscm->bindParam('max', $max, PDO::PARAM_INT);
$slscm->execute();
$slscm  =   $slscm->fetchall(PDO::FETCH_ASSOC);


?>
<div class="list">

    <details>
    <summary>Listeleme</summary>
      
    <a href="<?php echo $stlink ?>/pages/sales.php?list=idsb&page=1"><button>Sipariş id ↓</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=idbs&page=1"><button>Sipariş id ↑</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=new&page=1"><button>Yeni Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=accept&page=1"><button>Onaylanan Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=ready&page=1"><button>Hazırlanan Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=cargo&page=1"><button>Kargodaki Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=ok&page=1"><button>Tamamlanan Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=return/change&page=1"><button>İade/Degişim Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=notcompleted&page=1"><button>Tamamlanmayan Siparişler</button></a>
    <a href="<?php echo $stlink ?>/pages/sales.php?list=fail&page=1"><button>Hatalı Siparişler</button></a>
</details>




</div>
<div class="salestablo">
<table style="width:100%; " class="table table-light text-center table-condensed">
  <thead>
    <tr>
      <th scope="col">Sipariş ID</th>
      <th scope="col">Müşteri ID</th>
      <th scope="col">Sipariş Tarihi</th>
      <th scope="col">Sipariş Tutarı</th>
      <th scope="col">Sipariş Durumu</th>
      <th scope="col">Kargo Şirketi</th>
      <th scope="col">Kargo No</th>
    </tr>
  </thead>
 <tbody>
  

    <?php
    foreach ($slscm as $slscmkey) {
    ?>

    <?php
        if ($slscmkey["satisDurumu"]==0) {
    ?>
    <tr class="table-Info">
    <?php
        }elseif ($slscmkey["satisDurumu"]==4) {
    ?>
    <tr class="table-success">
    <?php
        }elseif ($slscmkey["satisDurumu"]==5) {
    ?>
    <tr class="table-active">
    <?php
        }elseif ($slscmkey["satisDurumu"]==6) {
    ?>
    <tr class="table-danger">
    <?php
        }else {
    ?>
    <tr class="table-warning">
    <?php
        }
    ?>
    


     <th id="row" scope="row"><a href="<?php echo $stlink ?>/pages/sset.php?sid=<?php echo $slscmkey["salesid"] ?>">    <?php echo $slscmkey["salesid"] ?>    </a></th>
      <td><?php echo $slscmkey["musteriid"] ?></td>
      <td><?php echo $slscmkey["satistarihi"] ?></td>
      <td><?php echo $slscmkey["toplamfiyat"] ?>&nbsp₺</td>
  

    <?php
    if ($slscmkey["satisDurumu"]==0) {                
    ?>
      <td><?php echo "Onaylanmayı Bekliyor." ?></td>
    <?php
    }elseif ($slscmkey["satisDurumu"]==1) {
    ?>
     <td><?php echo "Onayladı" ?></td>
    <?php
    }elseif ($slscmkey["satisDurumu"]==2) {
    ?>
    <td><?php echo "Sipariş Hazırlanıyor" ?></td>
    <?php
    }elseif ($slscmkey["satisDurumu"]==3) {
    ?>
    <td><?php echo "Sipariş Kargoda" ?></td>
    <?php
    }elseif ($slscmkey["satisDurumu"]==4) {
    ?>
    <td><?php echo "Tamamlandı" ?></td>
    <?php
    }elseif ($slscmkey["satisDurumu"]==5) {
    ?>
    <td><?php echo "İade/Degişim" ?></td>
    <?php
    }elseif ($slscmkey["satisDurumu"]==6) {
    ?>
    <td><?php echo "Sipariş Tamamlanmadı!" ?></td>
    <?php
    }else {
    ?>
    <td><?php echo "Sipariş ile ilgili bir sorun oluştu" ?></td>
    <?php
    }
    ?>
    <?php
    if ($slscmkey["kargo"]=="") {
    ?>
    <td><?php echo "Henüz Kargoya Verilmedi" ?></td>
    <?php
    }else {
    ?>
     <td><?php echo $slscmkey["kargo"] ?></td>
    <?php
    }
    ?>
    <?php
    if ($slscmkey["kargoNo"]=="") {
    ?>
    <td><?php echo "Yok" ?></td>
    <?php
    }else {
    ?>
    <td><?php echo $slscmkey["kargoNo"] ?></td>
    <?php
    }
    ?>
      


    </tr>
    <?php
    }
    ?>

  </tbody>
</table>

</div><!--tablo-->


<nav style=" margin-top:-20%;" aria-label="Page navigation example">
  <ul class="pagination" style=" margin-left:40%;">
    <li class="page-item">
      <a class="page-link" href="<?php echo $stlink ?>/pages/sales.php?list=<?php echo $list; ?>&page=<?php if ($_GET["page"]>1) {echo ($_GET["page"]-1);}else {echo 1;}?>" aria-label="Previous" style="background-color:whitesmoke;">
        <span style="font-size:150%;" aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
<?php
for ($i=1; $i <=$idcount ; $i++) { 
?>
    <li class="page-item" >
      <a class="page-link" style="background-color:whitesmoke; font-size:110%;"  href="<?php echo $stlink ?>/pages/sales.php?list=<?php echo $list; ?>&page=<?php echo $i ?>">
      <?php   echo $i;  ?>
    </a></li>
<?php
}
?>
    <li class="page-item">
      <a class="page-link" href="<?php echo $stlink ?>/pages/sales.php?list=<?php echo $list; ?>&page=<?php if ($_GET["page"]<$idcount) {echo ($_GET["page"]+1);}else {echo $idcount;}?>" aria-label="Next"  style="background-color:whitesmoke;">
        <span style="font-size:150%;" aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>

    </li>
  </ul>
</nav>







<!--             ------------------------

-----------------------------     -->
<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  exit();
}
?>