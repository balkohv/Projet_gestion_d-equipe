<?php
    if (!isset($_COOKIE['token'])){ 
        header('Location: login.php');
    }
?>
<header>
    <title>Ajouter un joueur</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</header>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="ajouterjoueur.php">Ajouter un joueur</a>
        <a href="ajoutermatch.php">Ajouter un match</a>
        <a href="list_joueur.php">Liste des joueurs</a>
        <a href="list_match.php">Liste des matchs</a>
        <a href="logout.php">deconnexion</a>
    </div>
    <h1>Ajouter un joueur</h1>
    <form action="index.php" method="post">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="date" name="date_naissance" placeholder="Date de naissance">
        <input type="number" name="taille" placeholder="Taille">
        <input type="number" name="poids" placeholder="Poids">
        <input type="text" name="poste" placeholder="Poste preferer">
        <input type="number" name="points" placeholder="points sur le permis">
        <input type="file" name="photo" placeholder="Photo du permis">
        <input type="submit" name="submit_joueur" value="Ajouter">
    </form>
    <a class = "retour"href="javascript:history.go(-1)">Retour</a>
</body>