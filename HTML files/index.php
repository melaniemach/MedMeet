<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS styles -->
    <link rel="stylesheet" href="../CSS files/reset.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/form.css">
    <link rel="stylesheet" type="text/css" href="../CSS files/index.css">

  </head>
  
  <body>
    <!-- Nav bar -->
    <header class="header-main">
      <div class="header-main-logo">
        <img src="../images/drugs.png" alt="logo" size>
        <div class="company-name">MedMeet</div>
        <nav class="header-main-nav">
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li class="dropdown">
              <a href="#" class="dropbtn">SIGN UP </a>
              <div class="dropdown-content">
                <a href="doctorsu.html">DOCTORS</a>
                <a href="medicalsu.html">MEDICAL OFFICES</a>
              </div>
            </li>
            <li class="dropdown">
              <a href="#" class="dropbtn">LOGIN </a>
              <div class="dropdown-content">
                  <a href="doctorlogin.html">DOCTORS</a>
                <a href="medicallogin.html">MEDICAL OFFICES</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    
  
  <main>
		<section>
			<h1>Welcome to MedMeet</h1>
      <h2>About Us</h2></br>
			<p>Our platform allows medical offices to create events and approve or reject event requests from doctors.</p>
			<p>On the other end, doctors can sign up for access to our platform to easily find and connect with medical practices in their desired areas.</p>
		</section>
    <?php
    require_once 'PHP files/dbh.inc.php'; // Include the database connection file

    $sql = "SELECT COUNT(*) as totalD FROM doctors";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
      while($rows = mysqli_fetch_assoc($result)){ 
        $total = $rows['totalD'];
      }
    }

    if($total == 0) {
      $fname = "Joe";
      $lname = "Mama";
      $email = "joedoctor@test.com";
      $pass = "joe123";
      $city = "Fullerton";
      $zip = "92831";
      $sql ="INSERT INTO doctors (fname, lname, demail, pass, city, zip) VALUES (?, ?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("location: ../HTML files/index.php?error=stmtfailed");
          exit();
      }
    
    
    
      mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $pass, $city, $zip);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
    
    ?>
    <?php
    require_once 'PHP files/dbh.inc.php'; // Include the database connection file

    $sql = "SELECT COUNT(*) as totalO FROM office";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
      while($rows = mysqli_fetch_assoc($result)){ 
        $total = $rows['totalO'];
      }
    }

    if($total == 0) {

      $oname = "Kaiser";
      $email = "kaiser@kp.org";
      $pass = "kaiser123";
      $field = "Insurance";
      $city = "Los Angeles";
      $zip = "90027";

      $sql ="INSERT INTO `office`(`oname`, `oemail`, `pass`, `field`, `city`, `zip`) VALUES (?, ?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("location: ../HTML files/index.php?error=stmtfailed");
          exit();
      }



      mysqli_stmt_bind_param($stmt, "ssssss", $oname, $email, $pass, $field, $city, $zip);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
    ?>

    <section id="get-started">
      <h2>Get Started</h2>
      <div class="get-started-options">
          <a href="doctorsu.html">
              <h3>Doctors Click Here To Get Started Here</h3>
              <h4>Sign up for access to our platform to easily find and connect with medical offices in your desired areas.</h4>
          </a>
          <a href="medicalsu.html">
              <h3>Medical Offices Here To Get Started Here</h3>
              <h4>Create your events to find and connect with doctors in your area, and approve or reject appointments from doctors.</h4>
          </a>
      </div>
    </section>
  </main>

	<footer>
		<p>&copy; 2023 MedMeet. All rights reserved.</p>
	</footer>
</body>
</html>