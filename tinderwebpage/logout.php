<?php
require 'session.php';
$session = new Session();
$session->logout();
header('Location: http://localhost:8008/about.php');
?>
