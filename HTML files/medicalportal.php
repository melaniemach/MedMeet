<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Portal</title>
    <!-- CSS styles -->
    <link rel="stylesheet" href="../CSS files/reset.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/medportal.css">
  </head>
  
  <body>
    <!-- Nav bar-->
    <header class="header-main">
      <div class="header-main-logo">
        <img src="../images/drugs.png" alt="logo" size>
        <div class="company-name">MedMeet</div>
        <nav class="header-main-nav">
          <ul>
            <li><a href="medicalportal.php">PORTAL</a></li>
            <li><a href="medicalscheduler.php">EVENT SCHEDULER</a></li>
            <li><a href="medicalprofile.php">PROFILE</a></li>
            <li><a href="../HTML files/PHP files/logout.inc.php">LOG OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main>
      
      <section>
      <h1>Pending Events Requests</h1>
      <h2>Event Name: </h2>
      </section>
        <?php

        require_once 'PHP files/dbh.inc.php';

        $oid = $_SESSION["oid"];

        $sql = "SELECT * FROM meeting WHERE office_id = $oid;";

        $retval=mysqli_query($conn, $sql);

        if(mysqli_num_rows($retval) > 0){
          while($row = mysqli_fetch_assoc($retval)){
            $meeting_id = $row["mid"];
            $sql1 = "SELECT * FROM participants WHERE meeting_id = $meeting_id;";
            $retval1=mysqli_query($conn, $sql1);
            if(mysqli_num_rows($retval1) > 0){
              while($row1 = mysqli_fetch_assoc($retval1)){
                if($row1["stat"] == "PENDING"){
                  $mid = $row1["meeting_id"];
                  $sql2 = "SELECT * FROM meeting WHERE mid = $mid;";
                  $retval2=mysqli_query($conn, $sql2);
                  if(mysqli_num_rows($retval1) > 0){
                    while($row2 = mysqli_fetch_assoc($retval2)){
                      echo $row2["mname"] .": ";
                      echo "<table id='eventsTable'>"
                      . "<tr>"
                      .  "<th>From</th>"
                      .  "<th>Date & Time</th>"
                      .  "<th>City & Zip</th>"
                      .  "<th>Your Message</th>"
                      .  "<th>Action</th>"
                      .  "</tr>";
                    }
                  }
                  else{
                    echo "<h3> 0 results </h3>";
                  }
                  $pid = $row1["pid"];
                  echo '<tr>';
                  echo '<td>' . $row1["names"] . '</td>';
                  echo '<td>' . $row1["dateTim"] . '</td>';
                  echo '<td>' . $row1["loca"] . '</td>';
                  echo '<td>' . $row1["message"] . '</td>';
                  echo "<td><form action='PHP files/event.medical.handler.php' method='POST'><input type='hidden' name='pid' value='$pid'><button name='accept' value ='accept' class='button-accept'>ACCEPT</button><form action='PHP files/event.medical.handler.php' method='POST'><input type='hidden' name='pid' value='$pid'><button name='cancel' value ='cancel' class='button-cancel'>Cancel</button></td>";
                  echo '</tr>';
                }
                
              }
            }
            else{
              echo "<h3> 0 results </h3>";
            }
            
          }
        }
        else{
          echo "<h3> 0 results </h3>";
        }

        ?>
      </table>
        <?php

        require_once 'PHP files/dbh.inc.php';
        
        echo '<section>
      <h1>Current Event Participants</h1>
      <h2>Event Name:' . $row2["mname"] . ': </h2>
      </section>';
        $oid = $_SESSION["oid"];

        $sql = "SELECT * FROM meeting WHERE office_id = $oid;";

        $retval=mysqli_query($conn, $sql);

        if(mysqli_num_rows($retval) > 0){
          while($row = mysqli_fetch_assoc($retval)){
            $meeting_id = $row["mid"];
            $sql1 = "SELECT * FROM participants WHERE meeting_id = $meeting_id;";
            $retval1=mysqli_query($conn, $sql1);
            if(mysqli_num_rows($retval1) > 0){
              while($row1 = mysqli_fetch_assoc($retval1)){
                if($row1["stat"] == "APPROVED"){
                  $mid = $row1["meeting_id"];
                  $sql2 = "SELECT * FROM meeting WHERE mid = $mid;";
                  $retval2=mysqli_query($conn, $sql2);
                  if(mysqli_num_rows($retval1) > 0){
                    while($row2 = mysqli_fetch_assoc($retval2)){
                      echo "<table id='eventsTable'>"
                      . "<tr>"
                      .  "<th>From</th>"
                      .  "<th>Date & Time</th>"
                      .  "<th>City & Zip</th>"
                      .  "<th>Your Message</th>"
                      .  "<th>Action</th>"
                      .  "</tr>";
                    }
                  }
                  else{
                    echo "<h3> 0 results </h3>";
                  }
                  $pid = $row1["pid"];
                  echo '<tr>';
                  echo '<td>' . $row1["names"] . '</td>';
                  echo '<td>' . $row1["dateTim"] . '</td>';
                  echo '<td>' . $row1["loca"] . '</td>';
                  echo '<td>' . $row1["message"] . '</td>';
                  echo "<td><form action='PHP files/event.doctor.handler.php' method='POST'><input type='hidden' name='pid' value='$pid'><button name='cancel' value ='cancel' class='button-cancel'>Cancel</button></td>";
                  echo '</tr>';
                }
                
              }
            }
            else{
              echo "<h3> 0 results </h3>";
            }
            
          }
        }
        else{
          echo "<h3> 0 results </h3>";
        }

        ?>
      </table>
    </main>

    <footer>
      <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
  </body>
</html>
