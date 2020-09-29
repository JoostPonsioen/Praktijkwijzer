<main>
<div class="container">

<?php
if(isset($_SESSION['personeelsnummer'])){

} else {
  header("Location: index.php?page=home");
  exit();
}

if(isset($_POST['logout'])){
  session_destroy();
  header("Location: index.php?page=home");
  exit();
}
?>

<br /><h1 class="inschrijvingen text-center">Klacht indienen</h1>

<div class="uitloggen">
  <form method="post">
    <button name="logout" type="submit" class="btn">Uitloggen</button>
  </form>
</div><br />

<button type="button" class="btn" onclick="scrollWin()" id="myBtn">▲</button>

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
        </select>
      </div>

    
  </div>
  <div class="col-6">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Omschrijving</label>
      <textarea name="omschrijving" class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
    </div>
    <button name="submit" type="submit" class="btn">Indienen</button>
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
    NULL,
    NULL,
    NULL,
    $datum,
    $omschrijving

    
    )

  );

  }
catch(PDOException $e) {
    $melding = "Kon geen nieuwe personeel maken." . $e->getMessage();
    echo $melding;
  }
}


?>
<br><br><br><br><br><br><br><br><br><br>
</main>
