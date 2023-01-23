<html>
    <head>
        <title>login</title>
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
        </div>
        <h1>login</h1>
        <form action="login.php" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            <input type="submit" name="submit" value="login">
        </form>
    </body>
</html>