<main>
  <div class="container">

    <?php
      if(isset($_SESSION['personeelsnummer']) && isset($_SESSION['rol']) == 1){

      } else {
        header("Location: index.php?page=home");
      }

      if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php?page=home");
      }
    ?>

    <div class="uitloggen">
      <form method="post">
        <button name="logout" type="submit" class="btn">Uitloggen</button>
      </form>
    </div>

    <button type="button" class="btn" onclick="scrollWin()" id="myBtn">▲</button>

    <br><br>

    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Welkom bij het admin-panel!</h1>
      </div>
    </div>

    <br>
    <hr class="style1">

    <div class="row">
      <div class="col-12 col-md-6">
        <a href="index.php?page=klachten" class="box-1 text-center">Lijst alle klachten</a>
      </div>

      <div class="col-12 col-md-6">
        <a href="index.php?page=klacht_add" class="box-2 text-center">Klacht indienen</a>
      </div>
    </div>

  </div>
  <br>
</main>
