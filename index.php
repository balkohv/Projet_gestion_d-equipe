<?php
    try{
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=gestion_apero','root','root');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    if(isset($_POST['submit_joueur'])){
       // On récupère les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_naissance = $_POST['date_naissance'];
        $taille = $_POST['taille'];
        $poids = $_POST['poids'];
        $poste = $_POST['poste'];
        $points = $_POST['points'];
        $photo = $_POST['photo'];
        // On se connecte à la base de données
        $req1 = $bdd->prepare('INSERT INTO joueur(nom, prenom, date_naissance, taille, poids, poste_preferer, points_permis) VALUES(:nom, :prenom, :date_naissance, :taille, :poids, :poste_preferer, :points_permis)');

        if (!$req1){
            die('Erreur : ' . $req1.errorInfo());
        }

        $req1->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'taille' => $taille,
            'poids' => $poids,
            'poste_preferer' => $poste,
            'points_permis' => $points,
        )); 
    }elseif(isset($_POST['submit_match'])){
        ?><script>
            console.log("test");
        </script><?php
        $date_heure = $_POST['date_heure'];
        $lieu = $_POST['lieu'];
        $adverse = $_POST['adverse'];
        $retour = $_POST['retour'];
        $joueurs = $bdd->query('SELECT id_joueur FROM joueur');
         while ($donnees = $joueurs->fetch()){
            if ($_POST['joueur' . $donnees['id_joueur'] . '']){
                echo "ok";
            }
            $req3 = $bdd->prepare('INSERT INTO jouer_rencontre(id_joueur, id_match) VALUES(:id_joueur, :id_match)');
            if (!$req3){
                die('Erreur : ' . $req3.errorInfo());
            }
            $req3->execute(array(
                'id_joueur' => $joueur,
                'id_match' => $id_match,
            )); 
        }
        $req2 = $bdd->prepare('INSERT INTO rencontre(date_heure, equipe_adverse, lieu, heure_retour) VALUES(:date_heure, :equipe_adverse, :lieu, :heure_retour)');
        //$req3 = $bdd->prepare('INSERT INTO jouer_rencontre(id_joueur, id_match) VALUES(:id_joueur, :id_match)');
        echo($_POST['joueur[]']);
        if (!$req2){
            die('Erreur : ' . $req2.errorInfo());
        }

        $req2->execute(array(
            'date_heure' => $date_heure,
            'lieu' => $lieu,
            'equipe_adverse' => $adverse,
            'heure_retour' => $retour,
        )); 
    }
    
?>
<header>
    <title>acceuil</title>
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
    <h1>acceuil</h1>
    <a href="javascript:history.go(-1)">Retour</a>
</body>