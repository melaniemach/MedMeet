<?php
session_start();

if(isset($_POST["editnameb"])){
    $name = $_POST["editname"];
    $oid = $_SESSION["oid"];
    $email = $_SESSION["oemail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';
    
    $sql = "UPDATE office SET `oname` = '$name' WHERE `oid` = $oid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    updateOffice($conn, $email, $pass);
    
    header("location: ../medicalprofile.php?error=none");
}
elseif(isset($_POST["editemailb"])){
    $oemail = $_POST["editemail"];
    $oid = $_SESSION["oid"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';
    
    $sql = "UPDATE office SET `oemail` = '$oemail' WHERE `oid` = $oid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateOffice($conn, $oemail, $pass);
    header("location: ../medicalprofile.php?error=none");
}
elseif(isset($_POST["editfieldb"])){
    $field = $_POST["editfield"];
    $oid = $_SESSION["oid"];
    $email = $_SESSION["oemail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';
    
    $sql = "UPDATE office SET `field` = '$field' WHERE `oid` = $oid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateOffice($conn, $email, $pass);
    header("location: ../medicalprofile.php?error=none");
}
elseif(isset($_POST["editcityb"])){
    $city = $_POST["editcity"];
    $oid = $_SESSION["oid"];
    $email = $_SESSION["oemail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';
    
    $sql = "UPDATE office SET `city` = '$city' WHERE `oid` = $oid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    updateOffice($conn, $email, $pass);
    header("location: ../medicalprofile.php?error=none");
}
elseif(isset($_POST["editzipb"])){
    $zip = $_POST["editzip"];
    $oid = $_SESSION["oid"];
    $email = $_SESSION["oemail"];
    $pass = $_SESSION["pass"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';
    
    $sql = "UPDATE office SET `zip` = '$zip' WHERE `oid` = $oid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateOffice($conn, $email, $pass);
    header("location: ../medicalprofile.php?error=none");
}
elseif(isset($_POST["editpassb"])){
    $pass = $_POST["editpass"];
    $oid = $_SESSION["oid"];
    $email = $_SESSION["oemail"];

    require_once 'dbh.inc.php';
    require_once 'med.func.inc.php';
    
    $sql = "UPDATE office SET `pass` = '$pass' WHERE `oid` = $oid";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalprofile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    updateOffice($conn, $email, $pass);
    header("location: ../medicalprofile.php?error=none");
}
else{
    header("location: ../medicalprofile.php");
    exit();
}