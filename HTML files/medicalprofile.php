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
              <li><a href="medicalportal.php">PORTAL</a></li>
              <li><a href="medicalscheduler.php">EVENT SCHEDULER</a></li>
              <li><a href="medicalsearch.php">SEARCH</a></li>
              <li><a href="medicalprofile.php">PROFILE</a></li>
              <li><a href="../HTML files/PHP files/logout.inc.php">LOG OUT</a></li>
            </ul>
          </nav>
        </div>
    </header>
    <main>
      <div class="container">
        <div class="common-field">
          <h1>User Profile</h1>
          <h2>Basic Information</h2>
          <p>Office Name: <?php echo $_SESSION['oname']; ?></p>
          <p>Email: <?php echo $_SESSION['oemail']; ?></p>
          <div class="medical-office-info">
            <h2>Medical Office Information</h2>
            <p>Field: <?php echo $_SESSION['field'];?></p>
            <p>City: <?php echo $_SESSION['city'];?></p>
            <p>ZIP: <?php echo $_SESSION['zip'];?></p>
            <p>Password: <?php echo $_SESSION['pass'];?></p>
          </div>
        </div>
      </div>
    </main>

    <footer>
        <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
</body>
</html>
