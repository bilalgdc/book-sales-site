<?php
date_default_timezone_set('Europe/Istanbul');
$ipaddres    =    $_SERVER["REMOTE_ADDR"];
$tmprd       =    time();
$datclck     =    date("d.m.Y H:i:s",$tmprd);

function Security($value)
{
    $spacedel   = trim($value);
    $tagdel     =  strip_tags($spacedel);
    $inactive   =  htmlspecialchars($tagdel);
    $finishset  = $inactive;
    return $finishset;
}
function recycle($value)
{
    $back  =htmlspecialchars_decode($value,ENT_QUOTES);
    $fnshrc= $back;
    return $fnshrc;

}

function actcode()
{
    return rand(1000,9999);
}



?>
<html>
<script type="text/javascript">

function fonkagrmnt()
{
  window.alert('   Accept Agreement !   ');
}
function fonkpwd()
{
  window.alert('   Passwords Are Not The Same !   ');
}
function fonkemailsm()
{
  window.alert('  Email is used !   ');
}
function fonkerror()
{
  window.alert('  Something Went Wrong ! ');
}
function fonkuseradd()
{
  window.alert('  Registration Successful ! ');
}function fonkusersign()
{
  window.alert('  girişyapmış ! ');
}





</script>
</html>