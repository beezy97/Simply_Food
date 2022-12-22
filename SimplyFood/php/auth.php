<?php
session_start();

$user = 'root';
$pass = 'Toinon31';
try {
    $bdd = new PDO('mysql:host=localhost;dbname=simply_food;', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['envoi'])) {
    if (!empty($_POST['utilisateur_pseudo']) and !empty($_POST['utilisateur_mdp'])) {
        $utilisateur_pseudo = htmlspecialchars($_POST['utilisateur_pseudo']);
        $utilisateur_mdp = sha1($_POST['utilisateur_mdp']);

        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_pseudo = ? AND utilisateur_mdp = ?');
        $recupUser->execute(array($utilisateur_pseudo, $utilisateur_mdp));

        if ($recupUser->rowCount() > 0) {
            $user = $recupUser->fetch();
            $_SESSION['utilisateur_pseudo'] = $utilisateur_pseudo;
            $_SESSION['utilisateur_mdp'] = $utilisateur_mdp;
            $_SESSION['utilisateur_role'] = $user['utilisateur_role'];
            $_SESSION['utilisateur_id'] = $user['utilisateur_id'];
            header('Location: index.php');
        } else {
            $erreur = "Votre mot de passe ou pseudo est incorrecte.. Veuillez réessayer.";
        }
    } else {
        $erreur = "Veuillez compléter tous les champs..";
    }
}
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food - Authentification</title>
    <link rel="stylesheet" href=".././css/style-auth.css">
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
                <a href="inscription.php"><button>Se connecter</button></a>
            </div>
        </nav>
    </header>

    <section>
        <h1>Pas encore de compte ? <a href="inscription.php">Inscrivez vous</a></h1>
        <form method="POST" action="">
            <input type="text" size="30px" name="utilisateur_pseudo" placeholder="Entrez votre pseudo" autocomplete="off" /><br />
            <input type="password" size="30px" name="utilisateur_mdp" placeholder="Mot de passe" autocomplete="off" /><br />
            <input type="submit" name="envoi">
        </form>
        <?php
        if (isset($erreur)) {
            echo "<p>$erreur</p>";
        }
        ?>
    </section>

</body>

</html>