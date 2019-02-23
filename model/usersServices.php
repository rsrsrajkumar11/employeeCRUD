<?php
@session_start(); //testing mode

// insert data in table for registration
function insertOne($email,$name,$mob,$password) {
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "INSERT INTO users(email, name, mob, password)  VALUES ('$email','$name','$mob','$password');";
    if($conn->query($sql)){
        array_push($success,"User successfully added in database");
    }else{
        array_push($errors," Something went wrong, data is not added in database");
    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

// fetch one record of user
function fetchOne() {
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "select * from users where id =".$_SESSION['id'].";";
    $result=$conn->query($sql);

    if($result->num_rows){
        // array_push($success,"User successfully added in database");
        $data[]=$result->fetch_assoc();
        array_push($success,"Data retrive from database.");
    }else{
        array_push($errors,"No data found");
    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

// validate user with password
function validateUser($email,$password) {
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "SELECT  id FROM users where email='$email' and password='$password' ;";

    $result=$conn->query($sql);
    if($result->num_rows){
        $data[]=$result->fetch_assoc();
        array_push($success,"Data retrive from database.");
    }else{
        array_push($errors,"Email or password is incorrect.");
    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

// update one record
function updateOne($id,$email,$name,$mob,$password) {
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "UPDATE users SET email='$email',name='$email',mob='$mob',password='$password' WHERE id=$id;";
    if(! $conn->query($sql)){
        array_push($errors," Something went wrong, data is not updated in database");
    }
    
    if($conn->affected_rows===1){
        array_push($success,"Your data has been successfully");
    }else{
        array_push($errors," Something went wrong or no data to updated");

    }

    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

// update password
function updatePass($password,$oldpassword) {
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "UPDATE users SET password='$password' WHERE id=".$_SESSION['id']." and password='$oldpassword' ;" ;
    if($conn->query($sql)){
        if($conn->affected_rows===1){
            array_push($success,"Password changed successfully");
        }else{
            array_push($errors,"Current password mimatch or same password as before.");
        }
    }else{
        array_push($errors," Something went wrong, data is not updated in database");

    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

// insert email and new code in table
function insertForgotCode($code,$email){
    include "../model/databaseConfig.php";
    
    $errors=array();
    $success=array();
    
    $sql = "insert into passRecovery (email,uniqueCode) values ('$email' , '$code');" ;
    if( $conn->query($sql) ){
        if( $conn->affected_rows===1){
            array_push($success,"code added in database");
        }
    else{
            array_push($errors,"Error: data not added in database");
        }
    }else{
        array_push($errors," Something went wrong.");

    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

// check existing code in table 
function checkForgotCodeExist($email){
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
   $sql= "SELECT 1 from passRecovery where email='$email' ;";
  
   $result=$conn->query($sql);
    if($result->num_rows){
        array_push($errors,"Code exist in database.");
    }else{
        array_push($success,"Code does not exist in database.");
    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse;
}

// update password in user table if valid
function validateUpdateCode($email,$code,$password){
    include "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $sql ="update users set PASSWORD='$password' where email='$email' and EXISTS ( SELECT 1 from passRecovery where  email='$email' and uniqueCode='$code') ;";
    if(!$conn->query($sql)){
        array_push($errors,"Error while executing query");
    }
    
    if($conn->affected_rows){
        array_push($success,"Password updated successfully.");
    }else{
        array_push($errors,"Error : Same password as previous or error in updation ");
    }
    
    $conn->close();
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

/*
modular testing and experementation
*/
// echo __DIR__.__FILE__;
// echo '<pre>';
// print_r( json_decode( checkForgotCodeExist('rsrsrajkumar11@gmail.com') ) );
// echo  checkForgotCodeExist('rsrsrajkumar11@gmail.com');
// echo updatePass(md5('123'));
// echo 'start';
// print_r($_SESSION);



?>