<?php
    $page_title="KİTAP TÜRLERİ";
    $page_name="kitapTuru";
    include '../hf/header.php';
    if (isset($_POST["booktype"])) {
        $bktypadd   =   $dbconnect->prepare("insert into booktype(type) values(?)");
        $bktypadd->execute([$_POST["booktype"]]);
        $bktypeadd  =   $bktypadd->rowCount();
    }

    $bktyp  =   $dbconnect->prepare("select * from booktype order by type asc");
    $bktyp->execute();
    $bktyp  =   $bktyp->fetchall(PDO::FETCH_ASSOC);

    $idcount  = $dbconnect->prepare("SELECT COUNT(id) FROM booktype");
    $idcount->execute();
    $row = $idcount->fetch();
    $idcount = $row[0];
    $a=1;
?>
<form  role="form" class="text-start" action="<?php echo $stlink; ?>/pages/booktype.php"  method="post">
<div style="width:50%;" class="input-group mb-3">
  <input type="text" name="booktype" class="form-control" placeholder="Eklemek istediginiz kitap türünü yazınız" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button type="submit" class="btn btn-outline-success" type="button">Kaydet</button>
  </div>
</div>
</form>
            <?php
            foreach ($bktyp as $bktype) {

            ?>

            <ol class="list-group "> 
            <li name="kitapTuru[]" class="list-group-item" value="<?php echo $bktype["id"]; ?>"><?php echo $a." - ".$bktype["type"]; ?>
            <a href="<?php echo $stlink."/transactions/booktype-del.php?id=".$bktype["id"]; ?>"><button style="float:right; margin-right:2%; width:5%; height:22px; aling:center; border:none; background-color:lightblue; border-radius:15px;" type="button" >Sil</button></a> 
            </li>
            </ol>
            <?php 
            if ($a<$idcount) {
                $a++;
            }
                
            }
            ?>
<?php
include '../hf/footer.php';
?>