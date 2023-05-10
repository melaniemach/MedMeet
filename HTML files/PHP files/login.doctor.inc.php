<?php

if (isset($_POST["submit"])) {
    
    $demail = $_POST["email"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    loginDoctor($conn, $demail, $pass);
}
else{
    header("location: ../doctorsu.html");
}
?>