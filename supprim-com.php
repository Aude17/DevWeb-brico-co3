<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	session_start();
?>
<?php include "entete.php"; ?>
<br>
<br>
<?php
function effacerCommentaireRecent() {
    $nom_fichier_csv = "commentaire.csv";

    // Lecture des commentaires à partir du fichier CSV
    $commentaires = lire_commentaires($nom_fichier_csv);

    // Vérification s'il y a des commentaires
    if (!empty($commentaires)) {
        // Récupération du dernier commentaire
        $dernierCommentaire = end($commentaires);

        // Suppression du dernier commentaire du fichier CSV
        $handle = fopen($nom_fichier_csv, "w");
        fwrite($handle, "");
        fclose($handle);

        // Réécriture des commentaires sans le dernier commentaire
        foreach ($commentaires as $commentaire) {
            // Vérification si le commentaire est différent du dernier commentaire
            if ($commentaire !== $dernierCommentaire) {
                ajouterCommentaire($nom_fichier_csv, $commentaire);
            }
        }

        echo "Le commentaire le plus récent a été effacé avec succès.";
    } else {
        echo "Il n'y a pas de commentaires à effacer.";
    }
}

function ajouterCommentaire($nom_fichier, $commentaire) {
    $handle = fopen($nom_fichier, "a");
    fputcsv($handle, $commentaire);
    fclose($handle);
}

function lire_commentaires($nom_fichier) {
    $commentaires = array();
    if (($fichier = fopen($nom_fichier, "r")) !== false) {
        while (($ligne = fgetcsv($fichier)) !== false) {
            $commentaires[] = $ligne;
        }
        fclose($fichier);
    }
    return $commentaires;
}

effacerCommentaireRecent();
?>
<br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

</body>
</html>
