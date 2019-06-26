<?php 
session_start();

include('header.php');
?>

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-4 d-none d-lg-block " style="background-image: url('img/bd2.jpg');background-repeat:no-repeat; background-position: center; background-size: cover;"></div>
          <div class="col-lg-8">
            <div class="p-0">
              <dir"><center><img src="img/logo5.png" alt="Logo5"></center></dir>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create New Account!</h1>

              </div>
              <form class="user" action="code.php" method="post">
                <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="name" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="username" id="exampleLastName" placeholder="User name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="cofirm_pass" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="hidden" class="form-control form-control-user" name="usertype" id="exampleInputPassword" placeholder="usertype" value="user">
                  </div>
                 
                </div>
                <button type="submit" name="register_btn" class="btn btn-danger btn-user btn-block">
                  Register Account
                </button>
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php 
include('scripts.php');

?>
