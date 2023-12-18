<?php
    require_once 'includes/config_session.inc.php';
    // require_once '../includes/login.view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/auth.css">
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>

</head>
<body>
  <div class="back">
    <i class="fa-solid fa-arrow-left"></i>
    <a href="homepage.php">Back to homepage</a>
  </div>
    
    
    <h1>Login</h1>
    
<div class="container-fluid ps-md-0">
  <div class="row g-0 justify-content-center">
    <!-- <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div> -->
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>

              <!-- Sign In Form -->
              <form action="includes/login.inc.php" method="post">
                <div class="form-floating mb-3">
                  <!-- <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> -->
                  <input type="text" id="username" class="form-control" placeholder="Enter your username" name="username"/>
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <!-- <input type="password" class="form-control" id="floatingPassword" placeholder="Password"> -->
                  <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password"/>
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>

                <div class="d-grid">
                  <!-- <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button> -->
                  <button type="submit" name="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2">Login</button>
                  <div class="text-center">
                    <a class="small" href="#">Forgot password?</a>
                  </div>
                  <div class="text-center">
                    Don't have an account? <a class="small" href="admin_registration.php"><b>Registration</b></a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>