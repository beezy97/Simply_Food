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
    if (!empty($_POST['recette_titre']) and !empty($_POST['recette_type']) and !empty($_POST['recette_nb'])
    and !empty($_POST['recette_prepa']) and !empty($_POST['recette_cuisson']) 
    and !empty($_POST['recette_difficulte'])and !empty($_POST['recette_ingredient']) and !empty($_POST['recette_description'])) {
        $recette_titre = htmlspecialchars($_POST['recette_titre']);
        $recette_type = htmlspecialchars($_POST['recette_type']);
        $recette_nb = htmlspecialchars($_POST['recette_nb']);
        $recette_prepa = htmlspecialchars($_POST['recette_prepa']);
        $recette_cuisson = ($_POST['recette_cuisson']);
        $recette_difficulte = ($_POST['recette_difficulte']);
        $recette_ingredient = htmlspecialchars($_POST['recette_ingredient']);
        $recette_description = htmlspecialchars($_POST['recette_description']);

        $recette_titrelength = strlen($recette_titre);
        if ($recette_titrelength <= 30) {
            $reqrecette = $bdd->prepare('SELECT * FROM recette WHERE recette_titre = ?');
            $reqrecette->execute(array($recette_titre));
            $recetteexist = $reqrecette->rowCount();
            if ($recetteexist == 0) {
                $insertRecipe = $bdd->prepare('INSERT INTO recette(recette_titre, recette_type, recette_nb, recette_prepa, recette_cuisson, recette_difficulte, recette_ingredient, recette_description) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                $insertRecipe->execute(array($recette_titre, $recette_type, $recette_nb, $recette_prepa, $recette_cuisson, $recette_difficulte, $recette_ingredient, $recette_description));
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food - Publier recette</title>
    <link rel="stylesheet" href="./../css/style-publier.css">
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
        <div class="cercle"></div>
        <h1>Publier une nouvelle recette</h1>
        <form method="POST" action="">
            <div class ="gauche">
                <input type="text" size="30px" name="recette_titre" placeholder="Nom de la recette" autocomplete="off" /><br />
                <input type="text" size="30px" name="recette_type" placeholder="Type de la recette" autocomplete="off" /><br />
                <input type="text" size="30px" name="recette_nb" placeholder="Nombres de personnes" autocomplete="off" /><br />
                <input type="text" size="30px" name="recette_prepa" placeholder="Durée en minute" autocomplete="off" /><br />
                <input type="text" size="30px" name="recette_cuisson" placeholder="Cuisson en minute" autocomplete="off" /><br />
                <input type="text" size="30px" name="recette_difficulte" placeholder="Difficulté /4" autocomplete="off" /><br />
            </div>
            <div class="droite">
                <textarea type="text" rows="5" cols="33" name="recette_ingredient" placeholder="Lister les ingrédients" autocomplete="off"></textarea></br>
                <textarea type="text" rows="5" cols="33" name="recette_description" placeholder="Consignes de la recette" autocomplete="off"></textarea>
                <input type="submit" name="envoi">
            </div>
        </form>
    </section>

</body>

</html>