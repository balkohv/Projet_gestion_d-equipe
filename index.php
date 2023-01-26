<?php
    if (!isset($_COOKIE['token'])){
        header('Location: login.php');
    }
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
        $joueurs = $bdd->query('SELECT id_joueur,vomis FROM joueur');
         while ($donnees = $joueurs->fetch()){
            if (isset($_POST['joueur' . $donnees['id_joueur'] . ''])){
                $req3 = $bdd->prepare('INSERT INTO jouer_rencontre(id_joueur, id_match, litres_ingerer, note, status) VALUES(:id_joueur, :id_match,:litres_ingerer,:note,:status)');
                if($_POST['vomis'. $donnees['id_joueur'] . '']){
                    $maj = $bd->prepare("UPDATE joueur set vomis=" . $donnees['vomis']+1 ."  WHERE id_joueur=" . $donnees['id_joueur'] ."");
                    if(!$maj){
                        die('Erreur : ' . $maj->errorInfo());
                    }
                    $maj->execute();
                }

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
            }
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
        <a href="logout.php">deconnexion</a>
    </div>
    <h1>acceuil</h1>
   
    <div class="center">
    <img src="ressource/123.jpg" class="center-img" width= "1200px";>
</div>


    <a class = "retour"href="javascript:history.go(-1)">Retour</a>
</body>