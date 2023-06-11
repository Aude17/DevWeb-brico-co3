<?php
session_start();

$categorie = $_POST['categorie'];
$tab[]=$categorie;

$id = $_POST['id'];
$tab[]=$id;


$tab=array();
$handle = fopen("salon.csv", "r");
while (($data = fgetcsv($handle)) !== FALSE) {
   if (($data[0] != $categorie && $data[1] != $id) || ($data[0] == $categorie && $data[1] != $id) || ($data[0] != $categorie && $data[1] == $id)) {
      $tab[]=$data;
   }
   else{
    echo("Nous ne trouvons pas ce tutoriel. Veuillez réessayer!");
   }
}

fclose($handle);

$handle = fopen("salon.csv", "w");
for ($i=0; $i<count($tab); $i++) {
   fputcsv($handle, $tab[$i]);
}

fclose($handle);

header("Location: profil-admin.php");

?>