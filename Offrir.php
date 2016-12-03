

<html>
    
<head>        
    <link href="css/bootstrap.css" rel="stylesheet">  
    <link href="css/perso.css" rel="stylesheet">  

</head>     

    <h1>OFFRIR</h1> 

    <h2>Ce que je propose</h2>
    
        <h3> Caractéristiques de votre plat </h3>
        
    <form action="index.php" method="post">

    <div class="row">
        <div class="col-md-2 gris titre">Titre du plat</div>
        <div class="col-md-2 gris titre"><input type="text" name="Titre" required/></div>
    </div>
    
    <div class="row">
        <div class="col-md-2 gris titre">Jusqu'à quand peut-on consommer?</div>
        <div class="col-md-2 gris titre"><input type="date" name="date" required="C'est mieux de ne pas donner quelque chose de périmé"/></div>
    </div>
        
    <div class="row">
        <div class="col-md-2 gris titre">C'est pour combien de personnes?</div>
        <div class="col-md-2 gris titre">
            <select name = "quantite" required>
                <option value = '1'>1 personne</option>
                <option value = '2'>2 personnes</option>
                <option value = '3'>3 personnes</option>
                <option value = '4'>4 personnes</option>
                <option value = '5'>5 personnes</option>
                <option value = '6'>6 personnes</option>
                <option value = '7'>7 personnes</option>
                <option value = '8'>8 personnes</option>
                <option value = '9'>9 personnes</option>
                <option value = '10'>10 personnes</option>
            </select>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-2 gris titre">Quel est l'élément principal de votre plat?</div>
        <div class="col-md-2 gris titre">  
            <?php    
                require ("AlimentsExistant.php");
                require ("Database.php");
                $dbh = Database::connect();
                AlimentsExistant::scrollAliment($dbh);
                $dbh = null;
            ?>
        </div>
    </div>
    
        
    <div class="row">
        <div class="col-md-2 gris titre">Comment l'avez-vous cuisiné?</div>
        <div class="col-md-2 gris titre"><input type="text" name="DescriptionDuPlat" /></div>    
    </div>
    
        
        <h3>Lieu de la rencontre</h3>
        
    <div class="row">
        <div class="col-md-2 gris titre">Indiquer l'adresse de la rencontre</div>
        <div class="col-md-2 gris ">Rentrer votre adresse<input type="text" name="Adresse" required/></div>
        <div class="col-md-1 gris "></div>
        <div class="col-md-2 gris ">Rentrer votre code postal<input type="int" name="CodePostal" required/></div>    

    </div>
    
    <div class="row">
        <div class="col-md-2 gris titre">Envie de laisser votre numéro de téléphone?</div>
        <div class="col-md-2 gris titre"><input type="int" name="NumeroTel" /></div>    
    </div>
        
    <input type="submit" value="Valider" />
    `
    </form>
        
        
    
    

    
    
        

    
        



       <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
</html>