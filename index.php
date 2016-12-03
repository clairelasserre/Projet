start_session()

-->
<html>
    <head>        
    <link href="css/bootstrap.css" rel="stylesheet">  
    <link href="css/perso.css" rel="stylesheet">  

</head>
    <body>
    
    <?php

    session_name("TestTD4" );
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
    // Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
     print_r($_SESSION);

    /*require ("Utilisateurs.php");
    require ("Offrir.php");
    
    echo "Votre plat s appelle ". $_POST['Titre'].", son aliment principal est ". $_POST['Ali'].", c'esr pour". $_POST['quantite']." personnes; on peut le consommer jusqu'à ".$_POST['date'];
        
    */
    ?>
          <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
</html>
