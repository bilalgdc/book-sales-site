<?php
    $page_title="KULLANICI GÜNCELLE";
    $page_name="kullanicilar";
    $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
    include '../hf/header.php';
    if($userr["Status"]==1 || $userr["Active"]==1 || $userr["Customer"]==1){  

    

?>



<?php

if (isset($_GET["id"])) {
   $id=$_GET["id"];
}
else {
    header("locatin:".$stlink."/pages/tables.php");
    exit;
}
$users    = $dbconnect->prepare("select * from user where id= ?");
$users->execute([$id]);
$userdata =$users->fetch(PDO::FETCH_ASSOC);

?>


   
<!--              -----------------------------------------------------    -->
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <!--
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="text-align:center">Kullanıcılar</h6>
              </div>
                -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->
<div class="row">
  <div class="col-75">
    <div class="container">

<form role="form" class="text-start" action="<?php echo $stlink; ?>/transactions/users.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>">

            <h3> Kullanıcı Güncelle</h3>
            <label for="Name"><i class="fa fa-user"></i> Adı</label>
            <input type="text" id="Name" name="Name" value="<?php echo $userdata["Name"]; ?>">

            <label for="Surname"><i class="fa fa-user"></i> Soyadı</label>
            <input type="text" id="Surname" name="Surname" value="<?php echo $userdata["Surname"]; ?>">

            <label for="Email"><i class="fa fa-user"></i> Email</label>
            <input type="email" id="Email" name="Email" value="<?php echo $userdata["Email"]; ?>">

            <label for="Password"><i class="fa fa-user"></i> Şifre Güncelleme. ( Şifrenizi Güncellemek İstemiyorsanız Boş Bırakın !)</label>
            <input type="password" id="Password" name="Password" placeholder="*****" >
            

            <label for="sex"><i class="fa fa-user"></i> Cinsiyet</label>
            <Select style="background-color:lightblue; color:black; " id="sex" name="sex" class="form-control" value ="">
                <option value="<?php echo $userdata["Sex"];  ?>"><?php echo $userdata["Sex"];  ?></option>
                <option value="not">Not specified</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </Select>


                    <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input  type="checkbox"   class="form-check-input" id="Active" name="Active"<?php if($userdata["Active"]==1) echo 'checked'?> >
                    <label class="form-check-label mb-0 ms-2" for="Status">Aktiflik</label>
                  </div>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input type="checkbox"  class="form-check-input" id="Status" name="Status"  <?php if($userdata["Status"]==1) echo 'checked'?>>
                    <label class="form-check-label mb-0 ms-2" for="Status">Yönetici</label>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input type="checkbox"  class="form-check-input" id="Customer" name="Customer"  <?php if($userdata["Customer"]==1) echo 'checked'?>>
                    <label class="form-check-label mb-0 ms-2" for="Status">Müşteri</label>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Güncelle</button>
                  </div>

                  <div class="text-center">
                    <a href="tables.php" class="btn bg-gradient-primary w-100 my-4 mb-2">Geri</a>
                </div>
                  </form>


              </div>
            </div>
          </div>

        </div>
      </div>
      </div>
      </div>
      </div>
    </div>




<!--             -----------------------------------------------------     -->
<?php
include '../hf/footer.php';
}else {
  header("location:".$stlink."/transactions/exit.php");
  exit();
}
?>
   

