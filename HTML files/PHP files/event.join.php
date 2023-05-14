<?php
// Start the session
session_start();
// Check if the form is submitted
if (isset($_POST["submit"])) {
    $message = $_POST["message"]; // Get the message from the form
    $did = $_SESSION["did"]; // Get the doctor ID from the session
    $mid = $_POST["mid"]; // Get the medical ID from the form
    $name = $_SESSION["fname"] . ' ' . $_SESSION["lname"]; // Get the user's full name from the session
    $loca = $_SESSION["city"] . '/' . $_SESSION["zip"]; // Get the user's location (city/zip) from the session
    $stat = "PENDING"; // Set the status as "PENDING"

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'func.inc.php'; // Include the function file

    // Call the function to create a participant
    createParticpant($conn, $mid, $did , $name, $loca, $message, $stat);

}
else {
    // Redirect to the doctor search page if the form is not submitted
    header("location: ../doctorsearch.php");
}   

?>