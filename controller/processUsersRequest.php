<?php
@session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include './helper.php';
include '../model/usersServices.php';

// login validation
if(!empty($_POST['login'])){

    $username=$password=$res='';
    $errors=array();
    $success=array();
    $data=array();

    if(empty($_POST['username'])){
        array_push($errors,"Email : Can not be empty.");
    }else{
        $username=filter($_POST['username']);
        if(!isValidEmail($username)){
            array_push($errors,"Email: Should be in valid format.");
        }
    }

    if(empty($_POST['password'])){
        array_push($errors,"Password : Can not be empty.");
    }else{
        $password=filter($_POST['password']);
    }

    if(count($errors)==0){
        $res=validateUser($username,md5($password));
    }

    $res=json_decode($res);
    if(count($res->errors)!=0)
        array_push($errors ,$res->errors);
    
    if(count($res->success)!=0)
        array_push($success,$res->success);
    
    if(count($res->data)!=0){
        array_push($data,$res->data);
        $_SESSION['id']=$data[0][0]->id;
    }
    
    $userResponse=array('errors'=>$errors,'success'=>$success,'data'=>$data);
    echo json_encode($userResponse);
    die();

}

// check login and fetch user details
if(isset($_POST['islogin'])){
    if(isset($_SESSION['id'])){
        echo '1';
    }else{
        echo '0';    
    }
    die();
}

// logout
if(isset($_POST['logout'])){
    session_destroy();
    echo json_encode(array('errors'=>array(),'success'=>array('success')));
}

// change password
if(isset($_POST['changepassword']) && isset($_SESSION['id'])){
    $oldpassword=$password="";
    $errors=array();
    $success=array();
    
    if( empty($_POST['oldpassword']) ){
        array_push($errors,"Old Password : Can not be empty.");
    }else{
        $oldpassword=filter( $_POST['oldpassword'] );
    }
    
    if(empty($_POST['password'])){
        array_push($errors,"New Password : Can not be empty.");
    }else{
        if($_POST['password'] === $_POST['rePassword']){
            $password=filter($_POST['password']);
        }else{
            array_push($errors,"Password : Password and Repassword must match.");
        }
    }

    if(count($errors)==0){
        $res=  json_decode(updatePass(md5($password),md5($oldpassword) ));
        
        if(count($res->errors)!=0)
            array_push($errors ,$res->errors);
    
        if(count($res->success)!=0)
            array_push($success,$res->success);
    }

    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();
    
}

// new user registration
if(!empty($_POST['registration'])){
    $email=$name=$mob=$password='';
    $errors=array();
    $success=array();

    if(empty($_POST['name'])){
        array_push($errors,"Name : Can not be empty.");
    }else{
        $name=filter($_POST['name']);
        if(!isValidFullName($name)){
            array_push($errors,"Name : Should be either First name or with First and last name.");
            array_push($errors,"Name : Eg Shyam,Shyam Sundar");
        }
    }

    if(empty($_POST['email'])  ){
        array_push($errors,"Email : Can not be empty.");
    }else{
        $email=filter($_POST['email']);
        if(!isValidEmail($email)){ 
            array_push($errors,"Email: Should be in valid format.");
        }
    }

    if(empty($_POST['password']) || empty($_POST['rePassword']) ){
        array_push($errors,"Password : Both password and repeat password must be filled.");
    }
    else{
        $password=filter($_POST['password']);
        if( $_POST['password'] != $_POST['rePassword'] ){
            array_push($errors,"Password : Both password and repeat password must be same.");
        }
    }

    if(empty($_POST['phone'])){
        array_push($errors,"Phone No : Can not be empty.");
    }else{
        $mob=filter($_POST['phone']);
        if(!isValidNumber($mob)){
            array_push($errors,"Phone No: Should be in valid format.");
            array_push($errors,"Phone No: Must contain 10 digit number.");
        }
    }
    
    echo insertOne($email,$name,$mob,md5($password));
    die();

    if(count($res->errors)!=0)
        array_push($errors ,$res->errors);
    
    if(count($res->success)!=0)
        array_push($success,$res->success);
    
    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();

}

// check mail and forgot password
if(isset($_POST['forgotPass'])){
    $email=$code=$res='';
    $errors=array();
    $success=array();
    
    if(empty($_POST['email'])  ){
        array_push($errors,"Email : Can not be empty.");
    }else{
        $email=filter($_POST['email']);
        if(!isValidEmail($email)){ 
            array_push($errors,"Email: Should be in valid format.");
        }
    }

    // validating user and check email for possible existing enrty
    // $res=json_decode(checkForgotCodeExist($email));


    $code=md5(microtime());
    $res=json_decode(insertForgotCode($code,$email) );
    if(count($res->errors)==0 && count($errors)==0){
        // array_push($errors ,$res->errors);  //just for development,dont show database errors
        $from = "testmail.fun2019@gmail.com";
        $to = $email;
        $subject = "Forgot password code";
        $message = "Your secret code for password reset is : $code";
        $headers = "From:" . $from;
        
        if(mail($to,$subject,$message,$headers)){
            array_push($success,'Mail has been sent,Check your mail for code.');

        }else{
            array_push($errors,"Error : something went wrong during sending mail.");
        }
    }
    
    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();

}

//  forgot pass and update in user table
if(isset($_POST['forgot'])){
    $errors=array();
    $success=array();
    $email=$code=$password=$rePassword="";

    if(empty($_POST['email'])  ){
        array_push($errors,"Email : Can not be empty.");
    }else{
        $email=filter($_POST['email']);
        if(!isValidEmail($email)){ 
            array_push($errors,"Email: Should be in valid format.");
        }
    }

    if(empty($_POST['code'])  ){
        array_push($errors,"Code : Can not be empty.");
    }else{
        $code=filter($_POST['code']);
    }

    if(empty($_POST['password']) || empty($_POST['rePassword']) ){
        array_push($errors,"Password : Both password and repeat password must be filled.");
    }
    else{
        $password=filter($_POST['password']);
        if( $_POST['password'] != $_POST['rePassword'] ){
            array_push($errors,"Password : Both password and repeat password must be same.");
        }
    }
    
    if(count($errors)==0){
        $res=  json_decode( validateUpdateCode($email,$code,md5($password) ) );
        
        if(count($res->errors)!=0)
            array_push($errors ,$res->errors);
    
        if(count($res->success)!=0)
            array_push($success,$res->success);
    }

    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();
    
}


?>