<html>
    <head>
        <title>connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            if (isset($_POST['submit'])) {
                $db = new PDO('mysql:host=localhost;port=3306;dbname=gestion_apero','root','root');
                $query = $db->prepare('SELECT * FROM users WHERE login=? AND password=?');
                $query->execute([$_POST['login'], $_POST['password']]);
                $data = $query->fetch();
                if ($data) {
                    session_start();
                    $_SESSION['login'] = $data['login'];
                    $_SESSION['password'] = $data['password'];
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