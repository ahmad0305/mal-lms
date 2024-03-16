<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/book.php");


// Add Book Functionality
// Update Book Functionality
if (isset($_POST['update'])) {
    //print_r($_POST); exit();
    $res = updateBook($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Book has been updated successfully";
        header("LOCATION: " . BASE_URL . "books");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "books/edit.php");
        exit;
    }
}
if(isset($_GET['id']) && $_GET['id']>0 ){
    $getBook = getBooksById($conn, $_GET['id']);
    if($getBook->num_rows>0){
        $books= mysqli_fetch_assoc($getBook);
    }
} else{
    header("LOCATION: " . BASE_URL . "books");
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
                             
                    <h4 class="fw-bold text-uppercase">Edit Book</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>                               
                 </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo BASE_URL ?>/books/edit.php">
                            <input type="hidden" name="id" value="<?php echo $books['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Book Title</label>
                                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $books['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">ISBN Number</label>
                                            <input type="text" name="isbn" class="form-control" id="exampleInputPassword1" required value="<?php echo $books['isbn'] ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Author Name</label>
                                            <input type="text" name="author" class="form-control" id="exampleInputPassword1" required value="<?php echo $books['author'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Publisher Year</label>
                                            <input type="text" name="publication_year" class="form-control" id="exampleInputPassword1" required value="<?php echo $books['publication_year'] ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Category / Course</label>                                           
                                            <?php 
                                             $catt = getCotegaries($conn);
                                            ?>  
                                            <select name="category_id" class="form-control" required>
                                                <option value="">Please select</option>
                                                <?php $selected='';
                                                while($row=$catt->fetch_assoc()){
                                                    
                                                    if ($row['id'] === $books['category_id'])
                                                    $selected = "selected";

                                                ?>
                                                    ?>

                                                <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                            <button name="update" class="btn btn-primary btn-sm">Update</button>
                                            <a href="<?php echo BASE_URL ?>books" class="btn btn-danger btn-sm">Close</a>
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