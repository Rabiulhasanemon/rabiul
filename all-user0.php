<?php
require_once('function/manage.php');
get_header();
get_sidebar();

?>
                    <div class="row">
                        <div class="col-md-12 main_content">
                            <div class="card">
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Table All Data</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                          <a class="btn btn-sm btn-dark card_top_btn" href="add-user.php"><i class="fa fa-plus-circle"></i> add user</a>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <table class="table table-bordered table-striped table-hover custom_table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Manage</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i=1;
                                      $sel="SELECT * FROM user_cr NATURAL JOIN role ORDER BY id DESC";
                                      $Q=mysqli_query($con,$sel);
                                      while($data=mysqli_fetch_assoc($Q)){
                                       ?>

                                      <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $data['user_name']; ?></td>
                                        <td><?=  $data['user_phone']; ?></td>
                                        <td><?php echo $data['user_email']; ?></td>
                                        <td><?php echo $data['user_username']; ?></td>
                                        <td><?php echo $data['role_name']; ?></td>
                                        <td>
                                          <?php
                                            if ($data['user_pic']!='') {?>
                                              <img height="50" src="uploads/<?= $data['user_pic'];?>" alt="photo"/>
                                              <?php
                                            }else {?>
                                              <img height="50" src="av/w.png" alt="photo"/><?php
                                            }
                                           ?>

                                        </td>
                                        <td>


                                            <a href="view.php?v=<?= $data['id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                            <a href="edit-user.php?e=<?= $data['id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                                            <a href="delete.php?d=<?= $data['id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="delete.php?d=<?= $data['id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                  </table>
                              </div>
                              <div class="card-footer text-center">
                                  .
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
 ?>
