<?php 
session_start();

include('header.php');
?>


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
          <div class="col-lg-6 d-none d-lg-block"  style="background-image: url('img/blood1.jpg');background-repeat:no-repeat; background-position: center; background-size: cover;"   ></div>
              <div class="col-lg-6 bg-gradient-white" >
                <div class="p-1">
                 <a href="index.php"> <div><center><img src="img/logo2.png" alt="Blood Bank Management" ></center></div></a>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  </div>
                    <h3>
                    <?php

                        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                        {
                          echo '<div class="alert alert-danger"> '.$_SESSION['status'].'</div>';
                          unset($_SESSION['status']);
                        }


                        ?>
                  </h3>
                  <form class="user" action="code.php" method="post">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div>
                    <button type="submit" name="admin-loginbtn" class="btn btn-danger btn-user btn-block">Login</button> 
                   <div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="registration.php">Create an Account!</a>
                  </div>
                </div>
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