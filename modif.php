<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Fortunel Alizé, Trepos Pauline, Estelle Roudet, Laverton Agath, Aude Souchon">
<title>Brico & co</title>
<style>
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
            font-family: cursive;
        }

        h2{
            color: #333;
            text-decoration: underline;
            font-family: cursive;
        }

</style>


<body>

<?php include 'entete.php'; ?>
<br><br>


<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier le profil</title>
</head>
<body>
	<header>
		<h1>Modifier le profil</h1>
	</header>


	<a href="/accueil.php">Page Accueil</a>
	<main>
		<section>
			<h2>Informations personnelles</h2>
            <br><br>
			
<form name="form" action="modification-profil.php" method="POST">
		
<div class="left-item">
        <label for="password"> Mot de passe: </label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe"><br>
 </div>

 <div class="right-item">
        <label for="confirmationmotdepasse "> Confirmer mot de passe: </label>
        <input type="confirmationmotdepasse" name="confirmationmotdepasse" id="confirmationmotdepasse" placeholder="Entrez votre mot de passe">
 </div>

 <div class="left-item">
            <label for="Prenom "> Prenom: </label>
            <input type="prenom" name="prenom" id="prenom" placeholder="Entrez votre prénom">
</div>

<div class="right-item">
            <label for="Nom "> Nom: </label>
            <input type="nom" name="nom" id="nom" placeholder="Entrez votre nom">
</div>
        
<div class="left-item">
		<label>Date de naissance</label>
		<input type="date" name="date"><br>
</div>

<div class="right-item">
		<input type="submit"  name="valider" value="Creation">
</div>
 
 </form>
		</section>
		
	</main>
	
	<br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

<body>
</html>
</body>
</html>


