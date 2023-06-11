<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Fortunel Alizé, Trepos Pauline, Estelle Roudet, Laverton Agath, Aude Souchon">
<title>Brico & co</title>
 <style>
        body {
            background-color: #F5F5DC;
              font-family: Helvetica, Arial, sans-serif;
        }

        h1 {
            font-size: 35px;
            color: #333;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 30px;
            color: #2D9988; /* Couleur de la catégorie */
        }

        p.recette a {
            color: brown; /* Couleur du nom de recette */
            font-size: 30px;
        }
    </style>
    </head>
<body>

<?php include 'entete.php'; ?>
<br><br>
    
<?php
session_start();

// Ouvrir le fichier CSV en mode lecture
$fichier = fopen("salon.csv", "r");

// Parcourir le fichier et récupérer les données
$recettesParCategorie = array();

while (($ligne = fgetcsv($fichier)) !== false) {
    $recettes = array_slice($ligne, 2); // Récupérer toutes les valeurs des colonnes à partir de la troisième colonne

    $categorie = $ligne[0]; // Récupérer la catégorie depuis la première colonne
    $nomRecette = $ligne[1]; // Récupérer le nom de la recette depuis la deuxième colonne
	$valeurColonne9 = $recettes[8]; // Récupérer la valeur de la colonne 9 qui est la
    // Ajouter la recette à la catégorie correspondante
    if (!isset($recettesParCategorie[$categorie])) {
        $recettesParCategorie[$categorie] = array();
    }
    $recettesParCategorie[$categorie][$nomRecette] = $recettes;
}

// Fermer le fichier CSV
fclose($fichier);

// Récupérer le mot-clé de la requête GET
$motCle = isset($_GET['motcles']) ? $_GET['motcles'] : '';

// Rechercher les correspondances de mot-clé
$resultats = array();

foreach ($recettesParCategorie as $categorie => $recettes) {
    $correspondancesRecettes = array();

    // Vérifier si le mot-clé correspond à la catégorie ou aux noms de recettes
    if (stripos($categorie, $motCle) !== false) {
        $correspondancesRecettes = array_keys($recettes);
    } else {
        foreach ($recettes as $nomRecette => $etapeRecettes) {
        $recetteTrouvee = false; // Indicateur pour éviter les doublons
            if (stripos($nomRecette, $motCle) !== false) {
                $correspondancesRecettes[] = $nomRecette;
                 $recetteTrouvee = true;
            }
            foreach ($etapeRecettes as $etapeRecette) {
                if (stripos($etapeRecette, $motCle) !== false) {
                    $correspondancesRecettes[] = $nomRecette;
                    break;
                }
            }
        }
    }

    if (!empty($correspondancesRecettes)) {
        $resultats[$categorie] = $correspondancesRecettes;
    }
}
?>

  <h1> Résultat de votre recherche avec le mot-clé : <?php echo $motCle; ?> </h1>
    <br><br>
  
  
<?php
if (empty($resultats)) {
    echo "Recherche introuvable";
} else {
    // Afficher les résultats
    foreach ($resultats as $categorie => $recettes) {
        // Afficher la catégorie
        echo "<h2>$categorie</h2>";

        // Utiliser un tableau distinct pour stocker les recettes trouvées
        $recettesTrouvees = array();

        // Afficher les recettes correspondantes avec des liens vers les recettes
        foreach ($recettes as $nomRecette) {
            // Vérifier si la recette a déjà été affichée
            if (!in_array($nomRecette, $recettesTrouvees)) {
           $valeurColonne9 = $recettesParCategorie[$categorie][$nomRecette];
	$note = end($valeurColonne9);
        $etoiles = '';
        for ($i = 1; $i <= $note; $i++) {
          $etoiles .= '★';
        }
            echo "<p class='recette'><a href='recette.php?tuto=" . urlencode($nomRecette) . "'>$nomRecette</a> - " . $etoiles. "</p>";
            



                $recettesTrouvees[] = $nomRecette; // Ajouter la recette au tableau des recettes trouvées
            }
        }
    }
}
?>

<br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

</body>
</html>






