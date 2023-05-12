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
    <link rel="stylesheet" type="text/css" href="../CSS files/search.css">

  </head>
  <!-- NEED LOGIN PAGE BEFORE DOING THIS -->
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

    <main>
        <div class="search-container">
            <form action="doctorsearch.php" method="POST">
                <label for="search">Search for medical offices:</label>
                <input type="text" id="search" name="search" placeholder="Search city or ZIP code">
                <button name="submit" type="submit">Search</button>
            </form>              
        </div>        
    </main>

    <?php
    if(isset($_POST["submit"])){

      $entry = $_POST["search"];

      require_once 'PHP files/dbh.inc.php';
      $sql = "SELECT COUNT(*) as total FROM office WHERE city = $entry or zip = $entry;";
      $result=mysqli_query($conn, $sql);
      $data=mysqli_fetch_assoc($result);
      echo "Total Results:" . $data['total'] . "<br>"."--------------------------------<br>";
      
      $sql = "SELECT * FROM office WHERE city = $entry or zip = $entry;";
      $retval=mysqli_query($conn, $sql);

      if(mysqli_num_rows($retval) > 0)
        {
            while($row = mysqli_fetch_assoc($retval)){
            echo " Office Name :{$row['oname']} <br> "
            ."Office Email :{$row['oemail']} <br> "
            ."Office Field :{$row['field']} <br> "
            ."Office City :{$row['city']} <br> "
            ."Office Zip :{$row['zip']} <br> "
            ."--------------------------------<br>";
            } //end of while
        }
        else
        {
            echo " \n 0 results";
        }
      mysqli_close($conn);
    }
    
    ?>

    <footer>
      <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
  </body>
</html>
