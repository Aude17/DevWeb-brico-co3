<!DOCTYPE html>
<head>
    <title>Tri des commentaires</title>
     <style>
    body {
            background-color: #F5F5DC;
              font-family: Helvetica, Arial, sans-serif;
        }
</head>
 </style>
<body>
<?php include 'entete.php'; ?>
<br><br><br><br><br><br><br><br>
    <form method="GET">
        <label for="tri">Trier par :</label>
        <select name="tri" id="tri">
            <option value="asc">Date croissante</option>
            <option value="desc">Date décroissante</option>
            <option value="best">Meilleure note</option>
            <option value="worst">Pire note</option>
        </select>
        <input type="submit" value="Trier">
    </form>

    <?php
    $nom_fichier_csv = "commentaire.csv";

    // Vérification du formulaire et tri des commentaires en conséquence
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $tri = $_GET['tri'] ?? '';

        if ($tri === 'asc') {
            $commentaires_tries = trier_commentaires($nom_fichier_csv, 'asc');
        } elseif ($tri === 'desc') {
            $commentaires_tries = trier_commentaires($nom_fichier_csv, 'desc');
        } elseif ($tri === 'best') {
            $commentaires_tries = trier_commentaires_par_note($nom_fichier_csv, 'asc');
        } elseif ($tri === 'worst') {
            $commentaires_tries = trier_commentaires_par_note($nom_fichier_csv, 'desc');
        } else {
            $commentaires_tries = trier_commentaires($nom_fichier_csv);
        }

        // Génération de la page HTML avec les commentaires triés
        $page_html = generer_page_html($commentaires_tries);

        // Affichage de la page HTML
        echo $page_html;
    }

    // Fonction pour trier les commentaires par date
    function trier_commentaires($nom_fichier, $ordre = 'asc') {
        $commentaires = array();

        if (($fichier = fopen($nom_fichier, 'r')) !== false) {
            // Lire les commentaires à partir du fichier CSV
            while (($ligne = fgetcsv($fichier)) !== false) {
                $commentaire = array(
                    'date' => $ligne[4],
                    'auteur' => $ligne[1],
                    'contenu' => $ligne[2],
                    'note' => $ligne[3]
                );
                $commentaires[] = $commentaire;
            }
            fclose($fichier);

            // Trier les commentaires par date dans l'ordre croissant ou décroissant
            usort($commentaires, function ($a, $b) use ($ordre) {
                $date1 = strtotime($a['date']);
                $date2 = strtotime($b['date']);

                if ($ordre === 'asc') {
                    return $date1 - $date2;
                } else {
                    return $date2 - $date1;
                }
            });
        }

        return $commentaires;
    }

    // Fonction pour trier les commentaires par note
    function trier_commentaires_par_note($nom_fichier, $ordre = 'desc') {
        $commentaires = array();

        if (($fichier = fopen($nom_fichier, 'r')) !== false) {
            // Lire les commentaires à partir du fichier CSV
            while (($ligne = fgetcsv($fichier)) !== false) {
                $commentaire = array(
                    'date' => $ligne[4],
                    'auteur' => $ligne[1],
                    'contenu' => $ligne[2],
                    'note' => $ligne[3]
                );
                $commentaires[] = $commentaire;
            }
            fclose($fichier);

            // Trier les commentaires par note
            if ($ordre === 'asc') {
                usort($commentaires, function ($a, $b) {
                    return $b['note'] - $a['note'];
                });
            } elseif ($ordre === 'desc') {
                usort($commentaires, function ($a, $b) {
                    return $a['note'] - $b['note'];
                });
            }
        }

        return $commentaires;
    }

    // Fonction pour générer une page HTML avec les commentaires triés
    function generer_page_html($commentaires) {
        $html = '
        <html>
        <head>
            <title>Commentaires triés</title>
        </head>
        <body>
            <h1>Commentaires triés</h1>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Note</th>
                </tr>';
        foreach ($commentaires as $commentaire) {
            $html .= '
                <tr>
                    <td>'.$commentaire['date'].'</td>
                    <td>'.$commentaire['auteur'].'</td>
                    <td>'.$commentaire['contenu'].'</td>
                    <td>'.$commentaire['note'].'</td>
                </tr>';
        }
        $html .= '
            </table>
        </body>
        </html>';
        return $html;
    }
    ?>
    
    <br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

</body>
</html>
