<?php

$mysqli = new Mysqli("localhost", "root", "vmbn");
if($mysqli->connect_errno) die($mysqli->connect_error);
$mysqli->close();

echo 'SaaS Site created success!<br>';
echo 'SaaS DB connected success!<br>';
