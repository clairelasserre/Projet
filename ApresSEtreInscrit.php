 <?php
        
        
    require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ClassesAssocieesBDD/Database.php");
    require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ClassesAssocieesBDD/Utilisateurs.php");

    $dbh = Database::connect();
  
        /*Cherche si le login a déjà été utilisé ; si oui, il faut en trouver un autre : on redirige vers la page d'échec d'inscription*/
    
        if (Utilisateurs::getUtilisateur($dbh, $_POST['login']) != NULL) {  
            $user =  Utilisateurs::getUtilisateur($dbh, $_POST['login']);
            echo $user->Prenom;
            echo'Ce login a déjà été choisi!';
            echo'<br></br>';
            require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ContenuDesPages/ApresSEtreInscritAvecEchec.php");
        }
        
        /*Cherche si le mail a déjà été utilisé ; si oui, il faut en trouver un autre : on redirige vers la page d'échec d'inscription*/
        elseif (Utilisateurs::emailExisted($dbh,$_POST['email'])!= NULL){
            echo'Ce mail a déjà été choisi!';
            echo'<br></br>';
            
            require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ContenuDesPages/ApresSEtreInscritAvecEchec.php");

        }
        
        
        
        /* Selon que l'utilisateur ait bien voulu rentrer son profil fb ou non */
        elseif ($_POST['link'] != NULL){
            /* Si une telle page fb a déjà été renseignée,il faut en trouver un autre : on redirige vers la page d'échec d'inscription*/ 
            if (Utilisateurs::profilFbExisted($dbh,$_POST['link']) != NULL){
                echo'Ce profil fb a déjà été choisi!';
                echo'<br></br>';
                require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ContenuDesPages/ApresSEtreInscritAvecEchec.php");

            
            }

            else{
            
            /* Sinon on inscrit l'utilisateur et on le redirige vers la page de succès de l'inscription */    
                Utilisateurs::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['prenom'],  $_POST['nom'], $_POST['email'], $_POST['link'], null, 0) ;   
                require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ContenuDesPages/ApresSEtreInscritAvecSucces.php");
                
            }        
        } 
        
        
        /*Si tous les identifiants conviennent, on ajoute l'utilisateur et on le redirige vers la page de succès de l'inscription */
        else{
            Utilisateurs::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['prenom'],  $_POST['nom'], $_POST['email'], null, null, 0) ; 
            require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ContenuDesPages/ApresSEtreInscritAvecSucces.php");
        
        }     
            
        

        
    $dbh = null;


