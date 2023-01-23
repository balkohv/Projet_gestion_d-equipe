<html>
    <head>
        <title>register</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="navbar">
            <a href="index.php">Accueil</a>
            <a href="ajouterjoueur.php">Ajouter un joueur</a>
            <a href="ajoutermatch.php">Ajouter un match</a>
            <a href="list_joueur.php">Liste des joueurs</a>
            <a href="list_match.php">Liste des matchs</a>
            <a href="login.php">connexion</a>
            <a href="register.php">nouveau compte</a>
        </div>
        <h1>register</h1>
        <form action="enregister_user.php" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            <label for="prenom">prenom</label>
            <input type="text" name="prenom" id="prenom">
            <input type="submit" name="submit" value="register">
        </form>
    </body>
</html>