<?php

// creat student functionality
function create($conn, $param){
    extract($param);
    ## Validation start
    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } else if (empty($email)) {
        $result = array("error" => "email is required");
        return $result;
    } else if (empty($phone_no)) {
        $result = array("error" => "Phone is required");
        return $result;
    } else if (isEmailUnique($conn, $email)) {
        $result = array("error" => "Email is already registered");
        return $result;
    }else if (isPhoneValid($phone_no)) {
        $result = array("error" => "Please enter valid phone");
        return $result;
    }
    ## Validation end
    $dateTime=date("y-m-d H:i:s");
   $sql = "INSERT INTO `students`(`name`, `phone_no`, `email`, `address`, `created_at`) VALUES ('$name','$phone_no','$email','$address','$dateTime')";
   $result['success'] = $conn->query($sql);
   return $result;
}

//updated Student
function updateStudent($conn, $param){
    extract($param);
    ## Validation start
    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } else if (empty($email)) {
        $result = array("error" => "email is required");
        return $result;
    } else if (empty($phone_no)) {
        $result = array("error" => "Phone is required");
        return $result;
    } else if (isEmailUnique($conn, $email, $id)) {
        $result = array("error" => "Email is already registered");
        return $result;
    }else if (isPhoneValid($phone_no)) {
        $result = array("error" => "Please enter valid phone");
        return $result;
    }
    ## Validation end
    $dateTime=date("y-m-d H:i:s");
   $sql = "UPDATE `students` SET `name`='$name',`phone_no`='$phone_no',`email`='$email',`address`='$address',`updated_at`='$dateTime' WHERE id=$id";
   $result['success'] = $conn->query($sql);
   return $result;
}

// Get all Students
function getStudent($conn)
{
    $sql = "SELECT * FROM `students` order by `id` desc";    
    $result = $conn->query($sql);
    return $result;
}

// Get Student by id
function getStudentsById($conn, $id)
{
    $sql = "select * from students where id=$id";    
    $result = $conn->query($sql);
    return $result;
}
// Delete Student
function deletStudent($conn, $id){
    $sql= "DELETE FROM `students` WHERE id=$id";
    $result= $conn->query($sql);
    return $result;
}
// Update Status
function updateStudentStatus($conn, $id, $status){
    $sql= "UPDATE `students` SET `status`='$status' WHERE id=$id";
    $result= $conn->query($sql);
    return $result;
}

// Function to check Email Unique
function isEmailUnique($conn, $email, $id = NULL)
{
    $sql = "select id from students where email = '$email'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}
// Function to check Phone Valid
function isPhoneValid($phone_no)
{
   if(is_numeric($phone_no) &&(strlen($phone_no)== 10))
        return false;
    else return true;
}