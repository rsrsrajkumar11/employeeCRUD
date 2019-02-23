<?php
session_start();
if(!isset($_SESSION['id'])){
    die('404 Not authorised to access resource.');
}
// include_once "";  /model/employeeServices.php
require_once './helper.php';
require_once '../model/employeeServices.php';
// associative array for storing errors array and success messages 
$errors=array();
$success=array();
$res=array();

// echo 'aaaa';


if(isset($_POST['createNew']) || isset($_POST['update'])){
    $empid=$dob= $fname= $lname= $fatherName= $motherName= $email= $contact= $gender= $address= $country= $state= $city= $zip= $aadhar= $pancard= $technology1= $technology2= $technology3= $technology4="";
   
    if(empty($_POST['fname'])){
        array_push($errors,"First name : Can not be empty.");
    }else{
        $fname=filter($_POST['fname']);
        if(!isValidFirstName($fname)){
            array_push($errors,"First Name : Must be more than or equal to 3 characters.");
        }
    }

    if(!empty($_POST['empid'])){
        $empid=filter($_POST['empid']);
    }
    
    if(empty($_POST['lName'])){
        array_push($errors,"Last name : Can not be empty");
    }else{
        $lname=filter($_POST['lName']);
        if(!isValidFirstName($lname)){
            array_push($errors,"Last Name : Must be more than or equal to 3 characters.");
        }
    }
    
    if(empty($_POST['fathersName'])){
        array_push($errors,"Father Name : Can not be empty.");
    }else{
        $fatherName=filter($_POST['fathersName']);
        if(!isValidFullName($fatherName)){
            array_push($errors,"Father Name : Should be either First name or with First and last name.");
            array_push($errors,"Father Name : Eg Shyam,Shyam Sundar");
        }
    }

    if(empty($_POST['mothersName'])){
        array_push($errors,"Mother Name : Can not be empty.");
    }else{
        $motherName=filter($_POST['mothersName']);
        if(!isValidFullName($motherName)){
            array_push($errors,"Mother Name : Should be either First name or with First and last name.");
            array_push($errors,"Mother Name : Eg Radha,Radha Singh");
        }
    }
    
    if(empty($_POST['email'])){
        array_push($errors,"Email : Can not be empty.");
    }else{
        $email=filter($_POST['email']);
        if(!isValidEmail($email)){
            array_push($errors,"Email: Should be in valid format.");
        }
    }

    if(empty($_POST['contactNo'])){
        array_push($errors,"Contact No : Can not be empty.");
    }else{
        $contact=filter($_POST['contactNo']);
        if(!isValidNumber($contact)){
            array_push($errors,"Contact No: Should be in valid format.");
            array_push($errors,"Contact No: Must contain 10 digit number.");
        }
    }

    if(empty($_POST['country'])){
        array_push($errors,"Country : Can not be empty.");
    }else{
        $country=filter($_POST['country']);
        if(!isValidCityStateCountry($country)){
            array_push($errors,"Country : Contains invalid characters.");
        }
        
        if($country == 'Select Country'){
            array_push($errors,"Country : Please choose any country.");
        }
    }

    if(empty($_POST['state'])){
        array_push($errors,"State : Can not be empty.");
    }else{
        $state=filter($_POST['state']);
        if(!isValidCityStateCountry($state)){
            array_push($errors,"State : Contains invalid characters.");
        }

        if($state == 'Select State'){
            array_push($errors,"State : Please choose any state.");
        }
    }

    if(empty($_POST['city'])){
        array_push($errors,"City : Can not be empty.");
    }else{
        $city=filter($_POST['city']);
        if(!isValidCityStateCountry($city)){
            array_push($errors," City : Contains invalid characters.");
        }

        if($city == 'Select City'){
            array_push($errors,"City : Please choose any city.");
        }
    }

    if(empty($_POST['address'])){
        array_push($errors,"Address : Can not be empty.");
    }else{
        $address=filter($_POST['address']);
        if(!isValidCityStateCountry($address)){
            array_push($errors," Address : Contains invalid characters.");
        }
    }


    if(empty($_POST['zipCode'])){
        array_push($errors,"Pin Code : Can not be empty.");
    }else{
        $zip=filter($_POST['zipCode']);
        if(!isValidZip($zip)){
            array_push($errors,"Pin Code : Contains invalid characters.");
        }
    }

    if(empty($_POST['gender'])){
        array_push($errors,"Gender : Can not be empty.");
    }else{
        $gender=filter($_POST['gender']);
        if(!isValidMaleFemale($gender)){
            array_push($errors,"Gender : Choose the gender.");
            array_push($errors,"Gender : Contains invalid characters.");
        }
    }

    if(empty($_POST['aadharNo'])){
        array_push($errors,"Aadhar No : Can not be empty.");
    }else{
        $aadhar=filter($_POST['aadharNo']);
        if(!isValidAadhar($aadhar)){
            array_push($errors,"Aadhar No : Contains invalid characters.");
        }
    }

    if(empty($_POST['pancardNo'])){
        array_push($errors,"Pancard No : Can not be empty.");
    }else{
        $pancard=filter($_POST['pancardNo']);
        if(!isValidPan($pancard)){
            array_push($errors,"Pancard No : Contains invalid characters.");
            array_push($errors,"Pancard No : Invalid format.");
        }
    }

    if(empty($_POST['dob'])){
        array_push($errors,"DOB : Can not be empty.");
    }else{
        $dob=filter($_POST['dob']);
        if(!isValidDate($dob)){
            array_push($errors,"DOB : Contains invalid characters.");
            array_push($errors,"DOB : Invalid format.");
        }else{
            
            $curr=getdate();
            $curr=''+$curr['year']+'-'+$curr['mon']+'-'+ $curr['mday'];
            // echo 'asdfghjk::: '.isAdult($curr,$dob)===true?'sssssss':'ffffffff';
            if(isAdult($curr,$dob)){
                array_push($errors,"DOB : Your age is less than 18 years.");

            }

        }
    }
    
    if(!empty($_POST['technology1'])){
        $technology1=filter($_POST['technology1']);
    }

    if(!empty($_POST['technology2'])){
        $technology2=filter($_POST['technology2']);
    }
    
    if(!empty($_POST['technology3'])){
        $technology3=filter($_POST['technology3']);
    }

    if(!empty($_POST['technology4'])){
        $technology4=filter($_POST['technology4']);
    }
    
    if(isset($_POST['update'])){
        if(count($errors)==0){
            $res=updateOne($empid,$dob, $fname, $lname, $fatherName, $motherName, $email, $contact, $gender, $address, $country, $state, $city, $zip, $aadhar, $pancard, $technology1, $technology2, $technology3, $technology4);
        }
    }else{
        if(count($errors)==0){
            $res=insertOne($dob, $fname, $lname, $fatherName, $motherName, $email, $contact, $gender, $address, $country, $state, $city, $zip, $aadhar, $pancard, $technology1, $technology2, $technology3, $technology4);
        } 

    }
    
    $res=json_decode($res);
    if(count($res->errors)!=0)
        array_push($errors ,$res->errors);
    
    if(count($res->success)!=0)
        array_push($success,$res->success);      
    
    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();
    
}

// fetch all record from db
if(isset($_POST['fetchMinimal'])){
    $page=$size=0;

    if(isset($_POST['page'])){
        $page=filter($_POST['page']);
    }else{
        $page=0;
    }

    if(isset($_POST['size'])){
        $size=filter($_POST['size']);
    }else{
        $size=0;
    }

    --$page;
    echo fetchAll($page,$size);
    die();
}

//  fetch all record from employee
if(isset($_POST['download'])){
    echo downloadAll();
    die();
}


//  fetch one record from employee
if(isset($_POST['viewEmployee'])){
    $id=filter($_POST['viewEmployee']);
    echo fetchOne($id);
    die();
}


// soft delete 
if(isset($_POST['Delete'])){
    $id=filter($_POST['Delete']);
    echo deleteOne($id);
}


// count record for pagination
if(isset($_POST['countRecords'])){
    // print_r($_POST);
    // die('success your are in pagination ');
    echo countAll();
}

?>