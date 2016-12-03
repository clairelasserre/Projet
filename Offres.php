<?php

Class Offres{
    
    public $Titre;
    public $Quantite;
    public $DateLimiteDeConsommation;
    public $AdresseDeLaRencontre;
    public $CodePostale;
    public $NuméroDeTel;
    public $CommentJeLaiCuisine;
    public $Aliment1;
    public $Aliment2;
    public $Aliment3;
    public $Aliment4;
    public $Aliment5;
    public $Aliment6;
    public $Aliment7;
    public $Aliment8;
    public $Aliment9;
    public $Aliment10;
    
    
    public static function insererOffre($dbh, $Titre, $Quantite, $DateLimiteDeConsommation,$AdresseDeLaRencontre,$CodePostale,$NuméroDeTel,$CommentJeLaiCuisine,$Aliment1,$Aliment2,$Aliment3,$Aliment4,$Aliment5,$Aliment6,$Aliment7,$Aliment8,$Aliment9,$Aliment10){
        /* Insérer une offre dans la base de données*/
        
        $query ="INSERT INTO Offres VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sth = $dbh->prepare($query);
        $sth->execute(array($Titre, $Quantite, $DateLimiteDeConsommation,$AdresseDeLaRencontre,$CodePostale,$NuméroDeTel,$CommentJeLaiCuisine,$Aliment1,$Aliment2,$Aliment3,$Aliment4,$Aliment5,$Aliment6,$Aliment7,$Aliment8,$Aliment9,$Aliment10));

            
    }
    
    
    
    
    /*public static function modifierOffre(){
        $sth = $dbh->prepare("UPADATE Offres SET")
        $sth->execute(array());
        $count = $sth->rowCount();
        echo 'Bravo, votre offre a été modifiée avec succés'
    }
     * 
     */

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.DateLimiteDeConsommation
 */

