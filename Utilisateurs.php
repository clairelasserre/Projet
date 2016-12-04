
<?php
    
Class Utilisateurs{
        
    
    public $Pseudo;
    public $mdp;
    public $Prenom;
    public $Nom;
    public $email;
    public $ProfilFb;
    public $Rate;
    public $nombreDeNotation;
            
            
/* Cette fonction retourne les données d'inscription d'un utilisateur, s'il est présent dans la base de données*/
                        
    public static function getUtilisateur($dbh, $log) {
        
        
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

/* retourne vrai si l'email est existant dans la base de données et faux sinon*/
    
    public static function emailExisted($dbh,$mail){
        $query = "SELECT * FROM Utilisateurs WHERE email = ?";
        $sth = $dbh->prepare($query);
        $sth->closeCursor();

        return $sth->execute(array($mail));
    }



/* retourne vrai si le profil fb est existant dans la base de données et faux sinon*/
    
    public static function profilFbExisted($dbh,$Fb){
        $query = "SELECT * FROM Utilisateurs WHERE ProfilFb = ?";
        $sth = $dbh->prepare($query);
        $sth->closeCursor();
        
        return $sth->execute(array($Fb));
    }
    
    


/* Teste si le mdp soumis correspond au loign de l'utilisateur*/    
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
    
    
/* Fonction qui permet d'insérer un Utilisateur dans notre bdd   */    
    public static function insererUtilisateur($dbh, $Pseudo, $mdp, $Prenom, $Nom, $email, $ProfilFb) {

            $sth = $dbh->prepare("INSERT INTO Utilisateurs VALUES(?,SHA1(?),?,?,?,?,NULL,0)");
            $sth->execute(array($Pseudo, $mdp, $Prenom, $Nom, $email, $ProfilFb));
            return true; 
        }

    

/* Fonction qui permet de modifier le rate d'un utilisateur */

    public static function modiferRate($dbh,$notation,$log){
        $user = getUtilisateur($dbh, $log);
        $query = "UPDATE `Utilisateurs` SET Rate=?, nombreDeNotation=? WHERE Pseudo=?";
        $sth = $dbh->prepare($query);
        $rate = $user->Rate;
        $nbDeNotation = $user->nombreDeNotation;
        if($rate == null){
            $sth->execute(array($notation, 1, $log));
        }
        else{
            $nouveauRate = ($rate*$nbDeNotation + $notation)/($nbDeNotation+1);
            $sth->execute(array($nouveauRate, $nbDeNotation+1, $log));
        }
    }

}    
?>

    
