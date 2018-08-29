<?php
// Get Client IP Address
$ipaddress = $_SERVER['REMOTE_ADDR'];

// Set Response Header
header('Content-Type: text/plain');

// Echo the IP
echo $ipaddress;
?>
