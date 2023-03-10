<?php
    if (!isset($_COOKIE['token'])){
        header('Location: login.php');
    }
?>
<head>
    <title>liste joueur</title>
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
        <a href="logout.php">deconnexion</a>
    </div>
    <h1>liste joueur</h1>
    <table class="tableau">
        <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>date de naissance</th>
            <th>taille</th>
            <th>poids</th>
            <th>poste preferer</th>
            <th>points sur le permis</th>
            <th>photo du permis</th>
        </tr>
        <?php
            try{
                $bdd = new PDO('mysql:host=localhost;port=3306;dbname=rwqjzdxw_gestion_apero','root','root');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            $req = $bdd->query('SELECT * FROM joueur');
            while ($donnees = $req->fetch()){
                echo '<tr  class="ligne" id="' . $donnees['id_joueur'] . '">';
                echo '<td>' . $donnees['nom'] . '</td>';
                echo '<td>' . $donnees['prenom'] . '</td>';
                echo '<td>' . $donnees['date_naissance'] . '</td>';
                echo '<td>' . $donnees['taille'] . '</td>';
                echo '<td>' . $donnees['poids'] . '</td>';
                echo '<td>' . $donnees['poste_preferer'] . '</td>';
                echo '<td>' . $donnees['points_permis'] . '</td>';
                echo '<td>' . $donnees['photo_permis'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class = "retour"href="javascript:history.go(-1)">Retour</a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('.ligne').click(function(){
        var id = $(this).attr('id');
        window.location.href = 'joueur.php?id=' + id;
    })
</script>