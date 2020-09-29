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

    <br />
    <h1 class="inschrijvingen text-center">Klacht indienen</h1><br>

    <div class="row">
      <div class="col-6">
        <form method="POST" action="">

          <div class="form-group">
            <label for="exampleFormControlSelect1">Categorie</label>
            <select name="categorie" class="form-control" id="exampleFormControlSelect1">
              <option value="sanitair">sanitair</option>
              <option value="campingsplek">campingsplek</option>
              <option value="overlast">overlast</option>
              <option value="ict">ict</option>
              <option value="parkeerplaats">parkeerplaats</option>
              <option value="overig">overig</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Melder</label>
            <select name="melder" class="form-control" id="exampleFormControlSelect1">
              <option value="campingsgast">campingsgast</option>
              <option value="beheerder">beheerder</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control" id="exampleFormControlSelect1">
              <option value="in behandeling">in behandeling</option>
              <option value="afgehandeld">afgehandeld</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Prioriteit</label>
            <select name="prioriteit" class="form-control" id="exampleFormControlSelect1">
              <option value="laag">laag</option>
              <option value="middel">middel</option>
              <option value="hoog">hoog</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Actienemer</label>
            <select name="actienemer" class="form-control" id="exampleFormControlSelect1">
              <option value="onbekend">onbekend</option>
              <option value="administratief medewerker">administratief medewerker</option>
              <option value="schoonmaker">schoonmaker</option>
              <option value="onderhoudsmedewerker">onderhoudsmedewerker</option>
            </select>
          </div>

        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Omschrijving</label>
            <textarea name="omschrijving" class="form-control" id="exampleFormControlTextarea1" rows="8"
              required></textarea>
          </div>
          <button name="submit" type="submit" class="btn btn-primary">Indienen</button>
          </form>
        </div>
      </div>

  </div>
  <!-- End container-->

  <?php 

  if(isset($_POST['submit'])){
    $melding = "";
    $categorie = $_POST["categorie"];
    $melder = $_POST["melder"];
    $prioriteit = $_POST["prioriteit"];
    $status = $_POST["status"];
    $actienemer = $_POST["actienemer"];
    $omschrijving = $_POST["omschrijving"];
    $datum = date("Y/m/d");

    $sql = "INSERT INTO klachten (id, categorie, melder, prioriteit, statuss, actienemer, datum, omschrijving) 
    values (?,?,?,?,?,?,?,?)";
    $stmt = $verbinding->prepare($sql);
    try{
    $stmt->execute(array(
      NULL,
      $categorie,
      $melder,
      $prioriteit,
      $status,
      $actienemer,
      $datum,
      $omschrijving
      ));
      }
      catch(PDOException $e) {
          $melding = "Kon geen nieuwe personeel maken." . $e->getMessage();
          echo $melding;
        }
      }
  ?>


  </div>
  <br>
</main>