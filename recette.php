<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fortunel Alizé, Trepos Pauline, Estelle Roudet, Laverton Agath, Aude Souchon">
    <title>Brico & co</title>

    <style>
        body {
            font-size: 16px;
            color: #666;
            background-color: #F5F5DC;
            font-family: Helvetica, Arial, sans-serif;
        }

        h1 {
            font-size: 32px;
            color: #333;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .categorie,
        .difficulte,
        .temps {
            float: left;
            font-weight: bold;
            color: #333;
            clear: both;
            font-family: cursive;
        }

        .id {
            text-align: center;
            font-size: 55px;
            margin-top: 40px;
            margin-bottom: 20px;
            font-family: cursive;
            text-decoration: underline;
        }

        .materiaux {
            background-color: #2D9988;
            padding-top: 10px;
            font-size: 12px;
            padding-bottom: 20px;
            display: inline-block;
            width: 33%;
            color: white;
            font-family: cursive;
            max-height: 600px;
            margin-right: 10px;
        }

        .etapes {
            background-color: #2D9988;
            font-size: 12px;
            float: right;
            padding-top: 10px;
            padding-bottom: 20px;
            width: 53%;
            display: inline-block;
            color: white;
            font-family: cursive;
            max-height: 600px;
            margin-right: 10px;
        }

        .comments {
            margin-top: 130px;
            padding: 10px;
            background-color: #F5F5DC;
            border-radius: 4px;
        }

        .ajouter_commentaires {
            display: inline-block;
            background-color: #2D9988;
            color: #fff;
            float: right;
            line-height: 30px;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            margin-top: 10px;
        }

        .comments h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .comments p {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .comments .comment {
            border-bottom: 1px solid #ccc;
        }

        .commentaires {
            text-align: right;
        }

        .date {
            color: gray;
        }

        .content {
            /* Styles pour le contenu du commentaire */
        }

        .note {
            display: inline-block;
        }

        form {
            margin-top: 20px;
            padding: 10px;
            background-color: #F5F5DC;
            border-radius: 4px;
            front family: cursive;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            font-size: 14px;
        }

        form input[type="submit"] {
            display: inline-block;
            background-color: #2D9988;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
        }

        form input[type="submit"]:hover {
            background-color: #2D9988;
        }

        form .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .image {
			text-align: center;
            padding-top: 50px;
            font-size: 100px;
            padding-bottom: 30px;
            display: inline-block;
            width: 60%;
            margin-right: 100px;
            margin-left: -1px
        }

    </style>
</head>

<body>
    <?php include 'entete.php'; ?>
    <br><br>

    <?php
    session_start();

    // Vérifiez si le paramètre "tuto" est présent dans l'URL
    if (isset($_GET['tuto'])) {
        $tuto = $_GET['tuto'];

        // Ouvrir le fichier CSV en mode lecture
        $fichier = fopen("salon.csv", "r");

        // Parcourir le fichier et rechercher la ligne correspondante au tuto
        while (($ligne = fgetcsv($fichier)) !== false) {
            if ($ligne[1] === $tuto) {
                // Afficher les données de la ligne
                echo "<div class='categorie'>" . $ligne[0] . "</div>";
                echo "<div class='temps'>" . $ligne[2] . "</div>";
                echo "<div class='temps'>" . $ligne[7] . "</div>";
                echo "<div class='difficulte'>" . $ligne[3] . "</div>";
                echo "<div class='id'>" . $ligne[1] . "</div>";
                echo "<div class='image'><img src='" . $ligne[6] . "' alt='img'></div>";
                echo "<div class='materiaux'>" . nl2br(str_replace('-', '<br><br>', $ligne[5])) . "</div>";
                echo "<div class='etapes'>" . nl2br(str_replace('-', '<br><br>', $ligne[4])) . "</div>";
            }
        }

        fclose($fichier);
    }

    // CALCULER / AJOUTER / AFFICHER/ LA MOYENNE//
    $fichier = fopen("salon.csv", "r");

    // Parcourir le fichier et rechercher la ligne correspondante au tuto
    $nouvelles_lignes = array();
    while (($ligne = fgetcsv($fichier)) !== false) {
        if ($ligne[1] === $tuto) {
            // Ajouter la moyenne à la ligne correspondante
            $commentaires = lire_commentaires_tutoriel("commentaire.csv", $tuto);
            if (!empty($commentaires)) {
                $notes = array_column($commentaires, 3); // Récupérer les notes de chaque commentaire
                $moyenne = round(array_sum($notes) / count($notes), 1); // Calculer la moyenne des notes et arrondir
                echo "<h3>Moyenne des notes : $moyenne</h3>";
                // Remplacer la valeur correspondante dans la ligne
                $ligne[8] = $moyenne;
            }
        }
        $nouvelles_lignes[] = $ligne;
    }

    fclose($fichier);

    // Réécrire le contenu du fichier avec la nouvelle ligne modifiée
    $fichier = fopen("salon.csv", "w");
    foreach ($nouvelles_lignes as $ligne) {
        fputcsv($fichier, $ligne);
    }
    fclose($fichier);


    function lire_commentaires_tutoriel($nom_fichier, $tuto)
    {
        $commentaires_tutoriel = array();
        if (($fichier = fopen($nom_fichier, "r")) !== false) {
            while (($ligne = fgetcsv($fichier)) !== false) {
                if ($ligne[0] === $tuto) {
                    $commentaires_tutoriel[] = $ligne;
                }
            }
            fclose($fichier);
        }
        return $commentaires_tutoriel;
    }
    ?>


    <div class="comments">
        <h3>Commentaires</h3>
        <form method="GET" action="tricom.php">
            <label for="sort">Trier les commentaires par :</label>
            <select name="sort" id="sort">
                <option value="date">Date</option>
                <option value="note">Note</option>
            </select>
            <input type="submit" value="Trier">
        </form>

        <?php
        $commentsFile = fopen("commentaire.csv", "r");
        if ($commentsFile) {
            while (($comment = fgetcsv($commentsFile)) !== false) {
                if ($comment[0] === $tuto) {
                    $note = $comment[3];
                    $etoiles = '';
                    for ($i = 1; $i <= $note; $i++) {
                        $etoiles .= '★';
                    }
                    echo '<div class="comment">';
                    echo '<div class="user"><p><strong>' . $comment[1] . '</strong> <span class="note">' . $etoiles . '</span></p></div>';
                    echo '<div class="content">' . "<p> " . $comment[2] . "</p>" . '</div>';
                    echo '<div class="date">' . "<p> " . $comment[4] . "</p>" . '</div>';
                    echo '</div>';
                }
            }
            fclose($commentsFile);
        }
        ?>
    </div>
    <div class="commentaires">
        <a class="ajouter_commentaires" href="ajoutCommentaire.php">Ajouter</a>
    </div>
    <br><br><br>
    <object data="footer.html" width="100%" height="500px"></object>

</body>

</html>
