<?php

session_start();

if (isset($_POST["submit"])) {
    
    $mname = $_POST["mname"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $descip = $_POST["desc"];
    $time_start = $_POST["start"];
    $time_end = $_POST["end"];
    $date = $_POST["date"];
    $oid = $_SESSION['oid'];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';

    createMeeting($conn, $mname, $oid, $city, $zip, $descip, $time_start, $time_end ,$date);
}