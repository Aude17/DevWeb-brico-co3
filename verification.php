<!doctype html>
<html>
<body>



<?php

$email = $_POST['email'];
$password = $_POST['password'];


$success = false;

$handle = fopen("login.csv", "r");
while (($data = fgetcsv($handle)) !== FALSE) {
    if ($data[2] == $email && $data[3] == $password) {
        $success = true;
        break;
    }
}

fclose($handle);

if ($success) {
    session_start();
     $_SESSION['email'] = $email;
     $_SESSION['password'] = $password ;
     $_SESSION['date'] = $data[4] ;
     $_SESSION['prenom'] = $data[0] ;
     $_SESSION['nom'] = $data[1] ;
     $_SESSION['username'] = $data[2] ;
     header("Location:accueil.php");;
} else {
    header("Location:connexion.php");
}

?>


</body>
</html>
