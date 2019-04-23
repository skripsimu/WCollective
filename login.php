<?php 
session_start();
include('function/cek_login.php')
?>
<!DOCTYPE html>
<html lang="en">


<?php include 'head.php';?>

<body class="bg-gray-700">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <!-- <div class="card-body p-0"> -->
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">

                    <div class="sidebar-brand-text mx-3"><h1>Login Reporting</h1></div>
                    <br><br>                
                  </div>
                  <form class="user" method="POST" action=login.php>                  
                    <div class="username">
                      <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Username or Email" required>
                    </div><br>
                    <div class="password">
                      <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">                                         

                    </div>
                    <div class="btn btn-user btn-block">
                      <button type="submit" class="btn btn-secondary btn-user btn-block" name="login_user">Login</button>

                      <!-- <button type="submit" class="btn btn-primary btn-user btn-block" onClick="validasi()" name="login_user">Login</button> -->
                    </div>
                    <li class="btn btn-user btn-block">
                      <?php 
                      include('function/errors.php');
                      ?>
                    </li> 
                  </form>
                </div>
              </div>
              <!-- </div> -->
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

  </body>

  </html>
