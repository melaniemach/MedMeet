<?php
session_start();

if(isset($_POST["feditnameb"])){
    $fname = $_POST["feditname"];
    $did = $_SESSION["did"];
    $email = $_SESSION["demail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';
    
    $sql = "UPDATE doctors SET `fname` = '$fname' WHERE `did` = $did";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../docotorprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    updateDoctor($conn, $email, $pass);
    
    header("location: ../docotorprofile.php?error=none");
}
else{
    header("location: ../docotorprofile.php");
    exit();
}
if(isset($_POST["feditnameb"])){
    $name = $_POST["leditname"];
    $did = $_SESSION["did"];
    $email = $_SESSION["demail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';
    
    $sql = "UPDATE doctors SET `lname` = '$lname' WHERE `did` = $did";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../docotorprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    updateDoctor($conn, $email, $pass);
    
    header("location: ../docotorprofile.php?error=none");
}
else{
    header("location: ../docotorprofile.php");
    exit();
}
if(isset($_POST["editemailb"])){
    $demail = $_POST["editemail"];
    $did = $_SESSION["did"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';
    
    $sql = "UPDATE doctors SET `demail` = '$demail' WHERE `did` = $did";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../docotorprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateDoctor($conn, $demail, $pass);
    header("location: ../docotorprofile.php?error=none");
}
else{
    header("location: ../docotorprofile.php");
    exit();
}
if(isset($_POST["editcityb"])){
    $city = $_POST["editcity"];
    $did = $_SESSION["did"];
    $email = $_SESSION["demail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';
    
    $sql = "UPDATE doctors SET `city` = '$city' WHERE `did` = $did";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../docotorprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    updateDoctor($conn, $email, $pass);
    header("location: ../docotorprofile.php?error=none");
}
else{
    header("location: ../docotorprofile.php");
    exit();
}
if(isset($_POST["editzipb"])){
    $zip = $_POST["editzip"];
    $did = $_SESSION["did"];
    $email = $_SESSION["demail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';
    
    $sql = "UPDATE doctors SET `zip` = '$zip' WHERE `did` = $did";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../docotorprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateDoctor($conn, $email, $pass);
    header("location: ../docotorprofile.php?error=none");
}
else{
    header("location: ../docotorprofile.php");
    exit();
}
if(isset($_POST["editpassb"])){
    $pass = $_POST["editpass"];
    $did = $_SESSION["did"];
    $email = $_SESSION["demail"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';
    
    $sql = "UPDATE doctors SET `pass` = '$pass' WHERE `did` = $did";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../docotorprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateDoctor($conn, $email, $pass);
    header("location: ../docotorprofile.php?error=none");
}
else{
    header("location: ../docotorprofile.php");
    exit();
}