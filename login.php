<?php
  require_once('function/manage.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
  </head>
  <body>
        <div class="container pt-3 login_main_part">
          <div class="row justify-content-sm-center">
            <div class="col-sm-6 col-md-4">

              <div class="card border-info text-center">
                <div class="card-header">
                  Sign in to continue
                </div>
                <div class="card-body">
                  <?php
                    if(!empty($_POST)){
                      $username=$_POST['username'];
                      $password=md5($_POST['password']);

                      $sel="SELECT * FROM user_cr WHERE user_username='$username' AND user_password='$password'";
                      $Q=mysqli_query($con,$sel);
                      $data=mysqli_fetch_assoc($Q);
                      if($data){
                        $_SESSION['id']=$data['id'];
                        $_SESSION['name']=$data['user_name'];
                        $_SESSION['email']=$data['user_email'];
                        $_SESSION['user']=$data['user_username'];
                        $_SESSION['role']=$data['role_id'];
                        header('Location:index.php');
                      }else{
                        echo "Username or password didn't match";
                      }
                    }
                  ?>
                  <h4 class="text-center">LOGIN</h4>
                  <form class="form-signin" method="post" action="">
                    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required autofocus>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                    <button class="btn btn-md btn-primary btn-block mb-1" type="submit">Sign in</button>
                    <label class="checkbox float-left">
                      <input type="checkbox" value="remember-me">
                      Remember me
                    </label>
                    <a href="#" class="float-right">Need help?</a>
                  </form>
                  <a href="#" class="float-right">Create an account </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>
