<?php

require_once 'model/Egresso.php';
$eg = new Egresso;

session_start();

if(!isset($_SESSION['userid'])) {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Egressos IFPB</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Egressos</a>
    <form class="form-inline">
      <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Sair</a>
    </form>
  </nav>

  <section id="lista-egressos">

  </section>
</body>
</html>