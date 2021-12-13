<?php
echo rand(10000,10000000);
require_once('function/manage.php');

get_header();
get_sidebar();
$idd=$_GET['e'];
$sel="SELECT * FROM user_cr WHERE id='$idd'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);
if(!empty($_POST)){
  $eid=$_POST['eid'];
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $role=$_POST['role'];


  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
  $imageName='user_'.time().'_'.rand(10000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
}

  if(!empty($name)){

$update= "UPDATE user_cr SET user_name='$name',user_phone='$phone',user_email='$email',role_id='$role' WHERE id='$eid'";
  if(mysqli_query($con,$update)){
    if($image['name']!=''){
      $imgup="UPDATE user_cr SET  user_pic=$imageName WHERE id='$eid'";
mysqli_query($con,$imgup);
    move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);};
      header('Location:view.php?v='.$eid);}

  else{
    echo "REGISTRATION failed";
  }
}
  else {
  echo "Please Enter Your name";
}

}




 ?>
            <div class="row">
                        <div class="col-md-12 main_content">
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> update info</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> all user</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <br>

                                 <br>
                                <div class="card-body">
                                     <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Name:</label>
                                        <div class="col-sm-7">

                                          <input type="hidden" name="eid" value="<?= $data['id'];?>"/>
                                          <input type="text" class="form-control" id="" name="name" value="<?= $data['user_name'];?>">
                                        </div>
                                      </div>

                                      <div class="form-group row custom_form_group">
                                         <label class="col-sm-3 col-form-label">phone:</label>
                                         <div class="col-sm-7">
                                             <input type="text" class="form-control" id="" name="phone" value="<?= $data['user_phone'];?>">
                                         </div>
                                       </div>


                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="" name="email" value="<?= $data['user_email'];?>">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="" name="username" value="<?= $data['user_username'];?>"disabled>
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                         <label class="col-sm-3 col-form-label">User Role</label>
                                         <div class="col-sm-7">

                                           <select class="form-control"  name="role" value="<?= $data['role_name'];?>">
                                             <option value="">select role</option>
                                             <?php

                                               $selr="SELECT * FROM role ORDER BY role_id DESC";
                                               $Qr=mysqli_query($con,$selr);
                                               while ($urole=mysqli_fetch_assoc($Qr)) {
                                                 // code...
                                                 ?>
                                                 <option value="<?=$urole['role_id'];?>"<?php if($urole['role_id']==$data['role_id']){echo 'selected';}?>><?=$urole['role_name'];?></option>
                                             <?php  } ?>



                                         </div>
                                       </div>
                                         </div>
                                         <div class="form-group row custom_form_group">
                                            <label class="col-sm-3 col-form-label">File:</label>
                                            <div class="col-sm-7">
                                              <input type="file" class="" id="" name="pic">




                                              <?php
                                                if ($data['user_pic']!='') {?>
                                                  <img height="100" src="uploads/<?= $data['user_pic'];?>" alt="photo"/>
                                                  <?php
                                                }else {?>
                                                  <img height="1000" src="av/w.png" alt="photo"/><?php
                                                }
                                               ?>



                                            </div>
                                          </div>

                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark submit_btn">UPDATE</button>
                                </div>
                              </div>
                          </form>
                        </div>
                    </div>
<?php
get_footer();
 ?>
