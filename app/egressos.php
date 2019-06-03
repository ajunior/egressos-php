<?php

require_once 'model/Egresso.php';
$eg = new Egresso;

session_start();

if(!isset($_SESSION['userid'])) {
    header("location: index.php");
    exit;
}

?>

<p>
    <a href="logout.php" class="btn btn-outline-primary">Sair</a></p>
