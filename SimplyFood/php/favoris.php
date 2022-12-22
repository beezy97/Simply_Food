<?php
session_start();
if (!$_SESSION['utilisateur_mdp']) {
    header('Location: auth.php');
}


?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food - Favoris</title>
    <link rel="stylesheet" href=".././css/style-favoris.css">
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
                <li><a href="recette.php">Recettes</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="button">
                <p><a href="#">&#9776</a></p>
                <a href="favoris.php"><button>Mes favoris</button></a>
                <?php 
                if (!isset($_SESSION['utilisateur_pseudo'])){
                    ?>
                        <a href="auth.php"><button>Se connecter</button></a>
                    <?php
                }else {
                    if ($_SESSION['utilisateur_role'] == 1) {
                        ?>
                            <a href="admin.php"><button>Admin</button></a>
                        <?php
                    }elseif($_SESSION['utilisateur_role'] == 2){
                        ?>
                            <a href="profil.php"><button>Mon profil</button></a>
                        <?php
                    }
                    ?>
                        <a href="deconnexion.php"><button>Se déconnecter</button></a>
                    <?php
                }

                ?>
            </div>
        </nav>
    </header>

</body>

</html>