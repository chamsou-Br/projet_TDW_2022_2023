<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();

$userView = new userView();
        $recetteCtrl = new recetteController();
        $recs = $recetteCtrl->getAllRecetteController();
        if(!isset($_GET["id"])) {
            header('Location:./gestionNutrition');
        }
        if (isset($_POST["ajouter-recette"]) ) {
          $recetteCtrl->modifierRecette();
    header('location:./gestionRecette');
        }
            $Admin->Entete_Page();
        ?>        
        <body>
            <?php
                $Admin->Menu(2);
                $userView->TitleSection("Modifier", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
                $Admin->formRecette(count($recs),"user6@gmail.com",$_GET["id"] ?? false,"modifier Recette");
          ?>
            <script src="./views/script/autoComplete.js"></script>
            <script src="./views/script/filterGestionRecette.js"></script>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
?>

    