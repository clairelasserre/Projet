<?php
require ("ClassesAssocieesBDD/Database.php");
require ("ClassesAssocieesBDD/Utilisateurs.php");
require ('logInOut.php');
/* A Compléter*/

function printLoginFrom(){
    echo'<h1>Connectez-vous</h1>';
    echo'<form action="PageConnexion.php" method="get">';
    echo'<div class="row">';
        echo'<div class="col-md-2 gris titre">login</div>';
        echo'<div class="col-md-2 gris titre"><input type="text" name="login" required/></div>';
    echo'</div>';

    echo'<div class="row">';
        echo'<div class="col-md-2 gris titre">mdp</div>';
        echo'<div class="col-md-2 gris titre"><input type="password" name="mdp" required/></div>';
    echo'</div>';  
    echo'</from>';
    echo'<input type="submit" value="Valider" />';
}

$dbh = Database::connect();

if (!(isset($_GET['login']) && isset($_GET['mdp']))){
    printLoginFrom();
}

else{
    logIn($dbh);
}

$dbh = null;



?>


</html>
