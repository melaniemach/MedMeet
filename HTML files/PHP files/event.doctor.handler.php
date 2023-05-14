<?php
session_start();

if (isset($_POST["cancel"])) {
    $pid = $_POST["pid"];

    require_once 'dbh.inc.php';

    $sql = "DELETE FROM participants WHERE pid = $pid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../doctorportal.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../doctorportal.php?error=none");
}
else {
    header("location: ../doctorportal.php");
}   

?>

