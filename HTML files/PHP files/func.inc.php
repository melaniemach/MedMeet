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

    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $hashedPwd, $city, $zip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../doctorsu.html?error=none");

}

function createOffice($conn,$oname,$email,$pass,$field,$city,$zip){
    $sql ="INSERT INTO doctors (oname, oemail, pass, field, city, zip) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalsu.html?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $oname, $email, $hashedPwd, $field, $city, $zip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../medicalsu.html?error=none");

}