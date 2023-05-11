<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS files/reset.css">
  <link rel="stylesheet" type="text/css" href="../CSS files/style.css">
  <link rel="stylesheet" type="text/css" href="../CSS files/form.css">
  
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

  <form action="../HTML files/PHP files/office.meeting.inc.php" method="post">
    <!--Heading for scheduling form-->
    <div class="form-header">
      <h3>Event Scheduler</h3>
      <p>Schedule a meeting with a medical office</p>
    </div>

    <!--Heading for scheduling form-->
    <div class="form-container">
      <!--Meeting name-->
      <label for="meeting">Meeting</label>
      <input type="text" name="mname" placeholder="Enter Event Name" class="textbox" id="mname" required> <br>
      <!-- Doctor email -->
      <label for="demail">Medical Office Email</label>
      <input type="text" name="email" placeholder="Enter Medical Office Email" class="textbox" id="email" required> <br>
      <!--City-->
      <label for="City">City</label>
      <input type="text" name="city" placeholder="Enter City of Event" class="textbox" id="city" required></br>
      <!--Zip-->
      <label for="zip">Zip</label>
      <input type="text" name="zip" placeholder="Enter Zip Code of Event" class="textbox" id="zip" required></br>
      <!--Start Time-->
      <label for="startTime">Start Time</label>
      <input type="time" name="start" placeholder="Start Of Event" class="time" id="start" required></br>
      <!--End Time-->
      <label for="endTime">End Time</label>
      <input type="time" name="end" placeholder="End Of Event" class="time" id="end" required></br>
      <!--Date-->
      <label for="startTime">Date of Event</label>
      <input type="date" name="date" placeholder="Date Of Event" class="date" id="date" required></br>
      <!--City-->
      <label for="Desc">Description</label><br>
      <textarea name="desc" class="textbox" placeholder="Description of Event" id="desc" rows="3" cols="15" maxlength="300" wrap="soft"></textarea></br>
      <!--Submit button-->
      <button type="submit" name="submit" class="button" value="Schedule">Schedule</button>
    </div>
  
  </form>

</body>

</html>