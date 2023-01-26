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
    <h1>list match</h1>
    <table  class="tableau">
        <tr>
            <th>date_heure</th>
            <th>lieu</th>
            <th>adverse</th>
            <th>retour</th>
        </tr>
        <?php
            $db = new PDO('mysql:host=localhost;port=3306;dbname=gestion_apero','root','root');
            $query = $db->query('SELECT * FROM rencontre');
            while ($data = $query->fetch()) {
                echo '<tr class="ligne" id="' . $donnees['id_rencontre'] . '">';
                echo '<td>' . $data['date_heure'] . '</td>';
                echo '<td>' . $data['lieu'] . '</td>';
                echo '<td>' . $data['equipe_adverse'] . '</td>';
                echo '<td>' . $data['heure_retour'] . '</td>';
                echo '</tr>';
            }
        ?>
     <a class = "retour"href="javascript:history.go(-1)">Retour</a>
</body>