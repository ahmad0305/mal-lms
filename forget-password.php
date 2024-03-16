
<?php
include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "models/auth.php");

if (isset($_SESSION['is_user_login'])) {
  header("LOCATION: " . BASE_URL . 'dashboard.php');
  exit;
} 
// Add studentf Functionality
// Login Functionality (admin@123)
if (isset($_POST['submit'])) {
  
  $res = forgotPassword($conn, $_POST);
  if ($res['status'] == true) {
    $_SESSION['success'] = "Reset password code sent successfully";
    header("LOCATION: " . BASE_URL . 'reset-password.php');
    exit();
  } else {
      $_SESSION['error'] = "Invalid Email";
      header("LOCATION: " . BASE_URL . 'forget-password.php');
      exit();
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
    <title>Forget Password MAL</title>
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
                  <p class="card-text">Enter email to reset password</p>
                  <?php include_once(DIR_URL . "include/alerts.php"); ?>

                  <form method="post" action="<?php echo BASE_URL ?>forget-password.php">
                    <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email">
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