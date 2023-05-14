<?php
// Start the session
session_start();

if (isset($_POST["submit"])) { // Check if the form is submitted
    
    $mname = $_POST["mname"]; // Get the meeting name from the form
    $city = $_POST["city"]; // Get the city from the form
    $zip = $_POST["zip"]; // Get the zip code from the form
    $descip = $_POST["desc"]; // Get the description from the form
    $time_start = $_POST["start"]; // Get the start time from the form
    $time_end = $_POST["end"]; // Get the end time from the form
    $date = $_POST["date"]; // Get the date from the form
    $oid = $_SESSION['oid']; // Get the office ID from the session

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'med.func.inc.php'; // Include the medical function file

    // Call the function to create a meeting
    createMeeting($conn, $mname, $oid, $city, $zip, $descip, $time_start, $time_end ,$date);
}