
<html>
<head>        
    <link href="css/bootstrap.css" rel="stylesheet">  
    <link href="css/perso.css" rel="stylesheet">  

</head>

  
    <h1>Inscris-toi!</h1> 
    
    <form action="PageInscription.php" method="post">
    <div class="row">
        <div class="col-md-2 gris titre">login</div>
        <div class="col-md-2 gris titre"><input type="text" name="login" required/></div>
    </div>

<div class="row">
        <div class="col-md-2 gris titre">mdp</div>
        <div class="col-md-2 gris titre"><input type="password" name="mdp" required/></div>
</div>   

<div class="row">
        <div class="col-md-2 gris titre">prénom</div>
        <div class="col-md-2 gris titre"><input type="text" name="prenom" required/></div>
</div>    

<div class="row">
        <div class="col-md-2 gris titre">nom</div>
        <div class="col-md-2 gris titre"><input type="text" name="nom" required/></div>
</div>
    
<div class="row">
        <div class="col-md-2 gris titre">email</div>
        <div class="col-md-2 gris titre"><input type="email" name="email" required/></div>
    </div>
    
<div class="row">
        <div class="col-md-2 gris titre">Rentre le lien de ton profil fb (si tu veux)!</div>
        <div class="col-md-2 gris titre"><input type="url" name="link" /></div>
</div>
    <input type="submit" value="Valider" />
    
</p>
</form>
    
    <?php
        
        if(isset($_POST['login']) && $_POST['mdp']!='' && $_POST['prenom']!='' && $_POST['nom']!='' && $_POST['email']!=''){
        
        require ("Database.php");
        require ("Utilisateurs.php");
        require ("AlimentsExistant.php");

        $dbh = Database::connect();

        

        
        Utilisateurs::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['prenom'],  $_POST['nom'], $_POST['email'], $_POST['link']) ;   
        
        $dbh = null;
        }
        
        ?>
 
   
   
   ?>
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>    
    
</html>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

