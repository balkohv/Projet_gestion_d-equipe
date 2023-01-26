<?php
    if (!isset($_COOKIE['token'])){
        header('Location: login.php');
    }
    try{
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=rwqjzdxw_gestion_apero','root','root');
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
        $req2 = $bdd->prepare('INSERT INTO rencontre(date_heure, equipe_adverse, lieu, heure_retour, victoire) VALUES(:date_heure, :equipe_adverse, :lieu, :heure_retour, 0)');
        //$req3 = $bdd->prepare('INSERT INTO jouer_rencontre(id_joueur, id_match) VALUES(:id_joueur, :id_match)');
        $date_heure = $_POST['date_heure'];
        $lieu = $_POST['lieu'];
        $adverse = $_POST['adverse'];
        $retour = $_POST['retour'];
        if (!$req2){
            die('Erreur : ' . $req2.errorInfo());
        }
        $req2->execute(array(
            'date_heure' => $date_heure,
            'equipe_adverse' => $adverse,
            'lieu' => $lieu,
            'heure_retour' => $retour,
        )); 
        echo $_POST['vomis'. $donnees['id_joueur'] . ''];
        $joueurs = $bdd->query('SELECT id_joueur,vomis,match_jouer FROM joueur');
         while ($donnees = $joueurs->fetch()){
            if (isset($_POST['joueur' . $donnees['id_joueur'] . ''])){
                //nouveau match
                $req3 = $bdd->prepare('INSERT INTO jouer_rencontre(id_joueur, id_match, litres_ingerer, note, status) VALUES(:id_joueur, :id_match,:litres_ingerer,:note,:status)');
                if (!$req3){
                    die('Erreur : ' . $req3.errorInfo());
                }
                $req3->execute(array(
                    'id_joueur' => $donnees['id_joueur'],
                    'id_match' => $bdd->query('SELECT MAX(id_rencontre) FROM rencontre')->fetch()[0]+1,
                    'litres_ingerer' => $_POST['litre'. $donnees['id_joueur'] . ''],
                    'note' => $_POST['note'. $donnees['id_joueur'] . ''],
                    'status' => $_POST['status'. $donnees['id_joueur'] . ''],
                )); 
                echo'test';
                //ajout des match joué
                $nouveaux_match = $bdd->prepare("UPDATE joueur set match_jouer=:match WHERE id_joueur=:id");
                if(!$nouveaux_match){
                    die('Erreur : ' . $nouveaux_match->errorInfo());
                }
                $nouveaux_match->execute(array(
                    'match' => $donnees['match_jouer']+1,
                    'id' => $donnees['id_joueur'],
                )); 
                //ajout des vomis
                if($_POST['vomis'. $donnees['id_joueur'] . '']){
                    $maj = $bdd->prepare("UPDATE joueur set vomis=" . $donnees['vomis']+1 ."  WHERE id_joueur=" . $donnees['id_joueur'] . "");
                    if(!$maj){
                        die('Erreur : ' . $maj->errorInfo());
                    }
                    $maj->execute();
                }
                //ajout des victoire
                if($_POST['victoire']){
                    $victoire = $bdd->prepare("UPDATE joueur set victoire=" . $donnees['victoire']+1 ."  WHERE id_joueur=" . $donnees['id_joueur'] ."");
                    if(!$victoire){
                        die('Erreur : ' . $victoire->errorInfo());
                    }
                    $victoire->execute();
                }
            }
        }
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
        <a href="logout.php">deconnexion</a>
    </div>

    <h1>Acceuil</h1>
    <h2>Application de gestion de l'équipe d'apéro de Toulouse </h2>
    <h3>🏆 TOP 7 monde du tournois Heineken 🏆 </h3>
    <h3>🏆 TOP 3 europe du tournois Poliakov 🏆 </h3>
   
    <div class="center">
    <img src="ressource/123.jpg" class="center-img" width= "1000px";>
</div>


    <a class = "retour"href="javascript:history.go(-1)">Retour</a>

   
</body>