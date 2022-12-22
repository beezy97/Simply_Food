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
    if (!empty($_POST['utilisateur_nom']) and !empty($_POST['utilisateur_prenom'])  and !empty($_POST['utilisateur_pseudo']) and !empty($_POST['utilisateur_mdp']) and !empty($_POST['utilisateur_mail'])) {
        $utilisateur_nom = htmlspecialchars($_POST['utilisateur_nom']);
        $utilisateur_prenom = htmlspecialchars($_POST['utilisateur_prenom']);
        $utilisateur_pseudo = htmlspecialchars($_POST['utilisateur_pseudo']);
        $utilisateur_mdp = sha1($_POST['utilisateur_mdp']);
        $utilisateur_mail = ($_POST['utilisateur_mail']);

        $utilisateur_pseudolength = strlen($utilisateur_pseudo);
        if ($utilisateur_pseudolength <= 20) {
            if (filter_var($utilisateur_mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_mail = ?');
                $reqmail->execute(array($utilisateur_mail));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0) {
                    $reqpseudo = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_pseudo = ?');
                    $reqpseudo->execute(array($utilisateur_pseudo));
                    $pseudoexist = $reqpseudo->rowCount();
                    if ($pseudoexist == 0) {
                        $reqpseudoetmail = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_pseudo = ? AND utilisateur_mail = ?');
                        $reqpseudoetmail->execute(array($utilisateur_pseudo, $utilisateur_mail));
                        $pseudoetmailexist = $reqpseudoetmail->rowCount();
                        if ($pseudoetmailexist == 0) {
                            $insertUser = $bdd->prepare('INSERT INTO utilisateur(utilisateur_nom, utilisateur_prenom, utilisateur_pseudo, utilisateur_mdp, utilisateur_mail) VALUES(?, ?, ?, ?, ?)');
                            $insertUser->execute(array($utilisateur_nom, $utilisateur_prenom, $utilisateur_pseudo, $utilisateur_mdp, $utilisateur_mail));

                            $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_pseudo = ? AND utilisateur_mdp = ?');
                            $recupUser->execute(array($utilisateur_pseudo, $utilisateur_mdp));

                            if ($recupUser->rowCount() > 0) {
                                $_SESSION['utilisateur_pseudo'] = $utilisateur_pseudo;
                                $_SESSION['utilisateur_mdp'] = $utilisateur_mdp;
                                $_SESSION['utilisateur_id'] = $recupUser->fetch()['utilisateur_pseudo'];
                                header('Location: deconnexion.php');
                            }

                            $welcome = "Bravo! Votre compte à bien était créé. Veuillez vous reconnecter!";

                        } else {
                            $erreur = "Votre pseudo et votre mail sont déjà utilisés!";
                        }
                    } else {
                        $erreur = "Votre pseudo est déjà utilisé!";
                    }
                } else {
                    $erreur = "Votre adresse-email est déjà utilisée!";
                }
            } else {
                $erreur = "Votre adresse-email n'est pas valide!";
            }
        } else {
            $erreur = "Veuillez entrer un pseudo de moins de 12 caractères!";
        }
    } else {
        $erreur = "Veuillez compléter tous les champs.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food - Inscription</title>
    <link rel="stylesheet" href="./../css/style-inscription.css">
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
                <?php if (!isset($_SESSION['utilisateur_pseudo'])) {
                ?>
                    <a href="auth.php"><button>Se connecter</button></a>
                <?php
                } else {
                ?>
                    <a href="profil.php"><button>Mon profil</button></a>
                    <a href="deconnexion.php"><button>Se déconnecter</button></a>
                <?php
                }

                ?>
            </div>
        </nav>
    </header>

    <section>

        <h1>Déja inscrit ? <a href="auth.php">Connecter vous</a></h1>
        <form method="POST" action="">
            <input type="text" size="30px" name="utilisateur_nom" placeholder="Nom" autocomplete="off" /><br />
            <input type="text" size="30px" name="utilisateur_prenom" placeholder="Prénom" autocomplete="off" /><br />
            <input type="text" size="30px" name="utilisateur_pseudo" placeholder="Entrez un pseudo" autocomplete="off" /><br />
            <input type="password" size="30px" name="utilisateur_mdp" placeholder="Mot de passe" autocomplete="off" /><br />
            <input type="email" size="30px" name="utilisateur_mail" placeholder="E-mail" autocomplete="off" /><br />
            <input type="submit" name="envoi">
        </form>
        <?php
        if (isset($erreur)) {
            echo "<p>$erreur</p>";
        }
        ?>
        <?php
        if (isset($welcome)) {
            echo "<div>$welcome</div>";
        }
        ?>


    </section>
</body>

</html>