<?php
    if (!isset($_COOKIE['token'])){
        header('Location: login.php');
    }
?>
<html>
    <head>
        <title>joueur</title>
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
        <h1>joueur</h1>
        <?php
            try{
                $db = new PDO('mysql:host=localhost;port=3306;dbname=gestion_apero','root','root');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            $query = $db->prepare('SELECT * FROM joueur WHERE id_joueur = :id_joueur');
            $query->execute(array(
                'id_joueur' => $_GET['id'],
            ));
            $joueur = $query->fetch();
            echo('<form action="modifier_joueur.php" method="post"><h2>'.$joueur['prenom'].' '.$joueur['nom'].'</h2>');
            echo('<p>match jouer : ' . $joueur['match_jouer'] . '</p>');
            echo('<p>match gagner : ' . $joueur['victoire'] . '</p>');
            echo('<p>vomis : ' . $joueur['vomis'] . '</p>');
            echo('<p>date de naissance :<input type="date" name="date_anniversaire" value="'.$joueur['date_naissance'].'"></input></p>');
            echo('<p>taille : <input type="text" name="taille" value="'.$joueur['taille'].'"></input></p>');
            echo('<p>poids : <input type="text" name="poids" value="'.$joueur['poids'].'"></input></p>');
            echo('<p>poste_preferer : <input type="text" name="poste" value="'.$joueur['poste_preferer'].'"></input></p>');
            echo('<p>point sur le permis : <input type="number" name="points" value="'.$joueur['points_permis'].'"></input></p>');
            echo('<input type="hidden" name="id_joueur" value="'.$joueur['id_joueur'].'"></input>');
            echo('<input type="submit" name="submit_joueur" value="modifier"></form>');
        ?>
    </body>
</html>