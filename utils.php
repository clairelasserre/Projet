<html>
   

<?php


/* Liste les pages accessibles pour l'utilisateur*/

$page_list = array(
  array(
    "name"=>"Accueil",
    "title"=>"Accueil de notre site",
    "menutitle"=>"Accueil"),
  array(
    "name"=>"Offrir",
    "title"=>"Faîte une offre!",
    "menutitle"=>"Enregistrez votre offre"),
    array(
    "name"=>"PageInscription",
    "title"=>"Ne perdez plus de temps, inscrivez-vous!",
    "menutitle"=>"S'inscrre"),
    array(
    "name"=>"PageConnexion",
    "title"=>"Vous êtes déjà membres, connectez-vous!",
    "menutitle"=>"Se connecter"),
    array(
    "name"=>"NotreAction",
    "title"=>"Apprenez notre action",
    "menutitle"=>"Descriptif action"
    ),
    array(
    "name"=>"ListeOffres",
    "title"=> "Consulter les offers disponibles",
    "menutitle"=>"Liste des offres",
    ),
    array(
    "name"=>"ApresAvoirOffert",
    "title"=> "Merci pour votre offre!",
    "menutitle"=>"Offre enregistrée",   
    ),
    array(
    "name"=>"ApresSEtreInscrit",
    "title"=> "Vous êtes désormais inscrit!",
    "menutitle"=>"Membre enregistré",    
    )
   
);  





/* Fonction qui vérifie que la page demandée est accessible pour l'utilisateur, retourne true, si c'est le cas*/

function checkPage($askedPage){
    global $page_list;
    foreach($page_list as $page){
        if ($page["name"] == $askedPage){
            return true;            
        }
    }
    return false;
}



/*Donne le titre, à afficher, de la page demandée.*/
function getPageTitle($askedPage){
    global $page_list;
    foreach($page_list as $page){
        if ($page['name'] == $askedPage){
            return $page['title'];   
            }
        }        
}

function getPageMenuTitle($askedPage){
    global $page_list;
    foreach($page_list as $page){
        if ($page['name'] == $askedPage){
            return $page['menutitle'];   
            }
        }        
}






/* Génère les en-tête*/
    
function generateHeader($TitreDeLaPage, $FeuilleDeStyle){
echo <<<CHAINE_DE_FIN
    
      <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
      <meta name="author" content="Luc"/>
      <meta name="keywords" content="Mots clefs relatifs à cette page"/>
      <meta name="description" content="Descriptif court"/>
      <title>$TitreDeLaPage</title>
      <link href=$FeuilleDeStyle rel="stylesheet" type="text/css"/>
        
      <link href="css/bootstrap.css" rel="stylesheet">  
  
            
CHAINE_DE_FIN;
          

}


/*Génère les footer*/

function generateFooter(){
echo <<<CHAINE_DE_FIN
    <script src="js/jquery.js"></script>        
    <script src="js/bootstrap.js"></script>
    
CHAINE_DE_FIN;
   
}



/*Genère le menu*/

function generateMenu($titre){
echo <<<CHAINE_DE_FIN
<nav class="navbar navbar-light bg-faded">
    <a class="navbar-brand" href="index.php?name=Accueil">PAS DE GASPIX</a>
    <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php?name=NotreAction">Notre action <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Les offres</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php?name=Offrir">Faire un don</a>
    </li>
    <li class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Mon profil
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Voir mon profil </a></li>
    <li><a href="#">Se déconnecter</a></li>
  </ul>
</li>



    
  </ul>
  
</nav>
            <div class="jumbotron">
                <h1>
CHAINE_DE_FIN;
                    echo $titre;
                echo'</h1>';
            echo'</div>';

}

?>


</html>
