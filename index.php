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
  $res = getLogin($conn, $_POST);
  if ($res['status'] == true) {
      $_SESSION['is_user_login'] = true;
      $_SESSION['user'] = $res['user'];
      header("LOCATION: " . BASE_URL . 'dashboard.php');
      exit;
  } else {
      $_SESSION['error'] = "Invalid login information";
      header("LOCATION: " . BASE_URL);
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
    <title>Login MAL</title>
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
                  <p class="card-text">Enter email and password to login</p>

                  <form method="post" action="<?php echo BASE_URL ?>">
                    <div class="mb-3">
                      <label  class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" required>
                    </div>                    
                    <button type="submit" name="submit" class="btn btn-primary">Ligin</button>
                  </form>
                  <hr>
                  <a href="./forget-password.php" class="card-link link-underline-light">Forget password?</a>

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