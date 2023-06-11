<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Fortunel Alizé, Trepos Pauline, Estelle Roudet, Laverton Agath, Aude Souchon">
<title>Brico & co</title>
<style>
</style>

<body>

<?php include 'entete.php'; ?>
<br><br>

<?php 
session_start();

    $tab=array();

    $prenom = $_POST['prenom'];
    $tab[]=$prenom;

    $nom = $_POST['nom'];
    $tab[]=$nom;

    $tab[]=$_SESSION['email'];

    $password= $_POST['password'];
    $tab[]=$password;

    $date = $_POST['date'];
    $tab[]=$date;
    


    $confirmationmotdepasse = $_POST['confirmationmotdepasse'];
    
    if ($password == $confirmationmotdepasse)
    {
    echo "Valide";
    }
    else
    {
    echo "Veuillez verifier votre mot de passe ! ";
    }




// permet de supprimer la ligne du fichier csv 

$tab2=array();
$handle = fopen("login.csv", "r");
while (($data = fgetcsv($handle)) !== FALSE) {
   if ($data[2] != $_SESSION['email']) {
      $tab2[]=$data;
   }
}
fclose($handle);

$handle = fopen("login.csv", "w");
for ($i=0; $i<count($tab2); $i++) {
   fputcsv($handle, $tab2[$i]);
}
fclose($handle);




// écrit la nouvelle ligne 

$handle = fopen("login.csv", "a");
fputcsv($handle, $tab);
fclose($handle);


     $_SESSION['password'] = $password;
     $_SESSION['prenom'] = $prenom ;
     $_SESSION['nom'] = $nom;
     $_SESSION['date'] = $date;

header("Location:accueil.php");

?>

<br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

<body>
</html>

