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
    <h1>list match</h1>
    <table>
        <tr>
            <th>date_heure</th>
            <th>lieu</th>
            <th>adverse</th>
            <th>retour</th>
        </tr>
        <?php
            $db = new PDO('mysql:host=localhost;port=3307;dbname=gestion_apero','user','root');
            $query = $db->query('SELECT * FROM rencontre');
            while ($data = $query->fetch()) {
                echo '<tr>';
                echo '<td>' . $data['date_heure'] . '</td>';
                echo '<td>' . $data['lieu'] . '</td>';
                echo '<td>' . $data['equipe_adverse'] . '</td>';
                echo '<td>' . $data['heure_retour'] . '</td>';
                echo '</tr>';
            }
        ?>
    <a href="javascript:history.go(-1)">Retour</a>
</body>