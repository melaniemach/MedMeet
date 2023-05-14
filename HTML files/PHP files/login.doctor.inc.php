<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    
    $demail = $_POST["email"]; // Get the email from the form
    $pass = $_POST["password"]; // Get the password from the form

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'func.inc.php'; // Include the function file

    // Call the function to login the doctor
    loginDoctor($conn, $demail, $pass);
}
else{
    // Redirect to the doctor signup page if the form is not submitted
    header("location: ../doctorsu.html");
}
?>