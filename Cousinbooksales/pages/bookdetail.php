<?php
    $page_title="Kitap Detayı";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/bookdetail.css" />');
    $page_name="customer";
    include '../hf/header.php';
    if (isset($_GET["id"])) {
        $id=$_GET["id"];
        $book   =   $dbconnect->prepare("select * from books where id=?");
        $book->execute([$id]);
        $book   =   $book->fetch(PDO::FETCH_ASSOC);


        $writers   =   $dbconnect->prepare("select * from writers where id=?");
        $writers->execute([$book["kitapYazarId"]]);
        $writers   =   $writers->fetch(PDO::FETCH_ASSOC);



        $publisher   =   $dbconnect->prepare("select * from publisher where yid=?");
        $publisher->execute([$book["yayinEviId"]]);
        $publisher   =   $publisher->fetch(PDO::FETCH_ASSOC);
        /*   ---------------kitap türü  çektigim yer----------           */
        $kitapTuru=(str_replace("|","",$book["kitapTuru"]));
        $ktpt = explode(',',$kitapTuru);
        $b="";
        foreach ($ktpt as $k) {
          $booktype = $dbconnect->prepare("select type from booktype where id=?");
          $booktype->execute([$k]);
          $booktype   = $booktype->fetchcolumn();
          $b.=$booktype;
          $b.=" ";
      
        }

        
    }else {
        header("location:".$stlink."/pages/booksales.php");
        exit;
    }
?>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
    <div class="row">
        <div class="col-md-5">
       
            <div class="project-info-box mt-0">
                <h5><?PHP  echo $book["kitapAdi"] ?></h5>
                <p class="mb-0"><?php  echo $book["kitapKonusu"] ?></p>
            </div><!-- / project-info-box -->

            <div class="project-info-box"><!--  a link yap    -->
                <p><b>Kitabın Yazarı:</b>&nbsp<?php echo $writers["yazarAdi"]." ".$writers["yazarSoyadi"];  ?></p>
                <p><b>Çıkış Tarihi:</b>&nbsp<?php  echo $book["kitapbTarih"] ?></p>
                <p><b>Yayın Evi:</b>&nbsp<?php echo $publisher["yAdi"] ?></p>
                <p><b>kategoriler:&nbsp</b><?php echo $b ?></p>
                <p class="mb-0"><b>Fiyatı:</b>&nbsp<?php  echo $book["Fiyat"] ?>&nbsp₺ </p>

            </div><!-- / project-info-box -->


        </div><!-- / column -->

        <div style="background-color:whitesmoke; height:100%;" class="col-md-7">
            <img style=" background-color:yellow;width:70%;height:500px;" src="<?php echo  $stlink."/images/".$book["kitapResim"]  ?>" alt="project-image" class="rounded">            
        </div><!-- / column -->
    </div>
</div>



































































<?php
include '../hf/footer.php';
?>