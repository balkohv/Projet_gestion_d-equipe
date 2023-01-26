<?php 
    $bd = new PDO('mysql:host=localhost;port=3306;dbname=gestion_apero','root','root');
    $query = $bd->prepare("UPDATE joueur set date_naissance=:date_naissance, taille=:taille, poids=:poids, poste_preferer=:poste, points_permis=:points  WHERE id_joueur=:id");
    if(!$query){
        die('Erreur : ' . $query->errorInfo());
    }
    echo("coucou");
    $query->execute(array(
        'date_naissance' => $_POST['date_anniversaire'],
        'taille' => $_POST['taille'],
        'poids' => $_POST['poids'],
        'poste' => $_POST['poste'],
        'points' => $_POST['points'],
        'id' => $_POST['id_joueur'],
    ));
    echo("yes");
    header('Location: index.php');

?>