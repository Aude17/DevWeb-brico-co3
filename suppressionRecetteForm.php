<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
        <style>
       * {
            font-family: arial;
        }
 
        body {
            margin: 20px;
        }
 
        form {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }
 
        input {
            border: solid 1px blue;
            margin-bottom: 5px;
            padding: 16px;
            outline: none;
            border-radius: 7px;
            width: 300px;
        }

/* Set a style for all buttons */
        input[type=submit] {
        background-color: #53af57;
        color: white;
        padding: 5px;
        margin: 8px;
        border: none;
        cursor: pointer;
        width: 100%;
}
        input[type=submit]:hover {
        background-color: white;
        color: #53af57;
        border: 1px solid #53af57;
}
    </style>
</head>

<body>

<?php
session_start();
?>

<form name="form" action="suppressionrecette.php" method="POST">

        <div>
            <label for="categorie "> Categorie: </label>
            <input type="categorie" name="categorie" id="categorie" placeholder="Entrez la categorie">
        </div><br><br>
        <div>

        <div>
            <label for="id "> Titre: </label>
            <input type="id" name="id" id="id" placeholder="Entrez vore titre">
        </div><br><br>
        <div>

        <input type="submit"  name="valider" value="SuppressionRecette">
 
 </form>

 </body> 
</html>