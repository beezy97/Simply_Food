<?php
session_start();
if (!$_SESSION['utilisateur_mdp']) {
    header('Location: auth.php');
}

$user = 'root';
$pass = 'Toinon31';

$bdd = new PDO('mysql:host=localhost;dbname=simply_food;', $user, $pass);

?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food</title>
    <link rel="stylesheet" href="./../css/style-admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@100&family=Raleway:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h2><a href="index.php">Simply Food</a></h2>
            </div>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="publier.php">Publier recette</a></li>
            </ul>
            <div class="button">
                <p><a href="#">&#9776</a></p>
                <a href="admin.php"><button>Admin</button></a>
                <a href="deconnexion.php"><button>Se déconnecter</button></a>
            </div>
        </nav>
    </header>
    <section>
    <?php
        $recupAllUser = $bdd->query('SELECT * from utilisateur');
        while($membres = $recupAllUser->fetch()){
            ?>
            <div class="listeMembre">
                <h2>Pseudo : </h2>
                <p><?= $membres['utilisateur_pseudo']; ?></p>
                <a href="bannir.php?utilisateur_id=<?= $membres['utilisateur_id']; ?>">Bannir</a>
            </div>
            <?php 
        }
    ?>
    </section>
</body>
</html>