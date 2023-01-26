<?php
    if (!isset($_COOKIE['token'])){
        header('Location: login.php');
    }
?>
<header>
    <title>Ajouter un joueur</title>
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
    <h1>Ajouter un match</h1>
    <form class="ajouter_match" action="index.php" method="post">
        <input type="datetime-local" name="date_heure">
        <input type="text" name="lieu" placeholder="lieu">
        <input type="text" name="adverse" placeholder="equipe adverse" >
        <input type="datetime-local" name="retour" placeholder="heure de retour">
        <input type="checkbox" name="victoire" placeholder="victoire">
        <div class="list_joueur_match">
            <h3>joueur participant</h3>
            <?php
                $db = new PDO('mysql:host=localhost;port=3306;dbname=rwqjzdxw_gestion_apero','root','root');
                $query = $db->query('SELECT * FROM joueur');
                while ($data = $query->fetch()) {
                    echo '<br><input class="checkbx" type="checkbox" name="joueur' . $data['id_joueur'] . '" id="' . $data['id_joueur'] . '" value="' . $data['id_joueur'] . '">' . $data['nom'] . ' ' . $data['prenom'] ;
                    echo '<div id="form_' . $data['id_joueur'] . '" style="display:none">"<label for="litre">litre injeré</label><input type="number" name="litre' . $data['id_joueur'] . '"></input>';
                    echo '<label for="note">note du match</label><input type="number" name="note' . $data['id_joueur'] . '"></input>';
                    echo '<label for="note">vomi</label><input type="checkbox" name="vomis' . $data['id_joueur'] . '"></input>';
                    echo '<label for="status">poste</label><input type="text" name="status' . $data['id_joueur'] . '"></input></div>';
                }
            ?>
        </div>
        <input type="submit" name="submit_match" value="submit_match">
    </form>
    <a class = "retour"href="javascript:history.go(-1)">Retour</a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.checkbx').click(function(){
            var id = $(this).attr('id');
            if($(this).is(':checked')){
                document.getElementById('form_' + id).style.display = "block";
            }else{
                document.getElementById('form_' + id).style.display = "none";
            }
        });
    });
</script>