<?php
session_start();


?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food - Contact</title>
    <link rel="stylesheet" href=".././css/style-contact.css">
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

</script>

    <section>
        <div class="cercle"></div>
        <h1>On vous écoute</h1>
        <form action="page-de-reception.php" method="post">
            <p>
                <label for="nom"></label>
                <input type="nom" size="30" placeholder="&#9786; Entrez votre nom" words required></input>
            </p>
            <p>
                <label for="prenom"></label>
                <input type="prenom" size="30" placeholder="&#9786; Entrez votre prénom" words required></input>
            </p>

            <p>
                <label for="mail"></label>
                <input type="email" id="mail" size="30" placeholder="&#9993 Entrez votre E-mail" required>
            </p>

            <p>
                <label for="numero"></label>
                <input type="tel" pattern="[0-9]{10}" size="30" id="numero" placeholder="&#9743; Entrez votre numéro" required>
            </p>

            <p>
                <label for="message"></label>
                <textarea name="message" id="message" cols="30" rows="5" placeholder="Ecrivez nous.." required></textarea>
            </p>

            <p>
                <input type="submit" value="Envoyer">
            </p>
        </form>
    </section>


</body>

</html>