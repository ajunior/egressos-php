<?php

require_once 'model/User.php';
$u = new User;

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
  <main class="card card-body">
    <h5 class="card-title">Acessar lista de egressos</h5>
    <form method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="exemplo@email.com">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" name="passwd" placeholder="Digite sua senha">
      </div>
      <input type="submit" class="btn btn-primary" value="Acessar">
    </form>
  </main>

  <?php
      if(isset($_POST['email'])) {
          $email = addslashes($_POST['email']);
          $passwd = addslashes($_POST['passwd']);

          if(!empty($email) && !empty($passwd)) {
              $u->connect();

              if($u->err == "") {
                  if($u->login($email, $passwd)) {
                    header("location: egressos.php");
                  }
              } else {
                  // deu erro
              }
          }
      }
  ?>

</body>
</html>

