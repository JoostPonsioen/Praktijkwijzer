<main>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="banner">
          <img class="bannerlogo" id="bannerlogo" src="../images/logo.png" />
          <button type="button" class="btn" onclick="scrollWin()" id="myBtn">▲</button>
        </div>
      </div>
    </div>

    <br /><br />
    <hr class="style1">

    <div class="row">
      <div class="col-12">
        <h2 class="text-center">Inloggen</h2><br />
        <form action="" method="post" class="form-signin">

          <div class="form-label-group">
            <input type="text" id="inputEmail" name="gebruikersnaam" class="form-control" placeholder="Email address"
              required autofocus>
            <label for="inputEmail">Gebruikersnaam</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputPassword" name="wachtwoord" class="form-control" placeholder="Password"
              required>
            <label for="inputPassword">Wachtwoord</label>
          </div>

          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
          </div>

          <button class="btn btn-lg btn-block text-uppercase" type="submit" name="submit">Inloggen</button>
        </form>
      </div>
    </div>


  </div>
</main>

<?php
//echo password_hash("root", PASSWORD_DEFAULT);

if(isset($_POST['submit'])){
  $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
  $wachtwoord = htmlspecialchars($_POST['wachtwoord']);

  if (is_numeric($gebruikersnaam)){
    $sql = "SELECT users_id, vouchercode FROM personeel WHERE users_id = :users_id AND vouchercode = :vouchercode";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindParam(":users_id", $gebruikersnaam);
    $stmt->bindParam(":vouchercode", $wachtwoord);
    $stmt->execute();
    if ($stmt->rowCount() == 1 ){
      if($r = $stmt->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['personeelsnummer'] = $r['users_id'];
        $_SESSION["STATUS"] = "ACTIEF";
        $_SESSION['rol'] = $r['rol'];
        $_SESSION["ID"] = session_id();
        $_SESSION['voucher'] = $r['vouchercode'];
        header('Location: index.php?page=userpanel');
        exit();
      }
    }
  } else {

    $sql = "SELECT * FROM users WHERE gebruikersnaam = :users_id";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindParam(":users_id", $gebruikersnaam);
    $stmt->execute();
    $res = $stmt->fetchAll();

    if (count($res)  > 0 ){

      if(password_verify($wachtwoord, $res[0]['wachtwoord'])) {

        $_SESSION['personeelsnummer'] = $res[0]['gebruikersnaam'];
        $_SESSION['rol'] = $res[0]['rol'];
        $_SESSION["STATUS"] = "ACTIEF";
        $_SESSION["ID"] = $res[0]['id'];
        header('Location: index.php?page=adminpanel');
        exit();
      }
    }
  }

}
?>