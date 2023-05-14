<?php

session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

header("location: ../index.html"); // Redirect to the index.html page
exit(); // Exit the script