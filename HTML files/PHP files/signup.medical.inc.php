<?php
// Check if the form is submitted
if (isset($_POST["submit"])) { 
    
    $oname = $_POST["officename"]; // Get the office name from the form
    $email = $_POST["email"]; // Get the email from the form
    $pass = $_POST["password"]; // Get the password from the form
    $field = $_POST["field"]; // Get the field from the form
    $city = $_POST["city"]; // Get the city from the form
    $zip = $_POST["postalcode"]; // Get the postal code from the form

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'med.func.inc.php'; // Include the medical function file

    if (invalidoname($oname) !== false) { // Check if the office name is invalid
        header("location: ../medicalsu.html?error=invalidfname"); // Redirect with an error message for invalid office name
        exit();
    }
    if (invalidfield($field) !== false) { // Check if the field is invalid
        header("location: ../medicalsu.html?error=invalidlname"); // Redirect with an error message for invalid field
        exit();
    }
    // Check if the email is invalid
    if (invalidemail($email) !== false) { 
        // Redirect with an error message for invalid email
        header("location: ../medicalsu.html?error=invalidemail"); 
        exit();
    }

    /* NOT WORKING CORRECTLY */
    // Check if the email already exists in the database
    if (emailExists($conn, $email) !== false) { 
        // Redirect with an error message for email already taken
        header("location: ../medicalsu.html?error=emailtaken"); 
        exit();
    }

    // Call the function to create an office
    createOffice($conn, $oname, $email, $pass, $field, $city, $zip); 
}
else {
    // Redirect to the medical signup page if the form is not submitted
    header("location: ../medicalsu.html"); 
}