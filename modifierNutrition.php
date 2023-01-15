<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();

$userView = new userView();
        $ingredient = new ingredientController();
        if(!isset($_GET["id"])) {
            header('Location:./gestionNutrition');
        }
        if (isset($_POST["ajouter_ingredient"])) {
            $ingredient->modifierIngredientController($_GET["id"]);
    header("Location:./gestionNutrition");
          }

        $Admin->Entete_Page();
        ?>        
        <body>
            <?php
                $Admin->Menu(4);
                $userView->TitleSection("Modifier", "nutrition", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
               $Admin->formNurtition($_GET["id"],"modifier");


          ?>
            <script src="./views/script/hero.js"></script>
            <script src="./views/script/addVitsMins.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
?>
