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
    if (isset($_POST['submit'])) {
        $db = new PDO('mysql:host=localhost;port=3306;dbname=gestion_apero','root','root');
        $query = $db->prepare('INSERT INTO user (nom_utilisateur, mdp,prenom) VALUES (:log, :pass, :prenom)');
        if (!$query){
            die('Erreur : ' . $query.errorInfo());
        }
        echo(password_hash($_post['password'], PASSWORD_DEFAULT));
        $query->execute(array(
            'log' => $_POST['login'],
            'pass' => password_hash($_post['password'], PASSWORD_DEFAULT),
            'prenom' => $_POST['prenom'],
        ));
        echo("ici");
        header('Location: login.php');
    }
    else {
        header('Location: register.php');
    }
?>