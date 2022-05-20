<?php
require_once("settings.php");
require_once("function.php");

?>
<?php
if (isset($_POST["sid"])) {
    $sid    =$_POST["sid"];
    $satisdurumu =$_POST["satisdurumu"];
    $kargos =$_POST["kargos"];
    $kargono =$_POST["kargono"];

    $upts   =   $dbconnect->prepare("update sales set satisDurumu=?,kargo=?,kargoNo=? where salesid=?");
    $upts->execute([$satisdurumu,$kargos,$kargono,$sid]);
    $upts   =   $upts->rowCount();
    if ($upts>0) {
        header("location:".$stlink."/pages/dashboard.php");
        exit;
    }else {
        header("location:".$stlink."/pages/dashboard.php");
        exit;
    }


}else {
    header("location:".$stlink."/pages/dashboard.php");
    exit;
}
?>