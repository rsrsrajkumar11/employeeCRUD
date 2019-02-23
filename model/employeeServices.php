<?php

function insertOne($dob, $fname, $lname, $fatherName, $motherName, $email, $contact, $gender, $address, $country, $state, $city, $zip, $aadhar, $pancard, $technology1, $technology2, $technology3, $technology4) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "INSERT INTO employeesDB.employee (dob, fname, lname, fatherName, motherName, email, contact, gender, address, country, state, city, zip, aadhar, pancard, technology) VALUES ('$dob', '$fname', '$lname', '$fatherName', '$motherName', '$email', '$contact', '$gender', '$address', '$country', '$state', '$city', '$zip', '$aadhar', '$pancard','[$technology2,$technology3,$technology4]' );";
    if($conn->query($sql)){
        array_push($success,"Your data has been successfully added in database");
        $conn->close();
    }else{
        array_push($errors," Something went wrong, data is not added in database");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function fetchOne($id) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "SELECT  empId, fname, lname, fatherName, motherName, email, contact, gender, address, country, state, city, zip, aadhar, pancard, technology, dob FROM employee where empId='$id' and deleteFlg='0' ;";
    // $sql= "SELECT  * FROM employee where empId='$id' and deleteFlg='0' ;";
    $result=$conn->query($sql);
    if($result->num_rows){
        $data[]=$result->fetch_assoc();
        array_push($success,"Data retrive from database");
        $conn->close();
    }else{
        array_push($errors,"Error occurend while fetching data");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function downloadAll() {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "SELECT  empId, fname, lname, fatherName, motherName, email, contact, gender, address, country, state, city, zip, aadhar, pancard, technology, dob FROM employee where deleteFlg='0' ;";
    $result=$conn->query($sql);
    if($result->num_rows){
        //returns associative array which is convertable to json
        $data[]=$result->fetch_all(MYSQLI_ASSOC);   
        
        // fetch all rows and return , seprated values in array 
        // $data[]=$result->fetch_all();

        array_push($success,"Data retrive from database");
        $conn->close();
    }else{
        array_push($errors,"Error occurend while fetching data");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function updateOne($id,$dob, $fname, $lname, $fatherName, $motherName, $email, $contact, $gender, $address, $country, $state, $city, $zip, $aadhar, $pancard, $technology1, $technology2, $technology3, $technology4) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "UPDATE employeesDB.employee SET fname = '$fname',lname = '$lname',fatherName = '$fatherName',motherName = '$motherName',email = '$email',contact = '$contact',gender = '$gender',address = '$address',country = '$country',state = '$state',city = '$city',zip = '$zip',aadhar = '$aadhar',pancard = '$pancard',technology = '[$technology1,$technology2,$technology3,$technology4]',dob = '$dob' WHERE employee.empId = '$id';";
    if(! $conn->query($sql)){
        array_push($errors," Something went wrong, data is not updated in database");
    }
    
    if($conn->affected_rows===1){
        array_push($success,"Your data has been successfully update in database");
    }else{
        array_push($errors," Something went wrong,no data has been updated");

    }

    $conn->close();

    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function deleteOne($id) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "update employeesDB.employee SET deleteFlg=1  WHERE employee.empId = '$id';";
    if(! $conn->query($sql)){
        array_push($errors," Something went wrong, data is not updated in database");
    }

    if($conn->affected_rows == 1){
        array_push($success,"Your data has been successfully deleted from database");
        $conn->close();
    }else{
        array_push($errors," Something went wrong, data is not deleted from database");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function countAll(){
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "SELECT count(1) as 'rowCount' FROM employee WHERE deleteFlg = '0' ";
    $result=$conn->query($sql);
    if($result->num_rows) 
        $rows=$result->fetch_assoc();
    else
        $rows=0;

    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$rows];
    $userResponse=json_encode($userResponse);
    return $userResponse;
}


function fetchAll($page,$size) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    $page*=$size;
    $sql= "SELECT empId, fname, lname, fatherName, contact, dob FROM employee WHERE deleteFlg = '0' limit $page,$size";

    $result=$conn->query($sql);
    if($result->num_rows){
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        array_push($success,"Data retrive from database");
        $conn->close();
    }else{
        array_push($errors,"No data present on table");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

/*
modular testing and experementation
*/
// echo __DIR__.__FILE__;
// echo '<pre>';
// echo 'start';
// NULL, 'rajkumar', 'sing', 'aaaa', 'sssssssss', 'rajkumar.2017@vitstudent.ac.in', '8878878056', 'm', 'asdasdadasd', 'India', 'madhya pradesh', 'sagar', '474020', '1222222222222', '867867675675', '{html,java script}', '2019-02-12'
// echo insertOne('2019-02-12', 'rajkumar', 'sing', 'aaaa', 'sssssssss', 'rajkumar.2017@vitstudent.ac.in', '8878878056', 'm', 'asdasdadasd', 'India', 'madhya pradesh', 'sagar', '474020', '1222222222222', '867867675675', 'html','java' ,'script' );
// print_r( json_decode( fetchAll(1,2) ) );
// print_r( json_decode( fetchOne('14') ) );
// print_r( json_decode( deleteOne(6) ) );
// print_r( json_decode( updateOne('7','2016-02-02','raj', 'narwariya', 'papa', 'maaa', 'mail@gmail.com', '8878878056', 'm', 'gwalior', 'india', 'madhya pradesh', 'sagar', '474020', '121321231312', '00000000', 'js', 'python', 'php', 'java') )  );
// print_r( json_decode( insertOne( )) );



?>