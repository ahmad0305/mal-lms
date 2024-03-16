<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/book.php");

// Add Book Functionality
if (isset($_POST['publish'])) {
    $res = storeBook($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Book has been created successfully";
        header("LOCATION: " . BASE_URL . "books");
        exit();
    } else {
       $_SESSION['error'] = $res['error']; //"Something went wrong, please try again. ";
        //header("LOCATION: " . BASE_URL . "books/add.php");
    }
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
                             
                    <h4 class="fw-bold text-uppercase">Add Book</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>                               
                 </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo BASE_URL ?>/books/add.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Book Title</label>
                                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">ISBN Number</label>
                                            <input type="text" name="isbn" class="form-control" id="exampleInputPassword1" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Author Name</label>
                                            <input type="text" name="author" class="form-control" id="exampleInputPassword1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Publisher Year</label>
                                            <input type="text" name="publication_year" class="form-control" id="exampleInputPassword1" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Category / Course</label>                                           
                                            <?php 
                                             $catt = getCotegaries($conn);
                                            ?>  
                                            <select name="category_id" class="form-control">
                                                <option value="">Please select</option>
                                                <?php while($row=$catt->fetch_assoc()){ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="publish" class="btn btn-success">Publish</button>
                                        <button type="submit" class="btn btn-secondary">Reset</button>
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