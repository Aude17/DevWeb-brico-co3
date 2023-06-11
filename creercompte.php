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

    </style>
</head>
<body>

<br><br>
<h1>Création de compte</h1>
<br><br>

<form name="form" action="creation.php" method="POST">
    <div class="left-item">
        <label for="Email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Entrez votre email">
    </div>
    <div class="right-item">
        <label for="Confirmationemail">Confirmation email:</label>
        <input type="confirmationemail" name="confirmationemail" id="confirmationemail" placeholder="Confirmez votre email">
    </div>

    <div class="left-item">
        <label for="password"> Mot de passe: </label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
    </div>

    <div class="right-item">
        <label for="confirmationmotdepasse "> Confirmation mot de passe: </label>
        <input type="confirmationmotdepasse" name="confirmationmotdepasse" id="confirmationmotdepasse" placeholder="Entrez votre mot de passe">
    </div>

    <div class="left-item">
        <label for="Prenom "> Prénom: </label>
        <input type="prenom" name="prenom" id="prenom" placeholder="Entrez votre prénom">
    </div>

    <div class="right-item">
        <label for="Nom "> Nom: </label>
        <input type="nom" name="nom" id="nom" placeholder="Entrez votre nom">
    </div>

    <div class="left-item">
        <label>Date de naissance:</label>
        <input type="date" name="date">
    </div>

    <div class="right-item">
    <input type="submit" name="valider" value="Création">
    </div>
</form>

</body>
</html>
