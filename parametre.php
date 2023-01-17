<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');
require_once('./controllers/authController.php');
require_once('./controllers/parametreController.php');

        $User = new userView();
        $Admin = new adminstrationView();
        $auth = new AuthController();
        $pars = new parametreController();
        if (isset($_POST['diapoSubmit'])) {
            $pars->addDiaporamaController($_POST["recette"] , $_POST["news"]);
        }
        if (isset($_POST['seilmodifier'])) {
            $pars->ubdateSeilIdeeRecetteController($_POST["seilIngredient"]);
        }   
        if (isset($_GET["idDiapoSupp"])) {
            $pars->deleteDiaporamaController($_GET["idDiapoSupp"]);
            header("Location:./parametre");
        }
        $params = $pars->getParamatreController()[0];
        $diapos = $pars->getDiaporamaController();
        $news = $pars->getDiaporamaNewsController();
        $userView = new userView();
        $recetteCtrl = new recetteController();
        if (isset($_POST["ajouter-recette"]) && isset($_POST['ingredient']) && isset($_POST["instruction"])) {
          $recetteCtrl->addRecette();
        }

            $Admin->Entete_Page();
        ?>        
        <body>
            <?php
                $Admin->Menu(5);
                $userView->TitleSection("Modifier", "parametre", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
            $Admin->table(["Diaporama", "Recette", 'News', "Supprimer"], 4, array_merge($diapos,$news));
                $Admin->formDiapo();
            $Admin->formSeil($params);
          ?>
          <br /><br />
            <script src="./views/script/autoComplete.js"></script>
            <script src="./views/script/filterGestionRecette.js"></script>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php

?>
