<?php
    $page_title="KİTAPLAR";
    $page_name="books";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/books.css" />');
    include '../hf/header.php';
    if ($userr["Status"]==1 || $userr["Active"]==1) {
?>

<?php
if (isset($_GET["s"])) { 
  if ($_GET["s"]=="et") {
    $books    = $dbconnect->prepare("SELECT books.*,writers.yazarAdi as yazarAdi, writers.yazarSoyadi as yazarSoyadi, publisher.yAdi as yayinEviAdi FROM books INNER JOIN writers ON  books.kitapYazarId = writers.id INNER JOIN publisher ON publisher.yid =books.yayinEviId  where books.Aktif=1  ORDER BY id ASC ");
  }
  elseif($_GET["s"]=="az")
  {
  $books    = $dbconnect->prepare("SELECT books.*,writers.yazarAdi as yazarAdi, writers.yazarSoyadi as yazarSoyadi, publisher.yAdi as yayinEviAdi FROM books INNER JOIN writers ON  books.kitapYazarId = writers.id INNER JOIN publisher ON publisher.yid =books.yayinEviId  where books.Aktif=1  ORDER BY kitapAdi ASC");
  }
  elseif($_GET["s"]=="bas")
  {
  $books  = $dbconnect->prepare("SELECT books.*,writers.yazarAdi as yazarAdi, writers.yazarSoyadi as yazarSoyadi, publisher.yAdi as yayinEviAdi FROM books INNER JOIN writers ON  books.kitapYazarId = writers.id INNER JOIN publisher ON publisher.yid =books.yayinEviId   where books.Aktif=1    ORDER BY kitapbTarih ASC");
  }
  elseif ($_GET["s"]=="adegil") {
    $books    = $dbconnect->prepare("SELECT books.*,writers.yazarAdi as yazarAdi, writers.yazarSoyadi as yazarSoyadi, publisher.yAdi as yayinEviAdi FROM books INNER JOIN writers ON  books.kitapYazarId = writers.id INNER JOIN publisher ON publisher.yid =books.yayinEviId where books.Aktif=0  ORDER BY kitapAdi ASC ");
  }
}else{
  $books    =$dbconnect->prepare("SELECT books.*,writers.yazarAdi as yazarAdi, writers.yazarSoyadi as yazarSoyadi, publisher.yAdi as yayinEviAdi FROM books INNER JOIN writers ON  books.kitapYazarId = writers.id INNER JOIN publisher ON publisher.yid =books.yayinEviId where books.Aktif=1 ORDER BY id ASC");
}
$books->execute();
$books =$books->fetchAll(PDO::FETCH_ASSOC);


/*
---------------
*/




?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Kitaplar</h6>

                <!--                        Listeleme  -->
                <div style="float:left; margin-top:-2%; width:14%;">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active "  href="<?php echo $stlink ?>/pages/bookadd.php" role="tab" aria-selected="true">
                <i class="material-icons text-lg position-relative">settings</i>
                <span class="ms-1">Kitap Ekle </span>
                  </a>
                </li>
              </ul>
                 </div>

          
<div class="list">
<details>
<summary>Listeleme</summary>
<a href="<?php echo $stlink ?>/pages/books.php?s=et"><button>Eklenme Sırası </button></a>
<a href="<?php echo $stlink ?>/pages/books.php?s=az"><button>A - Z</button></a>
<a href="<?php echo $stlink ?>/pages/books.php?s=bas"><button>Basım Yılı</button></a>
<a href="<?php echo $stlink ?>/pages/books.php?s=adegil"><button>Satış Dışı</button></a>
</details>
</div>













              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kitap</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konusu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yayın Evi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yazarı</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Basım Tarihi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kitap Fiyatı</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <!--        kİTAPLAR --------------  -->





        <tbody>
<?php
    foreach ($books as $key) {
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
                    <tr>
                      

                      <td>
                        <div class="d-flex px-2 py-1">
                          
                        <a href="<?php echo $stlink."/pages/bookdetail.php?id=".$key["id"] ?>">
                          <div>
                            <img src="<?php echo $stlink."/images/".$key["kitapResim"] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          </a>   
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $key["kitapAdi"] ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $b ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $key["kitapKonusu"] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $key["yayinEviAdi"] ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $key["yazarAdi"]." ".$key["yazarSoyadi"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $key["kitapbTarih"] ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $key["Fiyat"]." ₺" ?></span>
                      </td>
                                      

                      <td class="align-middle">
                        <a href="books-update.php?id=<?php echo $key["id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <h6>Güncelle</h6>
                        </a>
                      </td>

                      <td class="align-middle">
                        <a href="../transactions/book-del.php?id=<?php echo $key["id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
   