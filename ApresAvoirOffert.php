<html>
    <?php
        require ("ClassesAssocieesBDD/Database.php");
        require ("ClassesAssocieesBDD/Offres.php");
        require ("ClassesAssocieesBDD/AlimentsExistant.php");

        $dbh = Database::connect();
        
        /* Si le numéro de tel a été renseigné et la description du plat*/
        if(isset($_POST['NuméroDeTel']) && isset($_POST['DescriptionDuPlat'])){
            Offres::insererOffre($dbh, $_POST['Titre'], $_POST['quantite'], $_POST['Date'],$_POST['Adresse'],$_POST['CodePostal'],$_POST['NuméroDeTel'],$_POST['DescriptionDuPlat'],$_POST['Ali'],'','','','','','','','','');
        }
        
        /* Si le numéro de tel a été renseigné mais pas la description du plat*/
        if(isset($_POST['NuméroDeTel']) && !isset($_POST['DescriptionDuPlat'])){
            Offres::insererOffre($dbh, $_POST['Titre'], $_POST['quantite'], $_POST['Date'],$_POST['Adresse'],$_POST['CodePostal'],$_POST['NuméroDeTel'],'',$_POST['Ali'],'','','','','','','','','');
        }
        
        /* Si le description du plat a été renseignée mais pas le numéro de tel */
        if(isset($_POST['NuméroDeTel']) && isset($_POST['DescriptionDuPlat'])){
            Offres::insererOffre($dbh, $_POST['Titre'], $_POST['quantite'], $_POST['Date'],$_POST['Adresse'],$_POST['CodePostal'],null,$_POST['DescriptionDuPlat'],$_POST['Ali'],'','','','','','','','','');
        }            
        
        /* Si ni la description du plat a été renseignée ni le numéro de tel */
        if(isset($_POST['NuméroDeTel']) && isset($_POST['DescriptionDuPlat'])){
            Offres::insererOffre($dbh, $_POST['Titre'], $_POST['quantite'], $_POST['Date'],$_POST['Adresse'],$_POST['CodePostal'],null,'s',$_POST['Ali'],'','','','','','','','','');
        }
        $dbh = null;
?>
    <body>
        
        <h2>Votre offre a bien été enregistré. Vous aurez une notification, si quelqu'un la sélectionne</h2>
        <br></br>
        <h2>Vous pouvez la modifier/la retirer en consultant votre profil</h2>
        


