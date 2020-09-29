<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Camping de Maasvallei</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
<!-- header start -->
    <header>
      <nav class="navbar navbar-dark navbar-expand-sm">

        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapse_target">
        <a class="navbar-brand"> <img src="./images/logo.png" alt="logo" /> </a>

          <ul class="navbar-nav">
            <?php
              if(!isset($_SESSION["ID"])){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=home">Home</a>
            </li>
          <?php } ?>
            <?php
            if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] == "ACTIEF") {
              if($_SESSION["rol"]==0){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=userpanel">Home</a>
            </li>
            <?php
          }elseif($_SESSION["rol"]==1){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=adminpanel">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=klacht_add">Klacht indienen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=klachten">Klachten</a>
            </li>
          </ul>
        </div>
        <?php
          }
        }
        ?>

      </nav>
    </header>
