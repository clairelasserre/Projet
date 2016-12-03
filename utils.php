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

 


?>


</html>
