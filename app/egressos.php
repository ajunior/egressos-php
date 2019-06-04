<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['userid'])) {
    header("location: index.php");
    exit;
}

require_once 'model/Egresso.php';
$eg = new Egresso;

$eg->connect();

if($eg->err == "") {
    $egressos = $eg->listaEgressos();
} else {
    ?>
      <div class="alert alert-danger" role="alert">
        <?php echo "Erro: " . $u->err; ?>
      </div>
    <?php
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
    <a class="navbar-brand">Egressos do IFPB</a>
    <form class="form-inline">
      <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Sair</a>
    </form>
  </nav>

  <section id="lista-egressos" class="egressos">
      <?php
          setLocale(LC_COLLATE, 'pt_BR.utf8');
          array_multisort(array_column($egressos, 'nomeCompactado'), SORT_ASC, $egressos);

          foreach($egressos as $egresso) {
              if(!is_null($egresso['linkedin'])) {
                  $avatar = "placeholder.jpg";
                  $linkedin = "";
                  $github = "";
                  $facebook = "";
                  $instagram = "";
                  $twitter = "";

                  if (!is_null($egresso['avatar']))
                      $avatar = $egresso['avatar'];

                  if (!is_null($egresso['linkedin']))
                      $linkedin = "<a target='_blank' href='{$egresso['linkedin']}'><img src='public/img/icons/linkedin.png' alt='linkedin'/></a>";

                  if (!is_null($egresso['github']))
                      $github = "<a target='_blank' href= {$egresso['github']}'><img src='public/img/icons/github.png' alt='github'/></a>";

                  if (!is_null($egresso['facebook']))
                      $facebook = "<a target='_blank' href='{$egresso['facebook']}'><img src='public/img/icons/facebook.png' alt='facebook'/></a>";

                  if (!is_null($egresso['instagram']))
                      $instagram = "<a target='_blank' href='{$egresso['instagram']}'><img src='public/img/icons/instagram.png' alt='instagram'/></a>";

                  if (!is_null($egresso['twitter']))
                      $twitter = "<a target='_blank' href='{$egresso['twitter']}'><img src='public/img/icons/twitter.png' alt='twitter'/></a>";


                  echo
                  "<div class='egresso'>
                    <figure>
                      <img src='public/img/egressos/{$avatar}'>
                    </figure>
                    <div class='icons'>
                      $linkedin
                      $github
                      $facebook
                      $instagram
                      $twitter
                    </div>
                    <div class='info'>
                    </div>
                    <div class='name'>
                      <h2>{$egresso['nomeCompactado']}</h2>
                    </div>
                  </div>";
              }
          }
      ?>
  </section>
</body>
</html>