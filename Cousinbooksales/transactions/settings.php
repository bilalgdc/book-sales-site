<?php
	try {
        $dbconnect=new PDO("mysql:host=localhost;dbname=databaseproject;charset=utf8;","root","");
	} catch (PDOException $ErrorMessage) {
		echo "fail..> ".$ErrorMessage->getMessage();
        die();
	}
    $stq    =   $dbconnect->prepare("select * from settings LIMIT 1");
    $stq->execute();
    $stcount    =   $stq->rowCount();
    $setting    =   $stq->fetch(PDO::FETCH_ASSOC);
     if ($stcount>0) {

         $stname    = $setting["SiteName"];
         $sttl      = $setting["SiteTitle"];
         $stdc      = $setting["SiteDescription"];
         $stkw      = $setting["SiteKeywords"];
         $stcpy     = $setting["SiteCopyright"];
         $stlg      = $setting["SiteLogo"];
         $stemail   = $setting["SiteEmail"];
         $stpwd     = $setting["SiteEmailPassword"];
         $stagr     = $setting["SiteAgreement"];
         $stlink    = $setting["SiteLink"];
         $stinimg   = $setting["SiteInimg"];
         $stupimg   =$setting["SiteUpimg"];
     }else
     {
         header("Location:".$stlink."/pages/sign-up.php");
         die();
     }
    
/*
     if (isset($_SESSION["user"])) {
      

        $userquery       =   $dbconnect->prepare("select * from user where Email =".$SESSION["user"]."LIMIT 1");
        $userquery->execute();
        $usercount       =$userquery->rowCount();
        $user            =$userquery->fetch(PDO::FETCH_ASSOC);
       
        if ($usercount>0) {
           
            $userid =$user["id"];
            $username =$user["Name"];
            $usersurname =$user["Surname"];
            $useremail =$user["Email"];
            $userpassword =$user["Password"];
            $usersex =$user["Sex"];
            $userstatus =$user["Status"];
            $userrgdt =$user["RegisterDate"];
            $userrgip =$user["RegisterIp"];
            $useractcode= $user["actcode"];
        }
        else
        {
            header("Location:".$stlink."/pages/sign-up.php");
            die();
        }
    
     }

	
*/








	
	?>

