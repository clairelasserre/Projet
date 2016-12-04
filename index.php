<html>

    <head>        
        <?php
        if (isset($_GET['name'])) {
            $askedPage = $_GET['name'];
        } else {
            $askedPage = "Accueil";
        }

        /* authorized est true si la page demandée est accessible */
        require("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/Utilitaires/utils.php");

        $authorized = checkPage($askedPage);


        /* pageTitle contient le titre de la page qui apparaîtra en haut de page. pageMenuTitle contient le "title" présent dans le header */

        if ($authorized) {
            $pageTitle = getPageTitle($askedPage);
            $pageMenuTitle = getPageMenuTitle($askedPage);
        } else {
            $pageTitle = 'Erreur';
            $pageMenuTitle = 'Accueil';
        }




        generateHeader($pageMenuTitle, "css/perso.css");
        ?>

    </head>



    <body>
        
    <!-- Ici, on va coder le menu, c'est à dire la partie du site que l'on voit sur toute les pages -->

            <?php
            generateMenu($pageTitle);
            ?>
  



                <!-- Ici, on fera des appels aux différentes pages Web -->



                <div id="content">

<?php
/* La page demandée n'est ouverte que si elle fait parties des pages possibles! */
if ($authorized) {
    require ("/Applications/XAMPP/xamppfiles/htdocs/PasDeGaspX/ContenuDesPages/" . $askedPage . ".php");
} else {
    echo 'Erreur 404';
}
?>
                </div>
                <br></br>
                <br></br>
                <br></br>
               
                <div id="footer">
                    <p>Site réalisé en Modal par Luc&Claire</p>
                </div>

            </div>
    </body>    


<?php
generateFooter();
?>
</html>
