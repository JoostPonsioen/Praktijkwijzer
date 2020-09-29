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

    <h2 class="inschrijvingen text-center">Wijzig klachten</h2><br>

    <div class="row">
      <div class="col-12">


        <?php 

        $id = "";
        $melding = "";
        $categorie = "";
        $melder = "";
        $prioriteit = "";
        $status = "";
        $actienemer = "";
        $omschrijving = "";
        $datum = date("Y/m/d");



        function getPosts()
        {
        $posts = array();
        
        $posts[0] = $_POST['id'];
        $posts[1] = $_POST['categorie'];
        $posts[2] = $_POST['melder'];
        $posts[3] = $_POST['prioriteit'];
        $posts[4] = $_POST['status'];
        $posts[5] = $_POST['actienemer'];
        $posts[6] = date("Y/m/d");
        $posts[7] = $_POST['omschrijving'];
        
        return $posts;
        }
        //Search Data
        if(isset($_POST['search']))
        {
            $data = getPosts();
            if(empty($data[0]))
            {
              echo '<i style="color:red;">
              Vul een klacht id in! </i> ';
            
            }  else {
                
                $searchStmt = $verbinding->prepare('SELECT * FROM klachten WHERE id = :id');
                $searchStmt->execute(array(
                            ':id'=> $data[0]
                ));
                
                if($searchStmt)
                {
                    $user = $searchStmt->fetch();
                    if(empty($user))
                    {
                      echo '<i style="color:red;">
                      Vul een juiste klacht id in! </i> ';
                    }
                    
                    $id = $user[0];
                    $categorie = $user[1];
                    $melder = $user[2];
                    $prioriteit = $user[3];
                    $status = $user[4];
                    $actienemer = $user[5];
                    $datum = $user[6];
                    $omschrijving = $user[7];
                }
                
            }
        }

        //Update Data

        if(isset($_POST['update']))
        {
            $data = getPosts();
            if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4]) || empty($data[5]) || empty($data[6]) || empty($data[7]))
            {
                echo '<i style="color:red;">
                Vul alle velden in! </i> ';

            }  else {
                
                $updateStmt = $verbinding->prepare('UPDATE klachten SET categorie = :categorie, melder = :melder, prioriteit = :prioriteit, statuss = :statuss, actienemer = :actienemer, datum = :datum, omschrijving = :omschrijving WHERE id = :id');
                $updateStmt->execute(array(
                            ':id'=> $data[0],
                            ':categorie'=> $data[1],
                            ':melder'=> $data[2],
                            ':prioriteit'  => $data[3],
                            ':statuss'=> $data[4],
                            ':actienemer'=> $data[5],
                            ':datum'  => $data[6],
                            ':omschrijving'  => $data[7],
                ));
                
                if($updateStmt)
                {
                        echo '<i style="color:green;">
                        Data ge-update </i> ';
                }
                
            }
        }
            
            ?>


        <form action="" method="POST">

          <div class="form-group">
            <label for="example-number-input">Vul een id van een klacht in en klik vervolgens op zoek</label>
            <input name="id" class="form-control" type="number" value="<?php echo $id;?>">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Categorie</label>
            <select name="categorie" class="form-control" id="exampleFormControlSelect1">
              <option selected hidden> <?php echo $categorie;?></option>
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
              <option selected hidden> <?php echo $melder;?></option>
              <option value="campingsgast">campingsgast</option>
              <option value="beheerder">beheerder</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Prioriteit</label>
            <select name="prioriteit" class="form-control" id="exampleFormControlSelect1">
              <option selected hidden> <?php echo $prioriteit;?></option>
              <option value="laag">laag</option>
              <option value="middel">middel</option>
              <option value="hoog">hoog</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control" id="exampleFormControlSelect1">
              <option selected hidden> <?php echo $status;?></option>
              <option value="in behandeling">in behandeling</option>
              <option value="afgehandeld">afgehandeld</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Actienemer</label>
            <select name="actienemer" class="form-control" id="exampleFormControlSelect1">
              <option selected hidden> <?php echo $actienemer;?></option>
              <option value="onbekend">onbekend</option>
              <option value="administratief medewerker">administratief medewerker</option>
              <option value="schoonmaker">schoonmaker</option>
              <option value="onderhoudsmedewerker">onderhoudsmedewerker</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Datum</label>
            <input type="test" disabled name="datum" class="form-control" id="exampleFormControlInput1"
              value="<?php echo $datum;?>" placeholder="<?php echo $datum;?>">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Omschrijving</label>
            <input name="omschrijving" class="form-control" type="text" value="<?php echo $omschrijving;?>">
          </div>


          <input name="search" value="Zoek" type="submit" class="btn"></button>
          <input name="update" value="Wijzig" type="submit" class="btn"></button>

        </form>
      </div>
    </div>

    <br />

    <h2 class="inschrijvingen text-center">Lijst alle klachten</h2><br>


    <div class="row">
      <div class="col-12">

        <?php
        $sql = "SELECT * FROM klachten";
        $stmt = $verbinding-> prepare($sql);
        $stmt ->execute();
        $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultaat as $result) {
        ?>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">categorie</th>
                <th scope="col">melder</th>
                <th scope="col">prioriteit</th>
                <th scope="col">status</th>
                <th scope="col">actienemer</th>
                <th scope="col">datum</th>
                <th scope="col">omschrijving</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['categorie']; ?></td>
                <td><?php echo $result['melder']; ?></td>
                <td><?php echo $result['prioriteit']; ?></td>
                <td><?php echo $result['statuss']; ?></td>
                <td><?php echo $result['actienemer']; ?></td>
                <td><?php echo $result['datum']; ?></td>
                <td><?php echo $result['omschrijving']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <br>
        <hr class="style1"><br>
        <?php } ?>
      </div>
    </div>
    

  </div>
  <br>
</main>

