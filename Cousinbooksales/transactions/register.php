<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../frameworks/PHPMailer/src/Exception.php';
require '../frameworks/PHPMailer/src/PHPMailer.php';
require '../frameworks/PHPMailer/src/SMTP.php';


require_once("settings.php");
require_once("function.php");
?>

<?php



if (isset($_POST["name"])) {
	$cmname   =security($_POST["name"]);
}else
{
	$cmname =	"";
}

if (isset($_POST["surname"])) {
	$cmsurname   =	security($_POST["surname"]);
}else
{
	$cmsurname =	"";
}
if (isset($_POST["sex"])) {
	$cmsex   =	security($_POST["sex"]);
}else
{
	$cmsex   =	"";
}

if (isset($_POST["email"])) {
	$cmemail   =	security($_POST["email"]);
}else
{
	$cmemail =	"";
}

if (isset($_POST["password"])) {
	$cmpassword   =		security($_POST["password"]);
}else
{
	$cmpassword =	"";
}
if (isset($_POST["passwordagain"])) {
	$cmpassworda   =	security($_POST["passwordagain"]);
}else
{
	$cmpassworda =	"";
}
if (isset($_POST["agreement"])) {
	$cmagr   =	security($_POST["agreement"]);
}else
{
	$cmagr   =	"";
}

$activationcode =actcode();
$md5password= md5($cmpassword);
if (($cmname!="") and ($cmsurname!="") and ($cmsex!="") and ($cmemail!="") and ($cmpassword!="") and ($cmpassworda!="") and ($cmagr!=""))
{
	if ($cmagr==0) {
		header("Location:".$stlink."/pages/sign-up.php");
		exit;
	}elseif ($cmpassword!=$cmpassworda) {		
		header("Location:".$stlink."/pages/sign-up.php");
		exit;
	}else
	{
		$controlquery       =   $dbconnect->prepare("select * from user where email =?");
        $controlquery->execute(array($cmemail));
        $controlcount       =$controlquery->rowCount();
		if ($controlcount>0) {		
			header("Location:".$stlink."/pages/sign-up.php");
			exit;
		}else
		{

		$adduserquery       =   $dbconnect->prepare("insert into user(Name,Surname,Sex,Email,Password,Status,Active,Customer,RegisterDate,RegisterIp,actcode) values(?,?,?,?,?,?,?,?,now(),?,?)");
        $adduserquery->execute(array($cmname,$cmsurname,$cmsex,$cmemail,$md5password,0,0,1,$ipaddres,$activationcode));
        $addusercount       =$adduserquery->rowCount();
		if ($addusercount>0) {

			header("Location:".$stlink."/pages/sign-in.php");
			exit;
			/*
		$maildetail ="Hello ".$cmname." ".$cmsurname." <br><br> ";
		$maildetail .="To confirm your membership, please
		<a href='".$stlink."/activation.php?ActivationCode=".$activationcode."&Email=" .$cmemail."'>
		 CLICK HERE
		 </a> <br><br>";
		$maildetail .="Have a nice day ";
		$maildetail .=$stemail;
		$sendmail = new PHPMailer(true);

		try {
			$sendmail->SMTPDebug = 0;
			$sendmail->isSMTP();
			$sendmail->Host       = "mail.localhost.com";                     //Set the SMTP server to send through
			$sendmail->SMTPAuth   = true; 									   //Enable SMTP authentication
			$sendmail->charset="utf-8";                               
			$sendmail->Username   = recycle($stemail);                     //SMTP username
			$sendmail->Password   = recycle($stpwd);                               //SMTP password
			$sendmail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
			$sendmail->Port       = 587; 
			$sendmail->SMTPOptions		=array(
												'ssl' =>array(
													'verify_peer' => false,
													'verify_peer_name' => false,
													'allow_sekf_signed' => true

												)

			);
			$sendmail->setFrom(recycle($stemail),recycle($stname));
			$sendmail->addAddress(recycle($cmemail),recycle($cmname." ".$cmsurname));
			$sendmail->addReplyTo(recycle($stemail),recycle($stname));
			$sendmail->isHTML(true); 
			$sendmail->Subject = recycle($stname).'New Acoount Activation';
			$sendmail->MsgHTML($maildetail);
			$sendmail->send();


		} catch (Exception $ErrorMessage) {
			echo "Message could not be sent. Mailer Error: {$ErrorMessage->getMessage()}";
		}
*/
		}else
		{
			header("Location:".$stlink."/pages/sign-up.php");
			exit;
		}

		} 
	}
}else
		{
			header("Location:".$stlink."/pages/sign-up.php");
			exit;
		}


?>