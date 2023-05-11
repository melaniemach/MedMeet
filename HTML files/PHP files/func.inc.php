<?php

require_once 'dbh.inc.php';


function invalidfname($fname){
    if(!preg_match("/^[a-zA-Z]*$/", $fname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidoname($oname){
    if(!preg_match("/^[a-zA-Z]*$/", $oname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidfield($field){
    if(!preg_match("/^[a-zA-Z]*$/", $field)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidlname($lname){
    if(!preg_match("/^[a-zA-Z]*$/", $lname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidemail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email){
    $sql ="SELECT * FROM doctors WHERE demail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../doctorsu.html?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createDoctor($conn,$fname,$lname,$email,$pass,$city,$zip){
    $sql ="INSERT INTO doctors (fname, lname, demail, pass, city, zip) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../doctorsu.html?error=stmtfailed");
        exit();
    }



    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $pass, $city, $zip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../doctorsu.html?error=none");

}

function loginDoctor($conn, $email, $pass){
    $emailExisted = emailExists($conn, $email);
    
    if($emailExisted === false){
        header("location: ../doctorlogin.html?error=wrongemail");
        exit();
    }

    $storedPass = $emailExisted["pass"];
    $checkPwd = password_verify($pass, $storedPass);
    if($pass !== $storedPass){
        header("location: ../doctorlogin.html?error=wrongpassword");
    }
    else if($pass === $storedPass){
        session_start();
        $_SESSION["did"] = $emailExisted["did"];
        $_SESSION["demail"] = $emailExisted["demail"];
        header("location: ../doctorportal.html");
        exit();
    }

}