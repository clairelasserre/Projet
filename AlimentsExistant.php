<?php

Class AlimentsExistant {
    public $id;
    public $Aliment;


/* Une petite fonction qui permet de faire apparaître un scroll pour parcourir tous les aliments disponibles*/    
    public static function scrollAliment($dbh){
        
    echo'<select name = "Ali" required>'.PHP_EOL;

    $sth = $dbh->prepare("SELECT * FROM AlimentsExistant ORDER BY Aliment ASC");
    $sth->setFetchMode(PDO::FETCH_CLASS, 'AlimentsExistant');

    $sth->execute();
    $Aliments = $sth->fetchAll();
    foreach ($Aliments as $Al){
        echo'<option value = "'.$Al->Aliment.'">'.$Al->Aliment.'</option>'.PHP_EOL;
    }   

    echo'</select>'.PHP_EOL;
    
    }

    


}    
    
?>



