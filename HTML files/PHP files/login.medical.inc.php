<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    
    $oemail = $_POST["email"]; // Get the email from the form
    $pass = $_POST["password"]; // Get the password from the formZ

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'med.func.inc.php'; // Include the medical function file

    // Call the function to login the office
    loginOffice($conn, $oemail, $pass);
}
else{
     // Redirect to the medical signup page if the form is not submitted
    header("location: ../medicalsu.html");
}