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
    <div class="container">
      <div class="common-field">
        <section>
          <h1>User Profile</h1>
        </section>
          <h2>Basic Information</h2>
          <p>Name: <?php echo $_SESSION["fname"] . ' ' . $_SESSION["lname"]; 
          if(isset($_POST["fnameedit"])){
            echo "<form action='PHP files/doc.info.php' method='POST'>"
            . "<input type='text' name='feditname' placeholder='New First Name' required>"
            . "<button name='feditnameb' type='edit' class='button-edit'>Save New First Name</button>"
            . "</form>";
          }
          elseif(isset($_POST["lnameedit"])){
            echo "<form action='PHP files/doc.info.php' method='POST'>"
            . "<input type='text' name='leditname' placeholder='New Last Name' required>"
            . "<button name='leditnameb' type='edit' class='button-edit'>Save New Last Name</button>"
            . "</form>";
          }
          else{
            echo "<form action='doctorprofile.php' method='POST'>"
            . "<button name='fnameedit' type='edit' class='button-edit'>Edit First Name</button>"
            . "<button name='lnameedit' type='edit' class='button-edit'>Edit Last Name</button>"
            . "</form>";
          }
          ?></p>
          <p>Email: <?php echo $_SESSION["demail"]; 
          if(isset($_POST["emailedit"])){
            echo "<form action='PHP files/doc.info.php' method='POST'>"
            . "<input type='text' name='editemail' placeholder='New Doctor Email' required>"
            . "<button name='editemailb' type='edit' class='button-edit'>Save New Doctor Email</button>"
            . "</form>";
          }
          else{
            echo "<form action='docotorprofile.php' method='POST'>"
            . "<button name='emailedit' type='edit' class='button-edit'>Edit Doctor Email</button>"
            . "</form>";
          }
          ?></p>
          <div class="doctor-info">
            <h2>Doctor Information</h2>
            <p>City/Zip: <?php echo $_SESSION["city"] . '/' . $_SESSION["zip"]; 
            if(isset($_POST["cityedit"])){
              echo "<form action='PHP files/doc.info.php' method='POST'>"
              . "<input type='text' name='editcity' placeholder='New Doctor City' required>"
              . "<button name='editcityb' type='edit' class='button-edit'>Save New Doctor City</button>"
              . "</form>";
            }
            elseif(isset($_POST["zipedit"])){
              echo "<form action='PHP files/doc.info.php' method='POST'>"
              . "<input type='text' name='editzip' placeholder='New Doctor Zip' required>"
              . "<button name='editzipb' type='edit' class='button-edit'>Save New Doctor Zip</button>"
              . "</form>";
            }
            else{
              echo "<form action='docotorprofile.php' method='POST'>"
              . "<button name='cityedit' type='edit' class='button-edit'>Edit Doctor City</button>"
              . "<button name='zipedit' type='edit' class='button-edit'>Edit Doctor Zip</button>"
              . "</form>";
            }
            ?></p>
            <p>Password: <?php echo $_SESSION["pass"]; 
            if(isset($_POST["passedit"])){
              echo "<form action='PHP files/doc.info.php' method='POST'>"
              . "<input type='text' name='editpass' placeholder='New Doctor Password' required>"
              . "<button name='editpassb' type='edit' class='button-edit'>Save New Doctor Password</button>"
              . "</form>";
            }
            else{
              echo "<form action='docotorprofile.php' method='POST'>"
              . "<button name='passedit' type='edit' class='button-edit'>Edit Doctor Password</button>"
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
