<?php

if (isset($_POST["submit"])) {
    
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $city = $_POST["city"];
    $zip = $_POST["postalcode"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    if(invalidfname($fname) !== false){
        header("location: ../doctorsu.html?error=invalidfname");
        exit();
    }
    if(invalidlname($lname) !== false){
        header("location: ../doctorsu.html?error=invalidlname");
        exit();
    }
    if(invalidemail($email) !== false){
        header("location: ../doctorsu.html?error=invalidemail");
        exit();
    }
    if(emailExists($conn, $email) !== false){
        header("location: ../doctorsu.html?error=emailtaken");
        exit();
    }

    createDoctor($conn,$fname,$lname,$email,$pass,$city,$zip);
}
else {
    header("location: ../doctorsu.html");
}   