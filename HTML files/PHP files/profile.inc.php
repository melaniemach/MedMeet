<?php
header('Content-type: text/css');

if ($email == 'doctor') {
    echo "
    .doctor-info {
        display: block;
    }
    ";
} elseif ($email == 'medical') {
    echo "
    .medical-office-info {
        display: block;
    }
    ";
}
?>
