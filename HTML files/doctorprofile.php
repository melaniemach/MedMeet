<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- CSS styles -->
    <link rel="stylesheet" href="../CSS files/reset.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/profile.css">
</head>
<body>
    <header class="header-main">
        <div class="header-main-logo">
          <img src="../images/drugs.png" alt="logo" size>
          <div class="company-name">MedMeet</div>
          <nav class="header-main-nav">
            <ul>
              <li><a href="doctorportal.php">PORTAL</a></li>
              <li><a href="doctorscheduler.php">EVENT SCHEDULER</a></li>
              <li><a href="doctorsearch.php">SEARCH</a></li>
              <li><a href="doctorprofile.php">PROFILE</a></li>
              <li><a href="../HTML files/PHP files/logout.inc.php">LOG OUT</a></li>
            </ul>
          </nav>
        </div>
    </header>

        <div class="common-field">
            <h1>User Profile</h1>
            <h2>Basic Information</h2>
            <p>Name: <?php echo $_SESSION["fname"] . ' ' . $_SESSION["lname"]; ?></p>
            <p>Email: <?php echo $_SESSION["demail"]; ?></p>
        </div>
        <div class="doctor-info">
            <h2>Doctor Information</h2>
            <p>City/Zip: <?php echo $_SESSION["city"] . '/' . $_SESSION["zip"] ?></p>
            <p>Password: <?php echo $_SESSION["pass"]; ?></p>
        </div>
    
</body>
</html>
