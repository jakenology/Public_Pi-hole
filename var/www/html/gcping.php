<?php
$a = popen('ping -c 10 www.google.com', 'r');

while($b = fgets($a, 2048)) {
echo $b."<br>\n";
ob_flush();flush();
}
pclose($a);
?>
