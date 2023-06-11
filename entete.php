<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Brico & co</title>
  <style>
body {
    background-color: #F5F5DC;
    
}

form{
    margin-top: 35px;
    position: relative;
    text-align:center;
}

#menu-demo,
ul {
    list-style: none;
    margin: 0;
    padding: 0;
    background-color: #2D9988;
    margin-top: 4px; 
    
}

#menu-demo>li {
    display: inline-block;
}

#menu-demo li {
    width: 150px;
    position: relative;
}

#menu-demo li:hover {
    background: #2D9988;
}

#menu-demo a {
    text-decoration: none;
    display: block;
    padding: 10px;
    color: black;
    padding: 30px;
     font-size:25px;
    
}

img{
    height: 30%;
    width: 10%;
    float: right;
}

#menu-demo>li>ul {
    position: absolute;
    left: -1000px;
    background: #2D9988;
    border: 1px solid #F5F5DC;
}



#menu-demo>li:hover>ul {
    top: 100%;
    left: 0;
}

#menu-demo li ul li a {
  font-size: 20px !important; 
    padding: 20px 0;
   
}

#menu-demo a:hover {
    text-decoration: underline;
    color: black;
}

 #menu-demo>li li:hover {
    background: #F5F5DC;
}

 .user-widget {
    float: right;
    color: white;
    margin-right: 20px;
 }

.user-widget a {
    display: inline-block;
    margin-right: 10px;
    color: white;
    text-decoration: none;
    
}

img#logo {
 height: 90px;
  width: auto;
  position: absolute;
  left: 10px; 
  top: 10px; 

}
#search {
  background-color: #FFF;
  border: 1px solid #2D9988;
  border-radius: 4px;
  outline: none;
  width: 370px;
}


  </style>
</head>
<body>


<form action="motcle.php" method="get">
    <label for="search"> </label>
    <input type="text" id="search" name="motcles"> 
    <button type="submit">Rechercher</button>

</form>
<a href="accueil.php">
  <img id="logo" src="images/logo.png" alt="logo">
</a>
<br><br><br>

<?php
  header('Content-Type: text/html; charset=utf-8');

  $fichier = fopen("salon.csv", "r");                  // Ouvrir le fichier CSV en mode lecture

  $tableau = array();                                   // Parcourir le fichier et stocker les données de chaque ligne dans un tableau
    while (($ligne = fgetcsv($fichier)) !== false) {
        $tableau[] = $ligne;
    }

    $header = array_shift($tableau);                        // Supprimer l'en-tête (la première ligne) du tableau des données

   $categories = array();                                  // Grouper les données par catégorie
    foreach ($tableau as $row) {
    $category = $row[0];
    $tuto = $row[1];
    if (!isset($categories[$category])) {
        $categories[$category] = array();
    }
    $categories[$category][] = $tuto;
    }
?>

<ul id="menu-demo">
    <?php foreach ($categories as $category => $recettes) : ?>
        <li>
            <a href="#"><?php echo $category; ?></a>
            <ul>
            <?php foreach ($recettes as $tuto) : ?>
 	   <li><a href="recette.php?tuto=<?php echo urlencode($tuto); ?>"><?php echo $tuto; ?></a></li>
	<?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>


<div class="user-widget">

  <?php if( isset($_SESSION['email']) && $_SESSION['email'] == "popo@gmail.com" ) : ?>
    <a href="/profil-admin.php">Mon profil</a>

  <?php elseif( isset($_SESSION['email']) && $_SESSION['email'] !== null ) : ?>
    <a href="/profil.php">Mon profil</a>
  <?php else : ?>
    <a href="/connexion.php">Se connecter</a>
  <?php endif; ?>
</div>

</ul>

<br><br>


</body>

</html>
