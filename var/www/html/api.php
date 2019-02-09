<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    $output = shell_exec('stats');
    echo $output;
?>
