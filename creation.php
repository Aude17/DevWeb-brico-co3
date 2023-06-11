<?php 

    $tab=array();

  
    $prenom = $_POST['prenom'];
    $tab[]=$prenom;

    $nom = $_POST['nom'];
    $tab[]=$nom;

	$email= $_POST['email'];
	$tab[]=$email;

	$password= $_POST['password'];
	$tab[]=$password;

    $date = $_POST['date'];
    $tab[]=$date;
    


	$confirmationemail = $_POST['confirmationemail'];
    
    if ($email == $confirmationemail)
    {
    echo "Valide";
    }
    else
    {
    echo "Veuillez verifier votre adresse mail ! ";
    }

	$confirmationmotdepasse = $_POST['confirmationmotdepasse'];
    
    if ($password == $confirmationmotdepasse)
    {
    echo "Valide";
    }
    else
    {
    echo "Veuillez verifier votre mot de passe ! ";
    }



$success = true;

$handle = fopen("login.csv", "a");
while (($data = fgetcsv($handle,null,"\t")) !== FALSE) {
    if ($data[2] == $email) {
        $success = false;
        echo "votre id existe déjà";
        break;
    }
}

fputcsv($handle, $tab);
fclose($handle);

if ($success == true) {
     echo "ton compte vient d'être créer";
     header("Location:accueil.php");

} else {
    header("Location:creercompte.php");
}

?>

