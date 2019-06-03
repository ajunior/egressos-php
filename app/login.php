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
    <link rel="stylesheet" href="public/assets/css/style.css">
  </head>

  <body>
    <main>
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo@email.com">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Acessar</button>
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