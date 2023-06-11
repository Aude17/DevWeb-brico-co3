<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Fortunel Alizé, Trepos Pauline, Roudet Estelle, Laverton Agath, Souchon Aude">
<title>Brico & co</title>

<style>
.bar {
  background-color: #2D9988;
  height: 370px; 
  width: 100%;
  top: 50%
  z-index: 9999; 
}

.bar0{
	right: 50px;
	transform: translate(-1%, -1%);
	display: flex;
	justify-content: flex-end;
	align-items: center;
}
	

.bar0, .bar2, .bar3, .Chambre, .Cuisine, .Salon, .Jardin{
  position: absolute;
  top: 20%;
  height: 150%;
}

.bar2 {
  left: 640px;
  transform: translate(-10%, -10%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.bar3 {
  left: 50px;
  transform: translate(-1%, -1%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.Chambre {
  right: 600px;
  transform: translate(70%, 70%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.Cuisine {
  right: 300px;
  transform: translate(80%, 80%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.Salon {
  left: 10px;
  transform: translate(50%, 50%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.Jardin{
	left: 300px;
	transform: translate(60%,60%);
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

.bar img,
.bar0 img,
.bar2 img,
.bar3 img,
.Chambre img,
.Cuisine img,
.Salon img,
.Jardin img{
  width:  200px;
  height: 200px;
  object-fit: contain;
  padding: 20px;
  background-color: red;
}

.log {
  position: absolute;
  top: 30%;
  left: 75px;
  transform: translate(-57%, -57%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 150%;
}

.log img {
  width:  100px;
  height: 100px;
}

.espace-blanc {
  height: 1500px; 
  overflow: auto; 
  background-color: #F5F5DC;
}

.txt {
  position: absolute;
  top: calc(50% + 640px);
  width: 100%;
  text-align: center;
  font-family: Montserrat, sans-serif;
  color: gray;
}
</style>
</head>

<body>
<?php include 'entete.php'; ?>

<br><br>


<div class="bar"></div>
<div class="espace-blanc"></div>

<div class="bar"></div>
<div class="log">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");
// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}
// Fermer le fichier
fclose($fichier);
// Stocker la troisième ligne du tableau dans une variable
$ligne2 = $tableau[1];
echo "<div class='image'><img src='" . $ligne2[0] . "' alt='image'></div>";
?>
</div>

<div class="bar0">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}

// Fermer le fichier
fclose($fichier);

// Stocker la troisième ligne du tableau dans une variable
$ligne3 = $tableau[2];
echo "<div class='image'><img src='" . $ligne3[0] . "' alt='image'></div>";
?>
</div>

<div class="bar2">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}

// Fermer le fichier
fclose($fichier);

// Stocker la troisième ligne du tableau dans une variable
$ligne4 = $tableau[3];
echo "<div class='image'><img src='" . $ligne4[0] . "' alt='image'></div>";
?>
</div>

<div class="bar3">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}
// Fermer le fichier
fclose($fichier);
// Stocker la troisième ligne du tableau dans une variable
$ligne5 = $tableau[4];
echo "<div class='image'><img src='" . $ligne5[0] . "' alt='image'></div>";
?>
</div>

<div class="txt">
<p>Que vous soyez propriétaire ou locataire, les occasions ne manqueront pas d'exercer vos talents de bricoleur chez vous. Si certains semblent être nés avec un marteau à la main, d'autres redoutent de devoir faire un simple trou dans un mur. Ces derniers ont aussi la meilleure des excuses : ils n'ont pas le matériel adéquat. Parce que nous pensons qu'il est de notre devoir d'aider le bricoleur du dimanche, voici quelques tutoriels pour vous aider dans vos différents bricolages.
<br>
En préparant soigneusement votre projet bricolage, vous êtes serein et vos travaux se passent dans le calme. Pour réussir vos travaux de bricolage, n’oubliez pas d’être organisés et prudents !</p>
</div>

<div class="Chambre">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}
// Fermer le fichier
fclose($fichier);
// Stocker la troisième ligne du tableau dans une variable
$ligne6 = $tableau[5];
echo "<div class='image'><img src='" . $ligne6[0] . "' alt='image'></div>";
?>
</div>

<div class="Cuisine">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}
// Fermer le fichier
fclose($fichier);
// Stocker la troisième ligne du tableau dans une variable
$ligne7 = $tableau[6];
echo "<div class='image'><img src='" . $ligne7[0] . "' alt='image'></div>";
?>
</div>

<div class="Salon">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}
// Fermer le fichier
fclose($fichier);
// Stocker la troisième ligne du tableau dans une variable
$ligne9 = $tableau[8];
echo "<div class='image'><img src='" . $ligne9[0] . "' alt='image'></div>";
?>
</div>

<div class="Jardin">
<?php
header('Content-Type: text/html; charset=utf-8');
// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon10.csv", "r");

// Parcourir le fichier et stocker les données de chaque ligne dans un tableau
$tableau = array();
while (($ligne = fgetcsv($fichier)) !== false) {
    $tableau[] = $ligne;
}
// Fermer le fichier
fclose($fichier);
// Stocker la troisième ligne du tableau dans une variable
$ligne8 = $tableau[7];
echo "<div class='image'><img src='" . $ligne8[0] . "' alt='image'></div>";
?>
</div>

<object data="footer.html" width="100%" height="400px"></object>

</body>

</html>
