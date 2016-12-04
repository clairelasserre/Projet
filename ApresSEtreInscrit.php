<html>
    
    <?php
        
        
        require ("ClassesAssocieesBDD/Database.php");
        require ("ClassesAssocieesBDD/Utilisateurs.php");

        $dbh = Database::connect();
  
        
        if (Utilisateurs::getUtilisateur($dbh, $_POST['login']) != NULL) { /* Cherche si le login a déjà été utilisé ; si oui, il faut en trouver un autre*/    
            
            echo'ce login est déjà choisi, veuillez en trouver un autre';
            echo "<button type='button' class='btn btn-success' style='text-align: center; font-size: 1.5em'><a href='index.php?name=PageInscription'>Retournez à la page d inscription</a></button>";

        }
        
        if (Utilisateurs::emailExisted($dbh,$_POST['email'])){
 
            echo'ce mail est déjà utilisé, veuillez en indiquer un autre';
            echo "<button type='button' class='btn btn-success' style='text-align: center; font-size: 1.5em'><a href='index.php?name=PageInscription'>Retournez à la page d inscription</a></button>";
        }
        
        if(isset($_POST['link'])){
            if (Utilisateurs::profilFbExisted($dbh,$_POST['link'])){
            
                echo'ce profil facebook est déjà utilisé, veuillez en indiquer un autre';
                echo "<button type='button' class='btn btn-success' style='text-align: center; font-size: 1.5em'><a href='index.php?name=PageInscription'>Retournez à la page d inscription</a></button>";
            
            }

            else{
                Utilisateurs::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['prenom'],  $_POST['nom'], $_POST['email'], $_POST['link']) ;   
            
            }        
        } 
            
        Utilisateurs::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['prenom'],  $_POST['nom'], $_POST['email'], null) ;   
            
        echo 'Bravo, votre compte a été enregistré avec succès!';
        
        $dbh = null;
        
        
    ?>

    
    <br></br>
    
    <button type="button" class="btn btn-success" style="text-align: center; font-size: 1.5em"><a href="index.php?name=Offrir">Offrez dès maintenant!!</a></button>
    
    <h2>Ou bien...</h2>

    <br></br>
    
    <button type="button" class="btn btn-success" style="text-align: center; font-size: 1.5em"><a href="index.php?name=ListeOffres">Trouver un repas près de chez vous!</a></button>   


