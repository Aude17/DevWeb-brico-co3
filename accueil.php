<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Brico & co</title>
  <style>
body {
      font-size: 20px;
      color: #666;
      background-color: #F5F5DC;
      font-family: Helvetica, Arial, sans-serif;
    }
    .banner {
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #2D9988;
    }

    .logo {
  position: absolute;
  display:flex;
  top: 90%;
  right:0%;
  width: 150px;
  margin-right: 20px;
  
    }
    
    .logo img {
      width: 150px; /* Ajustez la taille selon vos besoins */
    }

    h2 {
      font-size: 50px;
      color: #333;
      text-align: center;
    }

    .txt {
      text-align: center;
      font-size: 25px;
      line-height: 1.5;
      margin: 20px;
      font-family: cursive;
    }
    
     .image{
     position: absolute;
  display:flex;
    }
      .image img {
      width: 200px; /* Ajustez la taille selon vos besoins */
    }


.bar2 {
  position: absolute;
  top: 50%;
  left: 100px;
  transform: translate(150%, 150%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 100%;
}

.bar2 img {
  width:  200px;
  height: 200px;
}

.bar3 {
  position: absolute;
  top: 50%;
  left: 270px;
  transform: translate(115%, 115%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 150%;
}

.bar3 img {
  width:  200px;
  height: 200px;
}

.bar4 {
  position: absolute;
  top: 50%;
  left: 580px;
  transform: translate(90%, 90%);
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 150%;
}

.bar4 img {
  width:  200px;
  height: 200px;
}


     
  </style>

</head>
<body>

<?php include "entete.php"; ?>

<div class="banner">
  <div class="logo">
    <img src="images/logo.png" alt="Brico&Co Logo">
  </div>
  <h2>Brico&Co</h2>
</div>

<br><br>
<p class="txt">
  Que vous soyez propriétaire ou locataire, les occasions ne manqueront pas d'exercer vos talents de bricoleur chez vous. Si certains semblent être nés avec un marteau à la main, d'autres redoutent de devoir faire un simple trou dans un mur. Ces derniers ont aussi la meilleure des excuses : ils n'ont pas le matériel adéquat. Parce que nous pensons qu'il est de notre devoir d'aider le bricoleur du dimanche, voici quelques tutoriels pour vous aider dans vos différents bricolages.
  <br><br><br><br><br>
  En préparant soigneusement votre projet bricolage, vous êtes serein et vos travaux se passent dans le calme. Pour réussir vos travaux de bricolage, n’oubliez pas d’être organisés et prudents !
</p>
<br>
<div class="image">
  <img src="images/brico.jpg" alt="Image 1">
</div>
<br><br><br>
<div class="bar4">
  <img src="images/etagere.jpeg" alt="Etage 1">
</div>
<div class="bar2">
  <img src="images/table.jpeg" alt="Table 1">
</div>
<div class="bar3">
  <img src="images/biblio.jpeg" alt="Biblio 1">
</div>

<br><br><br><br><br><br><br><br>
<object data="footer.html" width="100%" height="500px"></object>
</body>

</html>
