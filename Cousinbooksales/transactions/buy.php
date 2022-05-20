<?php
  require_once("settings.php");
  require_once("function.php");
?>
<?php
if (isset($_POST["total"]) && isset($_POST["userid"])) {
    $total  =   $_POST["total"];
    $id     =   $_POST["userid"];

    $userbakiye     =   $dbconnect->prepare("select Bakiye From user where id=?");
    $userbakiye->execute([$id]);
    $userbakiyec    =   $userbakiye->rowCount();
    $userbakiye     =   $userbakiye->fetchColumn();

    if ($userbakiyec>0) {  

            if ($userbakiye>=$total) {      
                $basket =   $dbconnect->prepare("select * from basket where musteriid=?");
                $basket->execute([$id]);
                $basketCount    =  $basket->rowCount();
                $basket     =   $basket->fetchall(PDO::FETCH_ASSOC);
                $satisekle  =   $dbconnect->prepare("insert into sales(musteriid,toplamfiyat,satistarihi) values(?,?,now())");
                $satisekle->execute([$id,$total]);
                $satisekle  =   $satisekle->RowCount();
                $satisid    =   $dbconnect->lastInsertId();
 
                if ($satisekle>0) {
                    foreach ($basket as $basketkey) {
                        $kitapid    =$basketkey["kitapid"];
                        $kitapadet    =$basketkey["kitapadet"];
                    
                    $satisdekle     =   $dbconnect->prepare("insert into salesdetail(salesid,kitapid,kitapadet) values(?,?,?)");
                    $satisdekle->execute([$satisid,$kitapid,$kitapadet]);
                    $satisdekle     =   $satisdekle->rowCount();
                    }
                    if ($satisdekle>0) {
                        $basketdel  =   $dbconnect->prepare("delete from basket where musteriid=?");
                        $basketdel->execute([$id]);


                        $newbakiye  =$userbakiye-$total;
                        $bakiyeupd  =   $dbconnect->prepare("update user set Bakiye=? where id=?");
                        $bakiyeupd->execute([$newbakiye,$id]);

                        header("location:".$stlink."/pages/booksales.php");
                        exit;

                    }else {
                        header("location:".$stlink."/pages/basketlist.php");
                        exit;
                    }

                }else 
                {
                    header("location:".$stlink."/pages/basketlist.php");
                    exit;
                    
                }



            }else 
            {
                header("location:".$stlink."/pages/payment.php");
                exit;
            }
    }else {
        header("Location:".$stlink."/pages/sign-in.php");
         exit;
    }
    



}else {
    header("Location:".$stlink."/pages/basketlist.php");
    exit;
}

?>