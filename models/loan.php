<?php
// function to get Books Name
function getBooks($conn){
    $sql = "SELECT `id`, `title` FROM `books`";
    $result = $conn->query($sql);
    return $result;
}

// function to get Student Name
function getStudent($conn){
    $sql = "SELECT `id`, `name` FROM `students`";
    $result = $conn->query($sql);
    return $result;
}

// Add loans functionality
function create($conn, $param){
    extract($param);
    ## Validation start
    if (empty($book_id)) {
        $result = array("error" => "Book selection is required");
        return $result;
    } else if (empty($student_id)) {
        $result = array("error" => "Student selection is required");
        return $result;
    } 
    ## Validation end
    $dateTime=date("y-m-d H:i:s");
   $sql = "INSERT INTO `book_loans`(`book_id`, `student_id`, `loan_date`, `return_date`, `created_at`) VALUES ('$book_id','$student_id','$loan_date','$return_date','$dateTime')";
   $result['success'] = $conn->query($sql);
   return $result;
}// Get all Loans
function getLoans($conn)
{
    $sql = "select l.*, b.title as book_title, s.name as student_name 
        from book_loans l
        inner join books b on b.id = l.book_id
        inner join students s on s.id = l.student_id
        order by l.id desc;
    ";
    $result = $conn->query($sql);
    return $result;
}
// Function to update student status
function updateStatus($conn, $id, $status)
{
    $sql = "update book_loans set is_return = '$status' where id = $id";
    $result = $conn->query($sql);
    return $result;
}

//Function to delete
function delete($conn, $id)
{
    $sql = "delete from book_loans where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to get loan details
function getLoanById($conn, $id)
{
    $sql = "select * from book_loans where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update
function update($conn, $param)
{
    extract($param);
    ## Validation start
    if (empty($book_id)) {
        $result = array("error" => "Book selection is required");
        return $result;
    } else if (empty($student_id)) {
        $result = array("error" => "Student selection is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "UPDATE book_loans SET 
        book_id = '$book_id', 
        student_id = '$student_id', 
        loan_date = '$loan_date',
        return_date = '$return_date',
        updated_at = '$datetime'
        WHERE id = $id;
        ";
    $result['success'] = $conn->query($sql);
    return $result;
}


