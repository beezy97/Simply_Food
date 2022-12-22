<?php
session_start();


?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Food</title>
    <link rel="stylesheet" href="./../css/style-index.css">
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
                if (!isset($_SESSION['utilisateur_pseudo'])) {
                ?>
                    <a href="auth.php"><button>Se connecter</button></a>
                    <?php
                } else {
                    if ($_SESSION['utilisateur_role'] == 1) {
                    ?>
                        <a href="admin.php"><button>Admin</button></a>
                    <?php
                    } elseif ($_SESSION['utilisateur_role'] == 2) {
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
    <section>
        <article>
            <div class="top">
                <h1>Recette du Jour</h1>
            </div>
            <div class="bottom">
                <div class="box">
                    <h3>Recette du jour</h3>
                    <div class="box1">
                        <h4>Plat</h4>
                        <ul>
                            <li>Ingrédients 1</li>
                            <li>Ingrédients 2</li>
                            <li>Ingrédients 3</li>
                            <li>Ingrédients 4</li>
                            <li>Ingrédients 5</li>
                        </ul>
                    </div>
                </div>
            </div>
        </article>

        <aside>
            <article class="top">
                <div class="image">
                    <a href="plat.php">
                        <div class="carre"><img src="../img/food.jpg" class="fit" alt=""></div>
                    </a>
                    <a href="salades.php">
                        <div class="carre"><img src="../img/salad.jpg" class="fit" alt=""></div>
                    </a>
                    <a href="boissons.php">
                        <div class="carre"><img src="../img/drink.jpg" class="fit" alt=""></div>
                    </a>
                </div>
            </article>
            <article class="bottom">
                <article class="left">
                    <nav>
                        <ul>
                            <li>
                                Facebook
                                <span></span><span></span><span></span><span></span>
                            </li>
                            <li>
                                Instagram
                                <span></span><span></span><span></span><span></span>
                            </li>
                            <li>
                                Pinterest
                                <span></span><span></span><span></span><span></span>
                            </li>
                            <li>
                                Twitter
                                <span></span><span></span><span></span><span></span>
                            </li>
                        </ul>
                    </nav>
                </article>
                <article class="right">
                    <h1>+30</h1>
                    <h2>Recettes de cuisine</h2>
                    <h2>SIMPLY FOOD</h2>
                </article>
            </article>
        </aside>
    </section>
</body>

</html>