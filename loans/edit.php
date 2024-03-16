<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/loan.php");

// Add studentf Functionality
if (isset($_POST['submit'])) {
    $res = update($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Book loan has been updated successfully";
        header("LOCATION: " . BASE_URL . "loans");
        exit();
    } else {
       $_SESSION['error'] = $res['error']; //"Something went wrong, please try again. ";
        header("LOCATION: " . BASE_URL . "loans/edit.php");
        exit();
    }
}
if(isset($_GET['id']) && $_GET['id']>0 ){
    $getLoan = getLoanById($conn, $_GET['id']);
    if($getLoan->num_rows>0){
        $loans= mysqli_fetch_assoc($getLoan);
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
                             
                    <h4 class="fw-bold text-uppercase">Edit Loans</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>                               
                 </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo BASE_URL ?>/loans/edit.php">
                            <input type="hidden" name="id" value="<?php echo $loans['id'] ?>">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label  class="form-label">Slect Book</label>
                                            <?php 
                                             $bname = getBooks($conn);
                                            ?>
                                            <select name="book_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php
                                            $selected=""; 
                                            while($row=$bname->fetch_assoc()){ 
                                                if($row['id'] === $loans['book_id'])
                                                $selected='selected';
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo  $row['id'] ?>"><?php echo  $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Slect Student</label>
                                            <?php $sname =getStudent($conn); ?>
                                            <select name="student_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php 
                                            $selected="";
                                             while($row=$sname->fetch_assoc()) {
                                               
                                                if($row['id'] === $loans['student_id'])
                                                    $selected='selected';
                                                
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo  $row['id'] ?>"><?php echo  $row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label  class="form-label">Loan Date</label>
                                            <input type="date" value="<?php echo $loans['loan_date'] ?>" class="form-control" name="loan_date" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Return/Due Date</label>
                                            <input type="date" value="<?php echo $loans['return_date'] ?>" class="form-control" name="return_date" required />
                                      </div>
                                    </div>
            
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success">Update</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
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