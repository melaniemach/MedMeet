<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "finalproject";

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dBName;";
if(mysqli_query($conn, $sql))
{
}
else
{
    echo "Could not create database: ". mysqli_error($conn);
}

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS `doctors`(`did` int AUTO_INCREMENT NOT NULL,`fname` varchar(50) NOT NULL,`lname` varchar(50) NOT NULL,`demail` varchar(50) NOT NULL,`pass` varchar(50) NOT NULL,`city` varchar(50) NOT NULL,`zip` int NOT NULL,PRIMARY KEY (`did`));";
if(mysqli_query($conn, $sql))
{
}
else
{
    echo "Could not create doctor: ". mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS `office`(`oid` int AUTO_INCREMENT NOT NULL,`oname` varchar(50) NOT NULL,`oemail` varchar(50) NOT NULL, `pass` varchar(50) NOT NULL,`field` varchar(50) NOT NULL,`city` varchar(50) NOT NULL,`zip` int NOT NULL,PRIMARY KEY (`oid`));";
if(mysqli_query($conn, $sql))
{
}
else
{
    echo "Could not create office: ". mysqli_error($conn);
}

?>