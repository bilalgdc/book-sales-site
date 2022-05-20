<?php
       $page_title="HESAP AYARLARI";
       $css_array=array('<link rel="stylesheet" type="text/css" href="../assets/payment.css" />');
       $page_name="accountupdate";
    include '../hf/header.php';
?>



<?php

$id=$userr["id"];
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
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 ">
                <h6 class="text-white  text-capitalize ps-3" style="text-align:center" >Düzenle</h6>
              </div>
              -->
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

<!-- ----- form -->

<div class="row">
  <div class="col-75">
    <div class="container">
        
      <form role="form" action="<?php echo $stlink; ?>/transactions/users.php" method="post" >
        <input type="hidden" name="id" value="<?php echo $id ?>">


            <h3> HESAP AYARLARI</h3>
            <label for="Name"><i class="fas fa-file-signature"></i> Adı</label>
            <input  type="text" id="Name" name="Name" value="<?php echo $userdata["Name"]; ?>" >

            <label for="Surname"><i class="fas fa-file-signature"></i> Soyadı</label>
            <input  type="text"  id="Surname" name="Surname" value="<?php echo $userdata["Surname"]; ?>" >

            <label for="Email"><i class="fas fa-file-signature"></i> Email</label>
            <input  type="text"  id="Email" name="Email" value="<?php echo $userdata["Email"]; ?>" >

            <label for="Password"><i class="fas fa-file-signature"></i> Şifre. ( Şifrenizi Güncellemek İstemiyorsanız Boş Bırakın !)</label>
            <input type="password" id="Password" name="Password" placeholder="*****" value="">
            
            <label for="sex"><i class="fas fa-file-signature"></i> Cinsiyet</label>

            <Select  style="background-color:lightgrey; color: black; " id="sex" name="sex" class="form-control">
            <option  value="<?php echo $userdata["Sex"];  ?>"><?php echo $userdata["Sex"];  ?></option>
            <option value="not">Not specified</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </Select>




            <div class="text-center">
                    <button type="submit" class="btn btn-secondary btn-outline-Secondary w-100 my-4 mb-2">Güncelle</button>
                  </div> 
                  <div class="text-center">
                    <a href="adress.php?id=<?php echo $userr["id"] ?>" class="btn btn-secondary  w-100 my-4 mb-2">Adresim</a>
                    </div>
                  <?php
                  if ($userdata["Active"]==1) {
                  ?> 
                  
                  <div class="text-center">
                    <a href="dashboard.php" class="btn btn-secondary   w-100 my-4 mb-2">Geri</a>
                </div>

                <?php
                  }else {
                ?>


                    <div class="text-center">
                    <a href="booksales.php" class="btn btn-secondary w-100 my-4 mb-2">Geri</a>
                    </div>


               <?php
                  }
                ?>



          
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
?>
   

