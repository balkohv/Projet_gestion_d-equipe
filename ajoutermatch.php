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
    </div>
    <h1>Ajouter un match</h1>
    <form class="ajouter_match" action="index.php" method="post">
        <input type="datetime-local" name="date_heure">
        <input type="text" name="lieu" placeholder="lieu">
        <input type="text" name="adverse" placeholder="equipe adverse" >
        <input type="datetime-local" name="retour" placeholder="heure de retour">
        <div class="list_joueur_match">
            <h3>joueur participant</h3>
            <?php
                $db = new PDO('mysql:host=localhost;port=3307;dbname=gestion_apero','user','root');
                $query = $db->query('SELECT * FROM joueur');
                while ($data = $query->fetch()) {
                    echo '<br><input type="checkbox" name="joueur" value="' . $data['id_joueur'] . '">' . $data['nom'] . ' ' . $data['prenom'] ;
                }
            ?>
        </div>
        <input type="submit" name="submit_match" value="submit_match">
    </form>
    <a href="javascript:history.go(-1)">Retour</a>
</body>