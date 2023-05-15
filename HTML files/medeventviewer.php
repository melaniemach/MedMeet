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
            <li><a href="medicalportal.php">OFFICE PORTAL</a></li>
            <li><a href="medicalscheduler.php">EVENT SCHEDULER</a></li>
            <li><a href="medeventviewer.php">EVENT VIEWER</a></li>
            <li><a href="medicalprofile.php">PROFILE</a></li>
            <li><a href="../HTML files/PHP files/logout.inc.php">LOG OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <section>
        <h1>Events you are hosting</h1>
        <?php
          require_once 'PHP files/dbh.inc.php';

          $oid = $_SESSION["oid"];
  
          $sql = "SELECT * FROM meeting WHERE office_id = $oid;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<table> <tr> <th>Event Name</th> <th>Event Discription</th> <th>Event Date & Time</th> <th>Event City & Zip</th> <th># of Participants</th></tr>";
              $mid = $row['mid']; // Get the meeting ID
              $sql1 = "SELECT COUNT(*) as total FROM participants WHERE meeting_id = $mid;";
              $result1 = mysqli_query($conn, $sql1);
              if (mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)) {
                  $total = $row1['total']; // Get the total participants
                }
              }
              echo "<tr> <td>{$row['mname']} </td>"
              ."<td style='width:150px'>{$row['descrip']} </td>"
              ."<td>{$row['date']}, {$row['sTime']} - {$row['eTime']} </td>"
              ."<td>{$row['city']}, {$row['zip']}</td>"
              ."<td>$total</td>"
              ."</tr> </table> <br>";
            }
          }
          mysqli_close($conn);
        ?>
    </main>
</body>
</html>