
<?php
    
Class Utilisateurs{
        
    
    public $Pseudo;
    public $mdp;
    public $Prenom;
    public $Nom;
    public $email;
    public $ProfilFb;
    public $rate;
            
            
            
            
    public static function getUtilisateur($dbh, $log) {
        
        /* Cette fonction retourne les données d'inscription d'un utilisateur, s'il est présent dans la base de données*/
        
        $query = "SELECT * FROM Utilisateurs WHERE Pseudo = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateurs');
        $request_succeeded = $sth->execute(array($log));
        if ($request_succeeded) {
            $user = $sth->fetch();
            $sth->closeCursor();
            return $user;
        } else {
            return NULL;
        }
    }
    
    public static function emailExisted($dbh,$mail){
        $query = "SELECT * FROM Utilisateurs WHERE email = ?";
        $sth = $dbh->prepare($query);
        $sth->closeCursor();

        return $sth->execute(array($mail));
        /* retourne vrai si l'email est existant dans la base de données et faux sinon*/
    }
    
    public static function profilFbExisted($dbh,$Fb){
        $query = "SELECT * FROM Utilisateurs WHERE ProfilFb = ?";
        $sth = $dbh->prepare($query);
        $sth->closeCursor();
        
        return $sth->execute(array($Fb));
        /* retourne vrai si le profil fb est existant dans la base de données et faux sinon*/
    }
    
    
    
    public static function testerMdp($dbh, $login, $mdp) {
        $query = "SELECT * FROM Utilisateurs WHERE Pseudo = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateurs');
        $sth->execute(array($login));
        $user = $sth->fetch();
        $sth->closeCursor();
        $motDePasse = $user->mdp;
        if($motDePasse==SHA1($mdp)){
            return true;
        }
        else{
            return false;
        }
    }
    
    
    
    public static function insererUtilisateur($dbh, $Pseudo, $mdp, $Prenom, $Nom, $email, $ProfilFb) {
        
        if (Utilisateurs::getUtilisateur($dbh, $Pseudo) != NULL) { /* Cherche si le login a déjà été utilisé ; si oui, il faut en trouver un autre*/    
            
            echo'ce login est déjà choisi, veuillez en trouver un autre';
            return; 
        
        if (Utilisateurs::emailExisted($dbh,$email)){
 
            echo'ce mail est déjà utilisé, veuillez en indiquer un autre';
            return;    
        }
        
        if (Utilisateurs::profilFbExisted($dbh,$ProfilFb)){
            
            echo'ce profil facebook est déjà utilisé, veuillez en indiquer un autre';
            return;
            
        }
                
        } else {
            $sth = $dbh->prepare("INSERT INTO Utilisateurs VALUES(?,SHA1(?),?,?,?,?,NULL)");
            $sth->execute(array($Pseudo, $mdp, $Prenom, $Nom, $email, $ProfilFb));       
        }
    }
    
    
    /*Utilisateurs::insererUtilisateur($dbh, jacki, lejacki, jacob, Leygonie, jacob.leygonie@polytechnique.edu, $ProfilFb)*/
    
    
    }
?>

    