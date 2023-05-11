<?php

require_once 'dbh.inc.php';


function invalidfname($fname){
    if(!preg_match("/^[a-zA-Z]*$/", $fname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidoname($oname){
    if(!preg_match("/^[a-zA-Z]*$/", $oname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidfield($field){
    if(!preg_match("/^[a-zA-Z]*$/", $field)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidlname($lname){
    if(!preg_match("/^[a-zA-Z]*$/", $lname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidemail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email){
    $sql ="SELECT * FROM office WHERE oemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalsu.html?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createOffice($conn,$oname,$email,$pass,$field,$city,$zip){
    $sql ="INSERT INTO `office`(`oname`, `oemail`, `pass`, `field`, `city`, `zip`) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalsu.html?error=stmtfailed");
        exit();
    }



    mysqli_stmt_bind_param($stmt, "ssssss", $oname, $email, $pass, $field, $city, $zip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../medicalsu.html?error=none");

}

function loginOffice($conn, $email, $pass){
    $emailExisted = emailExists($conn, $email);
    
    if($emailExisted === false){
        header("location: ../medicallogin.html?error=wrongemail");
        exit();
    }

    $storedPass = $emailExisted["pass"];
    if($pass !== $storedPass){
        header("location: ../medicallogin.html?error=wrongpassword");
    }
    else if($pass === $storedPass){
        session_start();
        $_SESSION["oid"] = $emailExisted["oid"];
        $_SESSION["oemail"] = $emailExisted["oemail"];
        $_SESSION["oname"] = $emailExisted["oname"];
        $_SESSION["city"] = $emailExisted["city"];
        $_SESSION["zip"] = $emailExisted["zip"];
        //not sure if this is needed?
        $_SESSION["field"] = $emailExisted["field"];
        header("location: ../HTML files/medicalportal.php");
        exit();
    }

}

function createMeeting($conn,$mname,$email,$oid,$city,$zip,$desc,$time_start,$time_end, $date){
    $sql ="INSERT INTO `meeting`(`mname`, `demail`,`office_id`, `city`, `zip`, `desc`, `sTime`, `eTime`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../medicalscheduler.php?error=stmtfailed");
        exit();
    }



    mysqli_stmt_bind_param($stmt, "ssssssss", $mname, $email, $oid, $city, $zip, $desc, $time_start, $time_end, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../medicalscheduler.php?error=none");

}