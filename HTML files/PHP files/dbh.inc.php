<?php
// Set up MySQLi conection
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "finalprojectSantiagoZMelanieM";

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword);
// Test MySQLi connection
if(!$conn){
    // Displays an error message if MySQLi connection fails
    die("Connection failed: " . mysqli_connect_error());
}
// Create database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS $dBName;";
if(mysqli_query($conn, $sql))
{
    // Database creation successful
}
else
{
    // Displays an error message if the database creation fails
    echo "Could not create database: ". mysqli_error($conn);
}

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword, $dBName);
// Test MySQLi connection
if(!$conn){
    // Displays an error message if MySQLi connection fails
    die("Connection failed: " . mysqli_connect_error());
}
// Create doctor table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS doctors (did int AUTO_INCREMENT NOT NULL,fname varchar(50) NOT NULL,lname varchar(50) NOT NULL,demail varchar(50) NOT NULL,pass varchar(50) NOT NULL,city varchar(50) NOT NULL,zip int NOT NULL,PRIMARY KEY (did));";
if(mysqli_query($conn, $sql))
{
    // Table creation successful
}
else
{
    // Displays an error message if the table creation fails
    echo "Could not create doctor: ". mysqli_error($conn);
}
// Create office table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS office(oid int AUTO_INCREMENT NOT NULL,oname varchar(50) NOT NULL,oemail varchar(50) NOT NULL, pass varchar(50) NOT NULL,field varchar(50) NOT NULL,city varchar(50) NOT NULL,zip int NOT NULL,PRIMARY KEY (`oid`));";
if(mysqli_query($conn, $sql))
{
    // Table creation successful
}
else
{
    // Displays an error message if the table creation fails
    echo "Could not create office: ". mysqli_error($conn);
}
// Create meeting table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS meeting(mid int AUTO_INCREMENT NOT NULL,mname varchar(50) NOT NULL,office_id int NOT NULL,city varchar(50) NOT NULL,zip int NOT NULL, descrip varchar(300) NOT NULL,sTime time NOT NULL,eTime time NOT NULL, `date` date NOT NULL,PRIMARY KEY (mid), CONSTRAINT office_FK FOREIGN KEY (office_id) REFERENCES office(`oid`));";
if(mysqli_query($conn, $sql))
{
    // Table creation successful
}
else
{
    // Displays an error message if the table creation fails
    echo "Could not create doctor: ". mysqli_error($conn);
}
// Create participants table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS participants(pid int AUTO_INCREMENT NOT NULL, meeting_id int NOT NULL, doctor_id int NOT NULL, names varchar (50) NOT NULL, dateTim DATETIME NOT NULL, loca varchar(50) NOT NULL, message varchar(300) NOT NULL, stat varchar(10) NOT NULL, PRIMARY KEY (pid), CONSTRAINT meeting_FK FOREIGN KEY (meeting_id) REFERENCES meeting(mid), CONSTRAINT `doctor_FK` FOREIGN KEY (`doctor_id`) REFERENCES `doctors`(`did`) ON DELETE RESTRICT ON UPDATE RESTRICT);";
if(mysqli_query($conn, $sql))
{
    // Table creation successful
}
else
{
    // Displays an error message if the table creation fails
    echo "Could not create doctor: ". mysqli_error($conn);
}


?>