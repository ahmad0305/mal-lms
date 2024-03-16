<?php
    include_once("../config/config.php");
    include_once(DIR_URL . "config/database.php");
    include_once(DIR_URL . "include/middleware.php");
    include_once(DIR_URL . "models/book.php");
    $result = getBooks($conn);
    if(!isset($result->num_rows)){
        $_SESSION['error'] = "Eroor :" . $conn->error;
    }
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){ 
    $delete = deletBooks($conn, $_GET['id']);
     if ($delete) {
        $_SESSION['success'] = "Book has been deleted successfully";        
    } else {
       $_SESSION['error'] ="Something went wrong, please try again. ";        
    }
     header("LOCATION: " . BASE_URL . "books");
    exit();
    }
    // update status
    ## Status update of Books
if (isset($_GET['action']) && $_GET['action'] == 'status') {
    $update = updateBookStatus($conn, $_GET['id'], $_GET['status']);
    if ($update) {
        if ($_GET['status'] == 1)
            $msg = "Book has been successfully activated";
        else $msg = "Book has been successfully deactivated";

        $_SESSION['success'] = $msg;
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: " . BASE_URL . "books");
    exit;
}


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
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                    <h4 class="fw-bold text-uppercase">Manage Book</h4>           
                 </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          All Books
                        </div>
                        <div class="card-body">
                            <table id="book-table" class="table table-responsive table-striped" style="width:100%">
                                <thead class="table-dark">
                                    <tr style="background:black !important;">
                                    <th scope="col">#</th>
                                        <th scope="col">Book Name</th>
                                        <th scope="col">Publication Year</th>
                                        <th scope="col">Author Name</th>
                                        <th scope="col">ISBN No</th>
                                        <th scope="col">Cat Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if($result->num_rows>0){
                                        $i=1;
                                        while($row=$result->fetch_assoc()){
                                            ?>
                                            <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['publication_year'] ?></td>
                                        <td><?php echo $row['author'] ?></td>
                                        <td><?php echo $row['isbn'] ?></td>
                                        <td><?php echo $row['cat_name'] ?></td>                                        
                                        <td><?php
                                            if($row['status'] == 1)
                                            echo '<span class="badge text-bg-success">Active</span>';
                                                    else echo '<span class="badge text-bg-danger">Inactive</span>';
                                              ?>
                                            
                                        <td><?php echo date("d-m-Y h:i A", strtotime($row['created_at'])) ?></td>
                                        <td>
                                            <a href="<?php echo BASE_URL ?>books/edit.php?action=edit&id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you Soure?')" href="<?php echo BASE_URL ?>books?action=delete&id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm">Delete</a>
                                            <?php if ($row['status'] == 1) { ?>
                                                        <a href="<?php echo BASE_URL ?>books?action=status&id=<?php echo $row['id'] ?>&status=0" class="btn btn-warning btn-sm">
                                                            Inactive
                                                        </a>
                                                    <?php }
                                                if ($row['status'] == 0) {  ?>

                                                        <a href="<?php echo BASE_URL ?>books?action=status&id=<?php echo $row['id'] ?>&status=1" class="btn btn-success btn-sm">
                                                            Active
                                                        </a>
                                                       

                                        </td>
                                        <?php } ?>
                                      </tr> 
                                            
                                            <?php
                                        }
                                    } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                      </div>
                 </div>        
            </div>
        </div>
    </main>    
    <!-- main content End -->
    <?php include_once(DIR_URL . "include/footer.php"); ?>