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

$req = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 21');
$requete = $bdd->query($req);
$recettes = $requete->fetchAll();

$req2 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 22');
$requete2 = $bdd->query($req2);
$recettes2 = $requete2->fetchAll();

$req3 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 23');
$requete3 = $bdd->query($req3);
$recettes3 = $requete3->fetchAll();

$req4 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 24');
$requete4 = $bdd->query($req4);
$recettes4 = $requete4->fetchAll();

$req5 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 25');
$requete5 = $bdd->query($req5);
$recettes5 = $requete5->fetchAll();

$req6 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 26');
$requete6 = $bdd->query($req6);
$recettes6 = $requete6->fetchAll();

$req7 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 27');
$requete7 = $bdd->query($req7);
$recettes7 = $requete7->fetchAll();

$req8 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 28');
$requete8 = $bdd->query($req8);
$recettes8 = $requete8->fetchAll();

$req9 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 29');
$requete9 = $bdd->query($req9);
$recettes9 = $requete9->fetchAll();

$req10 = ('SELECT * FROM recette WHERE recette_type = "BOISSON" AND recette_id = 30');
$requete10 = $bdd->query($req10);
$recettes10 = $requete10->fetchAll();


?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food - Boissons</title>
    <link rel="stylesheet" href=".././css/style-contenu.css">
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
                        <a href="deconnexion.php"><button>Se d??connecter</button></a>
                    <?php
                }

                ?>
            </div>
        </nav>
    </header>

    <section class="produit">
        <button class="pre-btn"><img src="../img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="../img/arrow.png" alt=""></button>
        <div class="produit-container">
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn">Etapes</button>
                    <img src="../img/Contenu/mojito.jpeg" class="produit-thumb" alt="">
                    <form method="POST" action=""><button class="carte-btn">Ajouter aux favoris</button></form>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes as $recette) : ?>
                        <h2 class="produit-brand"><?= $recette["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal" class="modal">
                <div class="popup">
                    <span class="close">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette["recette_titre"] ?></h2>
                            <img src="../img/Contenu/mojito.jpeg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn2">Etapes</button>
                    <img src="../img/Contenu/aperolspritz.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes2 as $recette2) : ?>
                        <h2 class="produit-brand"><?= $recette2["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette2["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette2["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal2" class="modal2">
                <div class="popup">
                    <span class="close2">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette2["recette_titre"] ?></h2>
                            <img src="../img/Contenu/aperolspritz.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette2["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette2["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette2["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette2["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette2["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn3">Etapes</button>
                    <img src="../img/Contenu/pina.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes3 as $recette3) : ?>
                        <h2 class="produit-brand"><?= $recette3["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette3["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette3["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal3" class="modal3">
                <div class="popup">
                    <span class="close3">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette3["recette_titre"] ?></h2>
                            <img src="../img/Contenu/pina.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette3["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette3["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette3["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette3["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette3["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn4">Etapes</button>
                    <img src="../img/Contenu/margarita.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes4 as $recette4) : ?>
                        <h2 class="produit-brand"><?= $recette4["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette4["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette4["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal4" class="modal4">
                <div class="popup">
                    <span class="close4">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette4["recette_titre"] ?></h2>
                            <img src="../img/Contenu/margarita.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette4["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette4["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette4["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette4["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette4["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn5">Etapes</button>
                    <img src="../img/Contenu/caipirinha.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes5 as $recette5) : ?>
                        <h2 class="produit-brand"><?= $recette5["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette5["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette5["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal5" class="modal5">
                <div class="popup">
                    <span class="close5">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette5["recette_titre"] ?></h2>
                            <img src="../img/Contenu/caipirinha.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette5["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette5["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette5["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette5["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette5["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn6">Etapes</button>
                    <img src="../img/Contenu/blue.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes6 as $recette6) : ?>
                        <h2 class="produit-brand"><?= $recette6["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette6["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette6["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal6" class="modal6">
                <div class="popup">
                    <span class="close6">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette6["recette_titre"] ?></h2>
                            <img src="../img/Contenu/blue.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette6["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette6["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette6["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette6["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette6["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn7">Etapes</button>
                    <img src="../img/Contenu/negroni.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes7 as $recette7) : ?>
                        <h2 class="produit-brand"><?= $recette7["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette7["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette7["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal7" class="modal7">
                <div class="popup">
                    <span class="close7">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette7["recette_titre"] ?></h2>
                            <img src="../img/Contenu/negroni.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette7["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette7["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette7["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette7["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette7["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn8">Etapes</button>
                    <img src="../img/Contenu/marquise.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes8 as $recette8) : ?>
                        <h2 class="produit-brand"><?= $recette8["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette8["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette8["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal8" class="modal8">
                <div class="popup">
                    <span class="close8">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette8["recette_titre"] ?></h2>
                            <img src="../img/Contenu/marquise.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette8["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette8["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette8["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette8["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette8["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn9">Etapes</button>
                    <img src="../img/Contenu/daiquiri.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes9 as $recette9) : ?>
                        <h2 class="produit-brand"><?= $recette9["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette9["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette9["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal9" class="modal9">
                <div class="popup">
                    <span class="close9">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette9["recette_titre"] ?></h2>
                            <img src="../img/Contenu/daiquiri.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette9["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette9["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette9["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette9["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette9["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit-carte">
                <div class="produit-image">
                    <button class="etapes" id="myBtn10">Etapes</button>
                    <img src="../img/Contenu/tequila.jpg" class="produit-thumb" alt="">
                    <button class="carte-btn">Ajouter aux favoris</button>
                </div>
                <div class="produit-info">
                    <?php foreach ($recettes10 as $recette10) : ?>
                        <h2 class="produit-brand"><?= $recette10["recette_titre"] ?></h2>
                        <p class="produit-short-description">Pr??paration : <?= $recette10["recette_prepa"] ?>min</p>
                        <span class="infos">Difficult??: <?= $recette10["recette_difficulte"] ?>/4</span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="myModal10" class="modal10">
                <div class="popup">
                    <span class="close10">&times;</span>
                    <div class="infos">
                        <div class="infos-titre">
                            <h2><?= $recette10["recette_titre"] ?></h2>
                            <img src="../img/Contenu/tequila.jpg" class="infos-img" alt="">
                        </div>
                        <div class="prepa">
                            <p>Pr??paration : <?= $recette10["recette_prepa"] ?>min </p>
                            <p>Cuisson : <?= $recette10["recette_cuisson"] ?> min</p>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="instructions-titre">
                            <h3>Pour <?= $recette10["recette_nb"] ?> personnes</h3>
                        </div>
                        <div class="ingredients">
                            <ul>
                                <li><?= $recette10["recette_ingredient"] ?></li>
                            </ul>
                        </div>
                        <div class="consignes">
                            <div class="consignes-etapes">
                                <p><?= $recette10["recette_description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <footer>
        <p>L???ABUS D???ALCOOL EST DANGEREUX POUR LA SANT??, ?? CONSOMMER AVEC MOD??RATION</p>
    </footer>
    <script src="../script.js"></script>
    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }

        var modal2 = document.getElementById("myModal2");
        var btn2 = document.getElementById("myBtn2");
        var span = document.getElementsByClassName("close2")[0];
        btn2.onclick = function() {
            modal2.style.display = "block";
        }
        span.onclick = function() {
            modal2.style.display = "none";
        }

        var modal3 = document.getElementById("myModal3");
        var btn3 = document.getElementById("myBtn3");
        var span3 = document.getElementsByClassName("close3")[0];
        btn3.onclick = function() {
            modal3.style.display = "block";
        }
        span3.onclick = function() {
            modal3.style.display = "none";
        }

        var modal4 = document.getElementById("myModal4");
        var btn4 = document.getElementById("myBtn4");
        var span4 = document.getElementsByClassName("close4")[0];
        btn4.onclick = function() {
            modal4.style.display = "block";
        }
        span4.onclick = function() {
            modal4.style.display = "none";
        }

        var modal5 = document.getElementById("myModal5");
        var btn5 = document.getElementById("myBtn5");
        var span5 = document.getElementsByClassName("close5")[0];
        btn5.onclick = function() {
            modal5.style.display = "block";
        }
        span5.onclick = function() {
            modal5.style.display = "none";
        }

        var modal6 = document.getElementById("myModal6");
        var btn6 = document.getElementById("myBtn6");
        var span6 = document.getElementsByClassName("close6")[0];
        btn6.onclick = function() {
            modal6.style.display = "block";
        }
        span6.onclick = function() {
            modal6.style.display = "none";
        }

        var modal7 = document.getElementById("myModal7");
        var btn7 = document.getElementById("myBtn7");
        var span7 = document.getElementsByClassName("close7")[0];
        btn7.onclick = function() {
            modal7.style.display = "block";
        }
        span7.onclick = function() {
            modal7.style.display = "none";
        }

        var modal8 = document.getElementById("myModal8");
        var btn8 = document.getElementById("myBtn8");
        var span8 = document.getElementsByClassName("close8")[0];
        btn8.onclick = function() {
            modal8.style.display = "block";
        }
        span8.onclick = function() {
            modal8.style.display = "none";
        }

        var modal9 = document.getElementById("myModal9");
        var btn9 = document.getElementById("myBtn9");
        var span9 = document.getElementsByClassName("close9")[0];
        btn9.onclick = function() {
            modal9.style.display = "block";
        }
        span9.onclick = function() {
            modal9.style.display = "none";
        }

        var modal10 = document.getElementById("myModal10");
        var btn10 = document.getElementById("myBtn10");
        var span10 = document.getElementsByClassName("close10")[0];
        btn10.onclick = function() {
            modal10.style.display = "block";
        }
        span10.onclick = function() {
            modal10.style.display = "none";
        }

    </script>

</body>

</html>