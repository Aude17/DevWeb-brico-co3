<?php 
  
    $categorie = $_POST['categorie'];
    $tab = $categorie;

    $objet = $_POST['objet'];
    $tab .= ",".$objet;

    $difficulte= $_POST['difficulte'];
    $tab .=",".$difficulte;

    $temps= $_POST['temps'];
    $tab .=",".$temps;

    $steps= $_POST['steps'];
    $tab.=",".$steps;

    $materiaux = $_POST['materiaux'];
    $tab .=",".$materiaux;

    $lien = $_POST['lien'];
    $tab.=",".$lien;
    


$handle = fopen("salon.csv", "a");
fwrite($handle, "\n".$tab);
fclose($handle);

header("Location:profil-admin.php");


