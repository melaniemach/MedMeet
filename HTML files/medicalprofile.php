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
  <!-- Nav bar -->
    <header class="header-main">
        <div class="header-main-logo">
          <img src="../images/drugs.png" alt="logo" size>
          <div class="company-name">MedMeet</div>
          <nav class="header-main-nav">
            <ul>
              <li><a href="medicalportal.php">PORTAL</a></li>
              <li><a href="medicalscheduler.php">EVENT SCHEDULER</a></li>
              <li><a href="medeventviewer.php">EVENT VIEWER</a></li>
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
          <p>Office Name: <?php echo $_SESSION['oname'];
          if(isset($_POST["nameedit"])){
            echo "<form action='PHP files/med.info.php' method='POST'>"
            . "<input type='text' name='editname' placeholder='New Office Name' required>"
            . "<button name='editnameb' type='edit' class='button-edit'>Save New Office Name</button>"
            . "</form>";
          }
          else{
            echo "<form action='medicalprofile.php' method='POST'>"
            . "<button name='nameedit' type='edit' class='button-edit'>Edit Office Name</button>"
            . "</form>";
          }
          ?></p>
          <p>Email: <?php echo $_SESSION['oemail']; 
          if(isset($_POST["emailedit"])){
            echo "<form action='PHP files/med.info.php' method='POST'>"
            . "<input type='text' name='editemail' placeholder='New Office Email' required>"
            . "<button name='editemailb' type='edit' class='button-edit'>Save New Office Email</button>"
            . "</form>";
          }
          else{
            echo "<form action='medicalprofile.php' method='POST'>"
            . "<button name='emailedit' type='edit' class='button-edit'>Edit Office Email</button>"
            . "</form>";
          }
          ?></p>
          <div class="medical-office-info">
            <h2>Medical Office Information</h2>
            <p>Field: <?php echo $_SESSION['field'];
            if(isset($_POST["fieldedit"])){
              echo "<form action='PHP files/med.info.php' method='POST'>"
              . "<input type='text' name='editfield' placeholder='New Office Field' required>"
              . "<button name='editfieldb' type='edit' class='button-edit'>Save New Office Field</button>"
              . "</form>";
            }
            else{
              echo "<form action='medicalprofile.php' method='POST'>"
              . "<button name='fieldedit' type='edit' class='button-edit'>Edit Office Field</button>"
              . "</form>";
            }
            ?></p>
            <p>City: <?php echo $_SESSION['city'];
            if(isset($_POST["cityedit"])){
              echo "<form action='PHP files/med.info.php' method='POST'>"
              . "<input type='text' name='editcity' placeholder='New Office City' required>"
              . "<button name='editcityb' type='edit' class='button-edit'>Save New Office City</button>"
              . "</form>";
            }
            else{
              echo "<form action='medicalprofile.php' method='POST'>"
              . "<button name='cityedit' type='edit' class='button-edit'>Edit Office City</button>"
              . "</form>";
            }
            ?></p>
            <p>ZIP: <?php echo $_SESSION['zip'];
            if(isset($_POST["zipedit"])){
              echo "<form action='PHP files/med.info.php' method='POST'>"
              . "<input type='text' name='editzip' placeholder='New Office Zip' required>"
              . "<button name='editzipb' type='edit' class='button-edit'>Save New Office Zip</button>"
              . "</form>";
            }
            else{
              echo "<form action='medicalprofile.php' method='POST'>"
              . "<button name='zipedit' type='edit' class='button-edit'>Edit Office Zip</button>"
              . "</form>";
            }
            ?></p>
            <p>Password: <?php echo $_SESSION['pass'];
            if(isset($_POST["passedit"])){
              echo "<form action='PHP files/med.info.php' method='POST'>"
              . "<input type='text' name='editpass' placeholder='New Office Password' required>"
              . "<button name='editpassb' type='edit' class='button-edit'>Save New Office Password</button>"
              . "</form>";
            }
            else{
              echo "<form action='medicalprofile.php' method='POST'>"
              . "<button name='passedit' type='edit' class='button-edit'>Edit Office Password</button>"
              . "</form>";
            }
            ?></p>
          </div>
        </div>
      </div>
    </main>

    <footer>
        <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
</body>
</html>
