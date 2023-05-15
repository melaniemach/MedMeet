<?php

require_once 'dbh.inc.php'; // Include the database connection file

// Function to check if the first name is invalid (contains only letters)
function invalidfname($fname){
    if(!preg_match("/^[a-zA-Z]*$/", $fname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check if the other name is invalid (contains only letters)
function invalidoname($oname){
    if(!preg_match("/^[a-zA-Z]*$/", $oname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check if a field is invalid (contains only letters)
function invalidfield($field){
    if(!preg_match("/^[a-zA-Z]*$/", $field)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check if the last name is invalid (contains only letters)
function invalidlname($lname){
    if(!preg_match("/^[a-zA-Z]*$/", $lname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check if the email is invalid
function invalidemail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check if an email already exists in the database
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

// Function to create a new doctor in the database
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

// Function to login a doctor
function loginDoctor($conn, $email, $pass){
    $emailExisted = emailExists($conn, $email);
    
    if($emailExisted === false){
        header("location: ../doctorlogin.html?error=wrongemail");
        exit();
    }

    $storedPass = $emailExisted["pass"];
    if($pass !== $storedPass){
        header("location: ../doctorlogin.html?error=wrongpassword");
    }
    else if($pass === $storedPass){
        session_start();
        $_SESSION["did"] = $emailExisted["did"];
        $_SESSION["demail"] = $emailExisted["demail"];
        $_SESSION["fname"] = $emailExisted["fname"];
        $_SESSION["lname"] = $emailExisted["lname"];
        $_SESSION["city"] = $emailExisted["city"];
        $_SESSION["zip"] = $emailExisted["zip"];
        $_SESSION["pass"] = $emailExisted["pass"];
        header("location: ../doctorportal.php");
        exit();
    }

}

// Function to create a participant for a meeting
function createParticpant($conn, $mid, $did , $name, $loca, $mess, $stat){
    $sql ="INSERT INTO `participants`(`meeting_id`,`doctor_id`, `names`, `dateTim`, `loca`, `message`, `stat`) VALUES (?, ?, ?, now(), ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../doctorsearch.php?error=stmtfailed");
        exit();
    }



    mysqli_stmt_bind_param($stmt, "ssssss", $mid, $did, $name, $loca, $mess, $stat);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../doctorsearch.php?error=none");

}

function updateDoctor($conn, $email, $pass){
    session_start(); // Start the session
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session


    $emailExisted = emailExists($conn, $email);
    
    if($emailExisted === false){
        header("location: ../doctorprofile.php?error=updatefailede");
        exit();
    }

    $storedPass = $emailExisted["pass"];
    if($pass !== $storedPass){
        header("location: ../doctorprofile.php?error=updatefailedp");
    }
    else if($pass === $storedPass){
        session_start();
        $_SESSION["did"] = $emailExisted["did"];
        $_SESSION["demail"] = $emailExisted["demail"];
        $_SESSION["fname"] = $emailExisted["fname"];
        $_SESSION["lname"] = $emailExisted["lname"];
        $_SESSION["city"] = $emailExisted["city"];
        $_SESSION["zip"] = $emailExisted["zip"];
        $_SESSION["pass"] = $emailExisted["pass"];
        header("location: ../doctorprofile.php");
        exit();
    }

}