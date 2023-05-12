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
      if(is_numeric($entry)){
        $sql = "SELECT COUNT(*) as total FROM office WHERE zip = $entry";
        $sql1 = "SELECT * FROM office WHERE zip = $entry;";
      }
      else{
        $sql = "SELECT COUNT(*) as total FROM office WHERE city LIKE '$entry';";
        $sql1 = "SELECT * FROM office WHERE city LIKE '$entry';";
      }
      
      $result=mysqli_query($conn, $sql);
      $data=mysqli_fetch_assoc($result);
      echo "Total Results:" . $data['total'] . "<br>";
      
       
      $retval=mysqli_query($conn, $sql1);

      

      if(mysqli_num_rows($retval) > 0)
        {
            while($row = mysqli_fetch_assoc($retval)){
              $oid = $row['oid'];
              echo "<table> <tr> <th>Office Name</th> <th>Office Email</th> <th>Office Field</th> <th>Office City</th> <th>Office Zip</th> </tr>" 
              ."<tr> <td>{$row['oname']} </td>"
              ."<td>{$row['oemail']} </td>"
              ."<td>{$row['field']} </td>"
              ."<td>{$row['city']} </td>"
              ."<td>{$row['zip']} </td>"
              ."</tr></table> <br>";
              $sql2 = "SELECT * FROM meeting WHERE office_id = $oid;";
              $retval1=mysqli_query($conn, $sql2);

              if(mysqli_num_rows($retval1) > 0)
              {
                while($rows = mysqli_fetch_assoc($retval1)){ 
                  echo "<table> <tr> <th>Event Name</th> <th>Event Discription</th> <th>Event Time</th> <th>Event Date</th> <th>Event City</th> <th>Event Zip</th> </tr>";
                  echo "<tr> <td>{$rows['mname']} </td>"
                  ."<td style='width:150px'>{$rows['descrip']} </td>"
                  ."<td>{$rows['sTime']} - {$rows['eTime']} </td>"
                  ."<td>{$rows['date']} </td>"
                  ."<td>{$rows['city']} </td>"
                  ."<td>{$rows['zip']} </td>"
                  ."</tr> </table> <br>";
                  echo "<form action='' method = 'POST'>"
                  ."<label for='mess'>Message</label>"
                  ."<textarea name='mess' class='textbox' placeholder='Message for Medical Office' id='mess' rows='3' cols='30' maxlength='300' wrap='soft'></textarea>"
                  ."<button type='submit' name='join' class='button' value='join'>Join Event</button>"
                  ."</form>";
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
            echo "0 results";
        }
      mysqli_close($conn);
    }
    ?>

    <footer>
      <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
  </body>
</html>
