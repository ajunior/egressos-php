<?php

require_once 'model/Egresso.php';
$e = new Egresso;

session_start();

if(!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit;
}

?>
