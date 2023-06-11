<?php
session_start();


$tab=array();
$handle = fopen("login.csv", "r");
while (($data = fgetcsv($handle)) !== FALSE) {
   if ($data[2] != $_SESSION['email']) {
      $tab[]=$data;
   }
}

fclose($handle);


$handle = fopen("login.csv", "w");
for ($i=0; $i<count($tab); $i++) {
   fputcsv($handle, $tab[$i]);
}

fclose($handle);
session_destroy();

header("Location:accueil.php");



?>
