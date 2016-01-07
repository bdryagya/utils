<?php

require __DIR__ . "/../vendor/autoload.php";

use Bdryagya\Utils\Ip;

$ip = "10.1.2.131";
$networks = [
    "10.2.3.4/24",
    "10.1.2.0/25",
    "10.1.2.128/25",
    "192.168.0.100",
]; 

$ipUtil = new Ip;

$network = $ipUtil->inNetwork($networks, $ip);

echo $ip . ' belogs to ' . $network . PHP_EOL;

