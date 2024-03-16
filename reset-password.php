<?php
include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "models/auth.php");

if (isset($_SESSION['is_user_login'])) {
  header("LOCATION: " . BASE_URL . 'dashboard.php');
  exit;
} 
// Forgot password functionality
if (isset($_POST['submit'])) {
  $res = resetPassword($conn, $_POST);
  if ($res['status'] == true) {
      $_SESSION['success'] = $res['message'];
      header("LOCATION: " . BASE_URL);
      exit;
  } else {
      $_SESSION['error'] = $res['message'];
      header("LOCATION: " . BASE_URL . 'reset-password.php');
      exit;
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Reset Password MAL</title>
  </head>
  <body style="background: #212529;">
    <div class="container d-flex align-items-center justify-content-center vh-100">
      <div class="row">
        <div class="col-md-12 login-form">
          <div class="card mb-3" style="max-width: 800px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="./assets/images/loin.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h2 class="card-title text-uppercase fw-bold">Maulana Ajad Liabarary</h2>
                  <?php include_once(DIR_URL . "include/alerts.php"); ?>

                  <p class="card-text">Reset password</p>

                  <form method="post" action="<?php echo BASE_URL ?>reset-password.php">
                    <div class="mb-3">
                        <label  class="form-label">Reset Password code</label>
                        <input type="password" class="form-control" name="reset_code">
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="conf_pass">
                      </div>                  
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <hr>
                  <a href="./index.php" class="card-link link-underline-light">Login Now</a>

                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div> 
    <script src="./assets/js/bootstrap.bundle.min.js" ></script>
    <script src="./assets/js/awesome.min.js"></script>
  </body>
</html>