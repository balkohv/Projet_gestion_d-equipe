<html>
    <head>
        <title>register</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
    </body>
</html>
<?php
    try{
        $db = new PDO('mysql:host=localhost;port=3306;dbname=rwqjzdxw_gestion_apero','root','root');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = hash("sha256",$_POST['password']);
        $prenom = $_POST['prenom'];
        $query = $db->prepare('INSERT INTO user(nom_utilisateur, mdp, prenom) VALUES (:nom_utilisateur, :mdp, :prenom)');
        if (!$query){
            die('Erreur : ' . $query.errorInfo());
        }
        $query->execute(array(
            'nom_utilisateur' => $login,
            'mdp' => $password,
            'prenom' => $prenom,
            ));
        header('Location: login.php');
    }
    else {
        header('Location: register.php');
    }
?>