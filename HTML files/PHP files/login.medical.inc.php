<?php

if (isset($_POST["submit"])) {
    
    $oemail = $_POST["email"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';

    loginOffice($conn, $oemail, $pass);
}
else{
    header("location: ../medicalsu.html");
}