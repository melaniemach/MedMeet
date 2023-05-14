<?php
// Check if the form is submitted
if (isset($_POST["submit"])) { 
    
    $fname = $_POST["firstname"]; // Get the first name from the form
    $lname = $_POST["lastname"]; // Get the last name from the form
    $email = $_POST["email"]; // Get the email from the form
    $pass = $_POST["password"]; // Get the password from the form
    $city = $_POST["city"]; // Get the city from the form
    $zip = $_POST["postalcode"]; // Get the postal code from the form

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'func.inc.php'; // Include the function file

    // Check if the first name is invalid
    if (invalidfname($fname) !== false) { 
        // Redirect with an error message for invalid first name
        header("location: ../doctorsu.html?error=invalidfname"); 
        exit();
    }
    // Check if the last name is invalid
    if (invalidlname($lname) !== false) { 
        // Redirect with an error message for invalid last name
        header("location: ../doctorsu.html?error=invalidlname"); 
        exit();
    }
    // Check if the email is invalid
    if (invalidemail($email) !== false) { 
        // Redirect with an error message for invalid email
        header("location: ../doctorsu.html?error=invalidemail"); 
        exit();
    }

    /* DOES NOT WORK */
    // Check if the email already exists in the database
    if (emailExists($conn, $email) !== false) { 
        // Redirect with an error message for email already taken
        header("location: ../doctorsu.html?error=emailtaken"); 
        exit();
    }
    // Call the function to create a doctor
    createDoctor($conn, $fname, $lname, $email, $pass, $city, $zip); 
}
else {
    // Redirect to the doctor signup page if the form is not submitted
    header("location: ../doctorsu.html"); 
}