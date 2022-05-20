<?php
session_start();
require_once("settings.php");
require_once("function.php");

?>
<?php
if (isset($_SESSION["user"])) {
    header("Location:dashboard.php");
    die();
}
else{



if (isset($_POST["email"])) {
    $cmemaill= security($_POST["email"]);
}else
{
    $cmemaill="";
}
if (isset($_POST["password"])) {
    $cmpassword=md5(security($_POST["password"]));
    
} else {
  $cmpassword="";
}


/* --------------------------------------db - from control-----------------------------*/

if (($cmemaill!="") and ($cmpassword!="")) {
   $controlquery        =   $dbconnect->prepare("SELECT * FROM user where Email= ? AND Password = ?");
   $controlquery->execute([$cmemaill, $cmpassword]);
   $controlcount        =   $controlquery->rowCount();
   $userdata             =  $controlquery->fetch(PDO::FETCH_ASSOC);
   if ($userdata>0)
   {
       if ($userdata["Active"]==1) 
        {

            $_SESSION["user"] =$cmemaill;
            if ($_SESSION["user"]==$cmemaill) {
                 header("location:../pages/dashboard.php");
                   exit;
                  # code...
             }else{header("Location:../pages/sign-in.php"); die();}   

        }elseif ($userdata["Customer"]==1) {
            $_SESSION["user"] =$cmemaill;
            if ($_SESSION["user"]==$cmemaill) {
                 header("location:../pages/booksales.php");
                   exit;
                  # code...
             }else{header("Location:../pages/sign-in.php"); die();}   
            
        }else
        {
            header("Location:../pages/sign-in.php"); 
            die();
        }
   }
   else 
   {
    header("location:../pages/sign-in.php");
    exit;
   }  
}
else 
{
header("location:../pages/sign-in.php");
exit;
}
  






}





?>