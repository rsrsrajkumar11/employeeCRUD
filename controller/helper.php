<?php 
// to filter unwanted characters
function filter($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// https://stackoverflow.com/questions/5855811/how-to-validate-an-email-in-php
function isValidEmail($email){ 
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; 
    return preg_match($pattern, $email);
}

// https://www.regextester.com/93470     #mob validator js vaidator
// ^((?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$)|(^\d{3}\040\d{3}\040\d{4}$)|(^\+\d{2}\040\d{3}\040\d{3}\040\d{4}$)
function isValidNumber($phone){
    $mobileregex = "/^[6-9][0-9]{9}$/" ;  
    return preg_match($mobileregex, $phone);
}

function isValidFullName($fullname){
    $pattern= "/^[a-zA-Z]{3,}\040*[a-zA-Z]*$/";
    return preg_match($pattern,$fullname);
}

function isValidFirstName($name){
    $pattern="/^[a-zA-Z]{3,}$/";
    return preg_match($pattern,$name);
}

function isValidAddress($address){
    $pattern="/^[a-zA-Z0-9\040,-\012]{4,}$/";
    return preg_match($pattern,$address);
}

function isValidCityStateCountry($value){
    $pattern="/^[a-zA-Z\040,-]{3,}$/";
    return preg_match($pattern,$value);
}

function isValidZip($value){
    $pattern="/^[1-9][0-9]{5}$/";
    return preg_match($pattern,$value);
}

function isValidMaleFemale($val){   
    $pattern="/^[mMFfoO]$/";
    return preg_match($pattern,$val);
}

function isValidAadhar($val){   
    $pattern="/^[1-9]\d{11}$/";
    return preg_match($pattern,$val);
}

function isValidPan($val){   
    $pattern="/^[a-zA-Z]{5}\d{4}[a-zA-Z]$/";
    return preg_match($pattern,$val);
}

// 2019-02-14
function isValidDate($val){   
    $pattern="/^[12][0-9]{3}-[01][0-9]-[0123][[0-9]$/";
    return preg_match($pattern,$val);
}

function isAdult($d1,$d2){
    $date1 = "$d1 00:00:00"; 
    $date2 = "$d1 00:00:00"; 
    $diff = abs(strtotime($date2) - strtotime($date1)); 
    $years   = floor($diff / (365*60*60*24)); 
    return $years>=18?true:false;
}



// for testing and experimentation
// echo '<pre>';
// echo isValidCityStateCountry('andman and-nicobar, ilands')===1?'valid':'invalid';
// echo '<br>aaaaaaa<br>'.__DIR__;

?>