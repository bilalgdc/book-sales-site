<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>
<?php
if (isset($_GET["adet"])) {

            if (isset($_GET["basketupid"])) {
                $adet=($_GET["adet"]+1);
                $amountup   =   $dbconnect->prepare("Update basket set kitapadet=? where basketid=?");
                $amountup->execute([$adet,$_GET["basketupid"]]);
                $amountup   =   $amountup->rowCount();
                if ($amountup>0) {
                    header("location:".$stlink."/pages/basketlist.php");
                    exit;
                }else {
                    header("location:".$stlink."/pages/basketlist.php");
                    exit;
                }


                
            }elseif (isset($_GET["basketdownid"])) {
                if ($_GET["adet"]==1) {

                    header("location:".$stlink."/pages/basketlist.php");
                    exit;

                }else 
                {

                        $adet=($_GET["adet"]-1);
                        $amountdown     =   $dbconnect->prepare("update basket set kitapadet=? where basketid=?");
                        $amountdown->execute([$adet,$_GET["basketdownid"]]);
                        $amountdown     =   $amountdown->rowCount();
                        if ($amountdown>0) {
                            header("location:".$stlink."/pages/basketlist.php");
                            exit;
                        }else {
                            header("location:".$stlink."/pages/basketlist.php");
                            exit;
                        }         
                }

            }else {
                header("location:".$stlink."/pages/basketlist.php");
                exit;
            }



}else {
    header("location:".$stlink."/pages/basketlist.php");
    exit;
}




































?>