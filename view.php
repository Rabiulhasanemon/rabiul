
<?php
require_once('function/manage.php');
get_header();
get_sidebar();
$idd=$_GET['v'];
$sel="SELECT * FROM user_cr NATURAL JOIN role WHERE id='$idd'";
$Q=mysqli_query($con,$sel);
$info=mysqli_fetch_assoc($Q);

 ?>
                    <div class="row">
                        <div class="col-md-12 main_content">
                            <div class="card">
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Data</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                          <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All User</a>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-2"></div>
                                      <div class="col-md-8">
                                          <table class="table table-bordered table-striped table-hover custom_view_table">
                                              <tr>
                                                  <td>Name</td>
                                                  <td>:</td>
                                                  <td><?= $info['user_name'];?></td>
                                              </tr>
                                              <tr>
                                                  <td>Phone</td>
                                                  <td>:</td>
                                                  <td><?=$info['user_phone'];?></td>
                                              </tr>
                                              <tr>
                                                  <td>Email</td>
                                                  <td>:</td>
                                                  <td><?=$info['user_email'];?></td>
                                              </tr>
                                              <tr>
                                                  <td>Username</td>
                                                  <td>:</td>
                                                  <td><?=$info['user_username'];?></td>
                                              </tr>
                                              <tr>
                                                  <td>Role</td>
                                                  <td>:</td>
                                                  <td><?=$info['role_name'];?></td>
                                              </tr>

                                              <tr>

                              <td>Photo</td>
                              <td>:</td>
                              <td>
                                <?php if($info['user_pic']!=''){ ?>
                                  <img height="100" src="uploads/<?= $info['user_pic']; ?>" alt="photo"/>
                                <?php }else{ ?>
                                  <img height="100" src="images/w.png" alt="photo"/>
                                <?php } ?>
                              </td>
                          </tr>






                                    </table>
                                      </div>
                                      <div class="col-md-2"></div>
                                  </div>
                              </div>
                              <div class="card-footer text-center">
                                  .
                              </div>
                            </div>
                        </div>
                    </div>

<?php
get_footer();

 ?>
