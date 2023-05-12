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
    <link rel="stylesheet" type="text/css" href="../CSS files/docportal.css">
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

    <main>
      <section>
      <h1>Registered Event Requests</h1>
      <h2>Event Name: </h2>
      </section>
      <table id="eventsTable">
        <tr>
          <th>From</th>
          <th>Date & Time</th>
          <th>City & Zip</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
        <?php
        // Example data for demonstration
        $events = [
          ['John Doe', '2023-05-12 10:00 AM', 'New York, 12345', 'Lorem ipsum dolor sit amet'],
          ['Jane Smith', '2023-05-13 2:30 PM', 'Los Angeles, 67890', 'Consectetur adipiscing elit'],
        ];

        foreach ($events as $event) {
          echo '<tr>';
          echo '<td>' . $event[0] . '</td>';
          echo '<td>' . $event[1] . '</td>';
          echo '<td>' . $event[2] . '</td>';
          echo '<td>' . $event[3] . '</td>';
          echo '<td><button class="button-edit">Edit</button><button class="button-cancel">Cancel</button></td>';
          echo '</tr>';
        }
        ?>
      </table>

      <section>
      <h1>Confirmed Events</h1>
      <h2>Event Name: </h2>
      </section>
      <table id="eventsTable">
        <tr>
          <th>From</th>
          <th>Date & Time</th>
          <th>City & Zip</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
        <?php
        // Example data for demonstration
        $events = [
          ['John Doe', '2023-05-12 10:00 AM', 'New York, 12345', 'Lorem ipsum dolor sit amet'],
          ['Jane Smith', '2023-05-13 2:30 PM', 'Los Angeles, 67890', 'Consectetur adipiscing elit'],
        ];

        foreach ($events as $event) {
          echo '<tr>';
          echo '<td>' . $event[0] . '</td>';
          echo '<td>' . $event[1] . '</td>';
          echo '<td>' . $event[2] . '</td>';
          echo '<td>' . $event[3] . '</td>';
          echo '<td><button class="button-cancel">Cancel</button></td>';
          echo '</tr>';
        }
        ?>
      </table>
    </main>

    <footer>
        <p>&copy; 2023 MedMeet. All rights reserved.</p>
    </footer>
</body>
</html>
