<?php
session_start();

if (isset($_POST["submit"])) {
    $message = $_POST["message"];
    $did = $_SESSION["did"];
    $mid = $_POST["mid"];
    $name = $_SESSION["fname"] . ' ' . $_SESSION["lname"];
    $loca = $_SESSION["city"] . '/' . $_SESSION["zip"];
    $stat = "PENDING";

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    createParticpant($conn, $mid, $did , $name, $loca, $message, $stat);

}
else {
    header("location: ../doctorsearch.php");
}   

?>