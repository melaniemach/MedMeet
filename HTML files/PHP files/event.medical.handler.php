<?php
session_start();

if (isset($_POST["cancel"])) {
    $names = $_POST["names"];
    require_once 'dbh.inc.php';

    $sql = "DELETE FROM participants WHERE names = '$names'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalportal.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../medicalportal.php?error=none");
}
elseif(isset($_POST["accept"])){
    $names = $_POST["names"];
    require_once 'dbh.inc.php';
    
    $sql = "UPDATE participants SET `stat` = 'APPROVED' WHERE names LIKE '$names'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalportal.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../medicalportal.php?error=none");
}

else {
    header("location: ../medicalportal.php");
}   

?>

