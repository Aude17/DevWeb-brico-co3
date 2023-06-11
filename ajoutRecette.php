<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Fortunel Alizé, Trepos Pauline, Estelle Roudet, Laverton Agath, Aude Souchon">
<title>Brico & co</title>

    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;

        }

        label{
            font-family: cursive;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        input {
            border: solid 1px orange;
            margin-bottom: 10px;
            padding: 16px;
            outline: none;
            border-radius: 7px;
            width: 100%;
        }

        /* Set a style for all buttons */
        input[type=submit] {
            margin-bottom: 10px;
            float: right;
            outline: none;
            width: 100px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: #FFF;
            background-color: #2D9988;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #0099CC;
        }

        .left-item {
            margin-right: 30px;
        }

        .right-item {
            margin-left: 30px;
        }

        h1 {
            text-align: center;
            color: #FFFAFA;
            background: #2D9988;
        }

        .image {
   margin-top: 10px;
  display: flex;
  justify-content: center;
  
}
        .image img {
     max-width: 250px;
}

    </style>
</head>



<body>

<br><br>

<?php
session_start();
?>
<h1>Ajouter une recette</h1>
<br><br>
<?php if( isset($_SESSION['email']) && $_SESSION['email'] == "popo@gmail.com" ) : ?>

<form name="form" action="ajoutRecette-admin.php" method="POST">
                
        <div class="left-item">
            <label for="categorie">Categorie:</label>
            <input type="categorie" name="categorie" id="categorie" placeholder="Quel est la categorie de l'objet?">
        </div>
        <div class="right-item">
            <label for="objet">Objet:</label>
            <input type="objet" name="objet" id="objet" placeholder="Quel est votre objet?">
        </div>

        <div class="left-item">
        <label for="difficulte"> Difficulte:</label>
        <input type="difficulte" name="difficulte" id="difficulte" placeholder="Niveau de difficulte">
        </div>

        <div class="right-item">
        <label for="temps"> Temps d'execution:</label>
        <input type="temps" name="temps" id="temps" placeholder="temps d'execution">
        </div>

        <div class="left-item">
            <label for="steps">Etapes:</label>
            <input type="steps" name="steps" id="steps" placeholder="Les differentes étapes">
        </div><br>
        
        <div class="left-item">
            <label for="materiaux">Materiaux:</label>
            <input type="materiaux" name="materiaux" id="materiaux" placeholder="Les differents materiaux">
        </div><br>
        
        <div class="left-item">
            <label for="lien">Image:</label>
            <input type="lien" name="lien" id="lien" placeholder="Les differents materiaux" >
        </div>
                 
        <div class="right-item">
            <label for="cout">Cout:</label>
            <input type="cout" name="cout" id="cout"  placeholder="Le cout estimé">
        </div><br>
            
        <br><br><br>
        <input type="submit"  name="valider" value="Creation">
 
 </form>
<?php else : 
    header("Location:profil-admin.php");
   endif; ?>

 </body> 
</html>
