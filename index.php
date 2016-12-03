
<html>
<!-- données spécifiques au référencement de la page ainsi que l'encodage utilisé -->

<head>        
    <?php
    if (isset($_GET['name'])){
        $askedPage = $_GET['name'];
    }
    else{
        $askedPage = "Accueil";
    }
    
    /* authorized est true si la page demandée est accessible*/
    require("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/utils.php");

    $authorized = checkPage($askedPage);
    
    
    /* pageTitle contient le titre de la page qui apparaîtra en haut de page. pageMenuTitle contient le "title" présent dans le header*/

    if ($authorized){
        $pageTitle = getPageTitle($askedPage);
        $pageMenuTitle = getPageMenuTitle($askedPage);
        
    }
    else{
        $pageTitle = 'Erreur';
        $pageMenuTitle = 'Accueil';
    }
    
    
    
    
    generateHeader($pageMenuTitle,"css/perso.css");
    ?>

</head>


<!-- Ici, on va coder le menu, c'est à dire la partie du site que l'on voit sur toute les pages -->

<body>
     <body>
       
        
         
        <div class="container">
 
            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php?name=Accueil">Accueil</a></li>
                            <li class="active"><a href="index.php?name=Offrir">Offir un repas</a></li>
                            <li><a href="index.php?name=PageInscription">S'inscrire</a></li>
                            <li><a href="index.php?name=PageConnexion">Se connecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
 
            <div class="jumbotron">
                <h1><?php
                echo $pageTitle;
                    ?>
                </h1>
                <p>Détails supplémentaires qui ne dépendent pas de la page</p>
            </div>
            
            
            
            
            <!-- Ici, on fera des appels aux différentes pages Web -->

            
            
            <div id="content">
                
                <?php
                require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/".$askedPage.".php");
                ?>
            </div>
 
            <div id="footer">
                <p>Site réalisé en Modal par…</p>
            </div>
 
        </div>
</body>    


<?php
generateFooter();
?>
</html>
