<html>
    <head>
        <title>connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            function random($var){
                    $string = "";
                    $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
                    srand((double)microtime()*1000000);
                    for($i=0; $i<$var; $i++){
                        $string .= $chaine[rand()%strlen($chaine)];
                    }
                    return $string;
                }
            if (isset($_POST['submit'])) {
                $db = new PDO('mysql:host=localhost;port=3306;dbname=rwqjzdxw_gestion_apero','root','root');
                $query = $db->prepare('SELECT * FROM user WHERE nom_utilisateur=:log AND mdp=:mdp');
                if (!$query){
                    die('Erreur : ' . $query.errorInfo());
                }
                echo($_POST['password']);
                $query->execute(array(
                    'log' => $_POST['login'],
                    'mdp' => hash("sha256",$_POST['password']),
                ));
                
                echo($_POST['password']);
                $data = $query->fetch();
                if ($data) {
                    session_start();
                    setcookie("token", random(20), time()+3600);
                    header('Location: index.php');
                }
                else {
                    echo 'login ou password incorrect';
                }
            }
            else {
                header('Location: login.php');
            }
        ?>
    </body>
</html>