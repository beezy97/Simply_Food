<?php
session_start();
$user = 'root';
$pass = 'Toinon31';

$bdd = new PDO('mysql:host=localhost;dbname=simply_food;', $user, $pass);

if(isset($_GET['utilisateur_id']) AND !empty($_GET['utilisateur_id'])){
    $getid = $_GET['utilisateur_id'];
    $recupAllUser = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_id= ?');
    $recupAllUser->execute(array($getid));
    if($recupAllUser->rowCount() > 0){

        $bannirUser = $bdd->prepare('DELETE FROM utilisateur WHERE utilisateur_id= ?');
        $bannirUser->execute(array($getid));

        header('Location: admin.php');

    }else{
        echo "Aucun membre n'a été trouvé.";
    }
}else{
    echo "L'identifiant n'a pas pu être récupéré.";
}

?>