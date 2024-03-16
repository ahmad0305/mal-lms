<?php

// Add books functionality
function storeBook($conn, $param){
    extract($param);
    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($isbn)) {
        $result = array("error" => "ISBN is required");
        return $result;
    } 
    else if (isIsbnUnique($conn, $isbn)) {
        $result = array("error" => "ISBN is already registered");
        return $result;
    }
    ## Validation end
    $dateTime=date("y-m-d H:i:s");
   $sql = "INSERT INTO `books`(`title`, `author`, `publication_year`, `isbn`, `category_id`,`created_at`) VALUES ('$title','$author','$publication_year','$isbn',$category_id,'$dateTime')";
   $result['success'] = $conn->query($sql);
   return $result;
}

//updated books
function updateBook($conn, $param){
    extract($param);
    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($isbn)) {
        $result = array("error" => "ISBN is required");
        return $result;
    } else if (isIsbnUnique($conn, $isbn, $id)) {
        $result = array("error" => "ISBN is already registered");
        return $result;
    }
    ## Validation end
    $dateTime=date("y-m-d H:i:s");
   $sql = "UPDATE `books` SET `title`='$title',`author`='$author',`publication_year`='$publication_year',`isbn`='$isbn',`category_id`='$category_id',`updated_at`='$dateTime' WHERE id=$id";
   
   $result['success'] = $conn->query($sql);
   return $result;
}

// function to get categories
function getCotegaries($conn){
    $sql = "SELECT `id`, `name` FROM `categories`";
    $result = $conn->query($sql);
    return $result;
}
// Get all books
// Function to check isbn no
function getBooks($conn)
{
    $sql = "select b.*, c.name as cat_name from books b left join categories c
    on c.id=b.category_id order by id desc";    
    $result = $conn->query($sql);
    return $result;
}

// Get Book by id
function getBooksById($conn, $id)
{
    $sql = "select * from books where id=$id";    
    $result = $conn->query($sql);
    return $result;
}
// Delete book
// function to get categories
function deletBooks($conn, $id){
    $sql= "DELETE FROM `books` WHERE id=$id";
    $result= $conn->query($sql);
    return $result;
}
// UPdate Status
function updateBookStatus($conn, $id, $status){
    $sql= "UPDATE `books` SET `status`='$status' WHERE id=$id";
    $result= $conn->query($sql);
    return $result;
}

// Function to check isbn no
function isIsbnUnique($conn, $isbn, $id = NULL)
{
    $sql = "select id from books where isbn = '$isbn'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}