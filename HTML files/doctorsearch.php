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
  <body>
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
        <div class="search-container">
            <form action="doctorsearch.php" method="POST" class="search-form">
                <label for="search">Search for medical offices:</label>
                <input type="text" id="search" name="search" placeholder="Search city, ZIP code, or field">
                <button name="submit" type="submit">Search</button>
            </form>              
        </div>        
    </main>

    <?php
    // Check if the form is submitted
    if(isset($_POST["submit"])){
      // Get the search entry from the form
      $entry = $_POST["search"];  

      // Include the database connection file
      require_once 'PHP files/dbh.inc.php';

      // SQL query to count total offices with the given city, ZIP code, or field
      $sql = "SELECT COUNT(*) as total FROM office WHERE city LIKE '%$entry%' OR zip = '$entry' OR field = '$entry'";
      // SQL query to retrieve office details with the given city, ZIP code, or field
      $sql1 = "SELECT * FROM office WHERE city LIKE '%$entry%' OR zip = '$entry' OR field = '$entry'";

      // Execute the query
      $result=mysqli_query($conn, $sql);
      // Get the count of total offices
      $data=mysqli_fetch_assoc($result);
      // Display search results
      echo "<h3> Search Results For " . htmlspecialchars($entry) . "</h3><br>";
      // Display total results count
      echo "<h3> Total Results: " . $data['total'] . "</h3><br>";
      
      // Execute the query to retrieve office details 
      $retval=mysqli_query($conn, $sql1);

      // Check if there are offices found
      if(mysqli_num_rows($retval) > 0){
        // Loop through each office
        while($row = mysqli_fetch_assoc($retval)){
          $oid = $row['oid']; // Get the office ID
          echo "<table> <tr> <th>Office Name</th> <th>Office Email</th> <th>Office Field</th> <th>Office City</th> <th>Office Zip</th> </tr>" 
          ."<tr> <td>{$row['oname']} </td>"
          ."<td>{$row['oemail']} </td>"
          ."<td>{$row['field']} </td>"
          ."<td>{$row['city']} </td>"
          ."<td>{$row['zip']} </td>"
          ."</tr></table> <br>";
          // SQL query to retrieve meetings for the current office
          $sql2 = "SELECT * FROM meeting WHERE office_id = $oid;";
          // Execute the query to retrieve meeting details
          $retval1=mysqli_query($conn, $sql2);

          // Check if there are meetings found for the office
          if(mysqli_num_rows($retval1) > 0)
          {
            while($rows = mysqli_fetch_assoc($retval1)){ 
              echo "<table> <tr> <th>Event Name</th> <th>Event Discription</th> <th>Event Date & Time</th> <th>Event City & Zip</th> <th>Message: </th><th>Action</th></tr>";
              $mid = $rows['mid']; // Get the meeting ID
              echo "<tr> <td>{$rows['mname']} </td>"
              ."<td style='width:150px'>{$rows['descrip']} </td>"
              ."<td>{$rows['date']}, {$rows['sTime']} - {$rows['eTime']} </td>"
              ."<td>{$rows['city']}, {$rows['zip']}</td>"
              ."<td> <form action='PHP files/event.join.php' method = 'POST' class='message-form'>
                      <textarea name='message' class='textbox' placeholder='Message for Medical Office' id='mess' rows='2' cols='20' maxwidth='200' required></textarea>
                      <input type='hidden' name='mid' value='$mid'>
                </td>"
              ."<td> <button type='join' name='join' class='event-button' value='join'>Join Event</button>
              </form>
              </td>"
              ."</tr> </table> <br>";
            } //end of while
          }
          else
          {
            echo "0 results";
          }
        } //end of while
      }
      else
      {
        echo "<h3> 0 results </h3>";
      }
      mysqli_close($conn);
    }
    ?>

    <footer>
      <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
  </body>
</html>
