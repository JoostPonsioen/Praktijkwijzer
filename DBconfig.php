<?php
DEFINE("USER", "root");
DEFINE("PASSWORD", "");
try {
  $verbinding = new
  PDO("mysql:host=localhost;dbname=praktijkwijzer" ,USER,PASSWORD);
  $verbinding->setAttribute
(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
}catch(PDOException $e) {
  echo $e->getMessage();
  echo "Kon geen verbindg maken.";
}
?>
