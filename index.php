<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
        // On se connecte à la base de données
        $req1 = $bdd->prepare('INSERT INTO joueur(nom, prenom, photo_permis, date_naissance, taille, poids, poste_preferer, points_permis) VALUES(:nom, :prenom, :photo, :date_naissance, :taille, :poids, :poste_preferer, :points_permis)');

        if (!$req1){
            die('Erreur : ' . $req1.errorInfo());
        }

        $req1->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'photo'=> 'photos/' . basename($_FILES['photo']['name']),
            'date_naissance' => $date_naissance,
            'taille' => $taille,
            'poids' => $poids,
            'poste_preferer' => $poste,
            'points_permis' => $points,
        )); 
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) { 
            echo 'test';
        }
        $photo = $_FILES["photo"]["name"];
        $photo = 'photos/' . basename($_FILES['photo']['name']);
        if ($_FILES['photo']['size'] <= 8000000) {
            //on récupère l'extension du fichier dans $extension
            $fileInfo = pathinfo($_FILES['photo']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/' . basename($_FILES['photo']['name']));
            } else {
                echo "Le fichier choisit doit avoir l'extension png, jpg, jpeg ou gif";
            }
        } else {
            echo "fichier trop volumineux";
        }    
    
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
    <h1>acceuil</h1>
    <a href="javascript:history.go(-1)">Retour</a>
</body>