<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil de l'utilisateur</title>
    <style>
        body {
            font-size: 25px;
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

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #2D9988;
            text-decoration: none;
            margin-right: 10px;
        }

        /* Style pour les liens */
        a:hover {
            text-decoration: underline;
        }

        .main {
            display: flex;
            justify-content: space-between;
        }

        .informations {
            width: 50%;
        }

        .notifications {
            width: 40%;
            background-color: #2D9988;
            padding: 20px;
            color: white;
        }

        .notifications h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .notifications ul {
            padding-left: 20px;
        }

        .notifications li {
            margin-bottom: 5px;
        }

        /* Style pour les informations personnelles */
        .informations ul {
            color: #666; /* Couleur du texte en brun */
            background-color: transparent; /* Fond transparent */
        }
        .commentaires {
    width: 50%;
    margin: 0 auto;
}

    </style>
</head>
<body>
<?php include "entete.php"; ?>
<br><br>

    <header>
        <h1>Profil de l'utilisateur</h1>
    </header>

    <a href="/accueil.php">Page Accueil</a>
    <main class="main">
        <section class="informations">
            <h2>Informations personnelles</h2>
            <ul>
                <li><strong>Prenom :</strong> <?php echo ' ' . $_SESSION['prenom'] . '.<br>'; ?></li>
                <li><strong>Nom :</strong> <?php echo '' . $_SESSION['nom'] . '.<br>'; ?></li>
                <li><strong>Date de naissance :</strong> <?php echo '' . $_SESSION['date'] . '.<br>'; ?></li>
                <li><strong>Email :</strong> <?php echo '' . $_SESSION['email'] . '.<br>'; ?></li>
            </ul>
        </section>
<section class="commentaires">
            <h2>Commentaires de l'utilisateur</h2>
            <?php
            $nom_fichier_csv = "commentaire.csv";
            $commentaires = lire_commentaires_utilisateur($nom_fichier_csv, $_SESSION['username']);

            if (!empty($commentaires)) {
                foreach ($commentaires as $index => $commentaire) {
                    echo '<strong>' . $commentaire['tuto'] . '</strong>';
                    echo '<li>Date : ' . $commentaire['date']->format('-Y--m--d-') . '</li>';
                    echo '<li>Note : ' . $commentaire['note'] . '</li>';
                    echo '<li>Contenu : ' . $commentaire['contenu'] . '</li>';
                    echo '<a href="supprim-com.php?index=' . $index . '">Supprimer</a>';
                    echo '<br>';
                    echo '<br>';
                }
                echo '</ul>';
            } else {
                echo 'Aucun commentaire trouvé pour cet utilisateur.';
            }

            function lire_commentaires_utilisateur($nom_fichier, $nom_utilisateur) {
                $commentaires_utilisateur = array();
                if (($fichier = fopen($nom_fichier, 'r')) !== false) {
                    while (($ligne = fgetcsv($fichier)) !== false) {
                        if ($ligne[1] == $nom_utilisateur) {
                            $commentaire = array(
                                'date' => DateTime::createFromFormat('Y-m-d', $ligne[4]), // creer un objet dattime a partir de la valeur contenue dans la ligne4
                                'note' => $ligne[3],
                                'contenu' => $ligne[2],
                                'tuto' => $ligne[0]
                            );
                            $commentaires_utilisateur[] = $commentaire;
                        }
                    }
                    fclose($fichier);
                }
                return $commentaires_utilisateur;
            }

            ?>
        </section>
    </main>

    <a href="/deconnexion.php">Se deconnecter</a>
    <a href="/supprimer-compte.php">Supprimer mon compte</a>
    <a href="/modif.php">Modifier mon profil</a>
    <a href="/ajoutRecette-admin.php">Ajout Recette</a>
    <br> <br> <br>
    <a href="envoie-recette.php">Envoyer une recette a l'administrateur</a>
    <br>
    <a href="notifications.php">Notifications</a>
    
    <br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

</body>
</html>
