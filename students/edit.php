<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/student.php");


// Add Book Functionality
// Update Book Functionality
if (isset($_POST['update'])) {
    //print_r($_POST); exit();
    $res = updateStudent($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Student has been updated successfully";
        header("LOCATION: " . BASE_URL . "students");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "students/edit.php");
        exit;
    }
}
if(isset($_GET['id']) && $_GET['id']>0 ){
    $getBook = getStudentsById($conn, $_GET['id']);
    if($getBook->num_rows>0){
        $student= mysqli_fetch_assoc($getBook);
    }
} else{
    header("LOCATION: " . BASE_URL . "students");
    exit();
}
?>
<?php
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");
?>
    <!-- Main content start -->
    
    <main class="mt-1 pt-3">
      <!-- Card -->
        <div class="container-fluid">
        <!-- Card -->
            <div class="row dashboard-count">
                <div class="col-md-12"> 
                             
                    <h4 class="fw-bold text-uppercase">Edit Student</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>                               
                 </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo BASE_URL ?>/students/edit.php">
                            <input type="hidden" name="id" value="<?php echo $student['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $student['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Phone No</label>
                                            <input type="text" name="phone_no" class="form-control" id="exampleInputPassword1" required value="<?php echo $student['phone_no'] ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" id="exampleInputPassword1" required value="<?php echo $student['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="exampleInputPassword1" required value="<?php echo $student['address'] ?>">
                                      </div>
                                    </div>                                   
                                    <div class="col-md-12">
                                            <button name="update" class="btn btn-primary btn-sm">Update</button>
                                            <a href="<?php echo BASE_URL ?>students" class="btn btn-danger btn-sm">Close</a>
                                    </div>
                                </div>
                              </form>
                        </div>
                      </div>
                 </div>        
            </div>
        </div>
    </main>
    
    <!-- main content End -->
    <?php include_once(DIR_URL . "include/footer.php"); ?>