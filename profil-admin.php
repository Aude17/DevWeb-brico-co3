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
			text-decoration: underline;
			font-size: 40px;
			color: #333;
			text-align: center;
			margin-top: 20px;
			margin-bottom: 20px;
			font-family: georgia;
		}
		h2 {
		color: #666;
		background-color: #F5F5DC;
		text-decoration: underline;
		}
		ul2 {
			list-style-type: none;
			padding: 0;
			margin: 0;
			font-family: cursive;
		}

		li {
			margin-bottom: 10px;
		}

		.lien{
			color: #2D9988;
			text-decoration: none;
			margin-right: 10px;
			 background-color: #F5F5DC;;
		}
		a:hover {
			text-decoration: underline;
		}
		
		
	</style>
</head>
<body>
<?php include 'entete.php'; ?>
<br><br>

	<header>
		<h1>Profil de l'admin</h1>
	</header>

<br><br>
	<a class="lien" href="/accueil.php">Page Accueil</a>
	<main>
		<section class="informations">
			<h2>Informations personnelles</h2>
			<ul2>
				<li><strong>Prenom :</strong> 
				<?php echo '' . $_SESSION['prenom'] . '.<br>'; ?>
				</li>
				<li><strong>Nom :</strong> 
				<?php echo '' . $_SESSION['nom'] . '.<br>'; ?>
				</li>

				<li><strong>Date de naissance :</strong> <?php 
				echo ' ' . $_SESSION['date'] . '.<br>'; ?></li>
				<li><strong>Email :</strong> <?php 
				echo ' ' . $_SESSION['email'] . '.<br>'; ?></li>
			</ul2>
		</section>

<br><br>

		<a class="lien" href="/deconnexion.php">Se deconnecter</a>
		<a class="lien" href="/supprimer-compte.php">Supprimer mon compte</a>
		<a class="lien" href="/modif.php">Modifier mon profil</a><br>

<br><br><br>

		<section>
			<h2>Gestion du site</h2>
			<ul2>
				<li><a class="lien" href="ajoutRecette-adminForm.php">Ajout tuto</a>
				</li>

				<li><a class="lien" href="suppressionRecetteForm.php">Supprimer tuto</a></li>
			</ul2>
			
			<li><a class="lien" href="EnvoieTuto-Admin-User-Form.php">Voir suggestions tutos des utilisateurs </a>
				</li>
		</section>
		
	</main>
	
	<br><br><br>
<object data="footer.html" width="100%" height="500px"></object>

</body>
</html>

