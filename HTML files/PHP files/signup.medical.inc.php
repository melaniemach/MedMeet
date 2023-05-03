<?php

if (isset($_POST["submit"])) {
    
    $oname = $_POST["officename"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $field = $_POST["field"];
    $city = $_POST["city"];
    $zip = $_POST["postalcode"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    if(invalidoname($oname) !== false){
        header("location: ../medicalsu.html?error=invalidfname");
        exit();
    }
    if(invalidfield($field) !== false){
        header("location: ../medicalsu.html?error=invalidlname");
        exit();
    }
    if(invalidemail($email) !== false){
        header("location: ../medicalsu.html?error=invalidemail");
        exit();
    }

    /* NOT WORKING CORRECTLY  */
    if(emailExists($conn, $email) !== false){
        header("location: ../medicalsu.html?error=emailtaken");
        exit();
    }

    createOffice($conn,$oname,$email,$pass,$field,$city,$zip);
}
else {
    header("location: ../medicalsu.html");
}   
