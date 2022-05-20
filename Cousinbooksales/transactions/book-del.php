<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>

<?php
if (isset($_GET["id"])) {
    $book    = $dbconnect->prepare("select * from books where id=?");
    $book->execute([$_GET["id"]]);
    $book =$book->fetch(PDO::FETCH_ASSOC);
    $resim=$book["kitapResim"];
    $yol = $stlink."/images/".$resim;
    
  
    $booksdel   = $dbconnect->prepare("Delete from books where id=?");
    $booksdel->execute([$_GET["id"]]);
    $booksdel->rowCount();
    if ($booksdel>0) {
        unlink($yol);
        header("location:".$stlink."/pages/books.php");
        die();
    }
    
}
else
{
    header("location:".$stlink."/pages/books.php");
    die();
}


?>