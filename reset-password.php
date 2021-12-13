<?php

require_once('function/manage.php');

get_header();
get_sidebar();
$idd=$_GET['p'];
$sel="SELECT * FROM user_cr WHERE id='$idd'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);
$old_pass=$data['user_password'];
if(!empty($_POST)){
  $eid=$_POST['eid'];
$opass=$_POST['opass'];
$pass=$_POST['pass'];
$rpass=$_POST['rpass'];

if(!empty($opass)){
  if(!empty($pass)){
    if(md5($opass)===$old_pass){
      if($pass===$rpass){
        $copass=md5($opass);
        $cpass=md5($pass);
        $crpass=md5($rpas);

$update="UPDATE user_cr SET user_password='$cpass' WHERE id='$idd'";
        if(mysqli_query($con,$update)){
          header('Location:view.php?v='.$eid);
        }else{
          echo "Password Reset Failed";
        }

      }echo "New Password Did Not Match";

    }else {
      echo " Old Password Did Not Match";
    }

  }else {
    echo "Please Enter New Password";
  }

}else{
  echo "Please Enter Old Password";
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
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Reset Password</h4>
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
                                        <label class="col-sm-3 col-form-label">old Password:</label>
                                        <div class="col-sm-7">

                                          <input type="hidden" name="eid" value="<?=$data['id'];?>"/>
                                          <input type="text" class="form-control" id="" name="opass" value="" required>
                                        </div>
                                      </div>

                                      <div class="form-group row custom_form_group">
                                         <label class="col-sm-3 col-form-label">Password:</label>
                                         <div class="col-sm-7">
                                             <input type="text" class="form-control" id="" name="pass" value="" required>
                                         </div>
                                       </div>


                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Re-Password:</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="" name="rpass" value="" required>
                                        </div>
                                      </div>


                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark submit_btn">Update Password</button>
                                </div>
                              </div>
                          </form>
                        </div>
                    </div>
<?php
get_footer();
 ?>
