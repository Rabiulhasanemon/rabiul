<?php
require_once('function/manage.php');
 get_header();
get_sidebar();
if(isset($_POST['update'])){
  $id=$_POST['id'];

  $upd="UPDATE user_cr SET user_name='$_POST[user_name]',user_phone='$_POST[user_phone]',user_email='$_POST[user_email]',user_username='$_POST[user_username]',user_password='$_POST[user_password]', WHERE id='$_POST[id]' ";

  if(mysqli_query($con,$upd)){
    echo "Update succesfully";}
    else {
      echo "Not success";
    }

}
?>

<div class="row">
            <div class="col-md-12 main_content">
                <form method="post" action="">
                  <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                  <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Form Design</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> all user</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="card-body">
                         <div class="form-group row custom_form_group">
                            <label class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="" name="name">
                            </div>
                          </div>

                          <div class="form-group row custom_form_group">
                             <label class="col-sm-3 col-form-label">phone:</label>
                             <div class="col-sm-7">
                               <input type="text" class="form-control" id="" name="phone">
                             </div>
                           </div>


                          <div class="form-group row custom_form_group">
                            <label class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control" id="" name="email">
                            </div>
                          </div>
                          <div class="form-group row custom_form_group">
                             <label class="col-sm-3 col-form-label">Username:</label>
                             <div class="col-sm-7">
                               <input type="text" class="form-control" id="" name="username">
                             </div>
                           </div>
                           <div class="form-group row custom_form_group">
                              <label class="col-sm-3 col-form-label">password:</label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" id="" name="pas">
                              </div>
                            </div>
                            <div class="form-group row custom_form_group">
                               <label class="col-sm-3 col-form-label">confirm Password:</label>
                               <div class="col-sm-7">
                                 <input type="text" class="form-control" id="" name="rpw">
                               </div>
                             </div>
                             <div class="form-group row custom_form_group">
                                <label class="col-sm-3 col-form-label">File:</label>
                                <div class="col-sm-7">
                                  <input type="file" class="" id="" name="pic">
                                </div>
                              </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-dark submit_btn">Update</button>
                    </div>
                  </div>
              </form>
