<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal</title>
    <!-- CSS styles -->
    <link rel="stylesheet" href="../CSS files/reset.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/docportal.css">
</head>

<body>
    <!--Navigation bar-->
    <header class="header-main">
    <div class="header-main-logo">
            <img src="../images/drugs.png" alt="logo" size>
            <div class="company-name">MedMeet</div>
            <nav class="header-main-nav">
                <ul>
                    <li><a href="doctorportal.php">DOCTOR PORTAL</a></li>
                    <li><a href="doctorsearch.php">SEARCH</a></li>
                    <li><a href="doctorprofile.php">PROFILE</a></li>
                    <li><a href="../HTML files/PHP files/logout.inc.php">LOG OUT</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
      <section>
      <h1>Registered Event Requests</h1>
      </section>
        <?php
        require_once 'PHP files/dbh.inc.php';

        $did = $_SESSION["did"];

        $sql = "SELECT * FROM participants WHERE doctor_id = $did;";

        $retval=mysqli_query($conn, $sql);

        if(mysqli_num_rows($retval) > 0){
          while($row = mysqli_fetch_assoc($retval)){
            if($row["stat"] == "PENDING"){
              $mid = $row["meeting_id"];
              $sql1 = "SELECT * FROM meeting WHERE mid = $mid;";
              $retval1=mysqli_query($conn, $sql1);
              if(mysqli_num_rows($retval1) > 0){
                while($row1 = mysqli_fetch_assoc($retval1)){
                  $mname = $row1["mname"];
                  echo "<table id='eventsTable'>"
                  . "<tr>"
                  .  "<th>From</th>"
                  .  "<th>Meeting Name</th>"
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
              $pid = $row["pid"];
              echo '<tr>';
              echo '<td>' . $row["names"] . '</td>';
              echo '<td>' . $mname . '</td>';
              echo '<td>' . $row["dateTim"] . '</td>';
              echo '<td>' . $row["loca"] . '</td>';
              echo '<td>' . $row["message"] . '</td>';
              echo "<td>
                    <form action='PHP files/event.doctor.handler.php' method='POST'>
                      <input type='hidden' name='pid' value='$pid'>
                      <button name='cancel' value='cancel' class='button-cancel'>Cancel</button>
                    </form>
                  </td>";
              echo '</tr>';
            }
            
          }
        }
        else{
          echo "<h3> 0 results </h3>";
        }

        ?>
      </table>

      <section>
      <h1>Confirmed Events</h1>
      </section>
      <?php

        $did = $_SESSION["did"];

        $sql = "SELECT * FROM participants WHERE doctor_id = $did;";

        $retval=mysqli_query($conn, $sql);

        if(mysqli_num_rows($retval) > 0){
          while($row = mysqli_fetch_assoc($retval)){
            if($row["stat"] == "APPORVED"){
              $mid = $row["meeting_id"];
              $sql1 = "SELECT * FROM meeting WHERE mid = $mid;";
              $retval1=mysqli_query($conn, $sql1);
              if(mysqli_num_rows($retval1) > 0){
                while($row1 = mysqli_fetch_assoc($retval1)){
                  $mname = $row1["mname"];
                  echo "<table id='eventsTable'>"
                  . "<tr>"
                  .  "<th>From</th>"
                  .  "<th>Meeting Name</th>"
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
              $pid = $row["pid"];
              echo '<tr>';
              echo '<td>' . $row["names"] . '</td>';
              echo '<td>' . $mname . '</td>';
              echo '<td>' . $row["dateTim"] . '</td>';
              echo '<td>' . $row["loca"] . '</td>';
              echo '<td>' . $row["message"] . '</td>';
              echo "<td><form action='PHP files/event.doctor.handler.php' method='POST'><input type='hidden' name='pid' value='$pid'><button name='cancel' value ='cancel' class='button-cancel'>Cancel</button></td>";
              echo '</tr>';
            }
            
          }
        }
        else{
          echo "<h3> 0 results </h3>";
        }
        mysqli_close($conn);
        ?>
      </table>
    </main>

    <footer>
        <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
</body>
</html>
