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
    <link rel="stylesheet" href="../CSS files/reset.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/schedule.css">

  </head>
  <!-- NEED LOGIN PAGE BEFORE DOING THIS -->
  <body>
    <header class="header-main">
      <div class="header-main-logo">
        <img src="../images/drugs.png" alt="logo" size>
        <div class="company-name">MedMeet</div>
        <nav class="header-main-nav">
          <ul>
            <li><a href="medicalportal.php">PORTAL</a></li>
            <li><a href="medicalscheduler.php">EVENT SCHEDULER</a></li>
            <li><a href="PHP files/logout.inc.php">LOG OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main>
      <h1>Schedule an Appointment</h1>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>

            <input type="submit" value="Submit">
        </form>
    </main>

    <footer>
      <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
  </body>
</html>
