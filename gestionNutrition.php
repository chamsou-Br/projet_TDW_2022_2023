<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();

$userView = new userView();
        $ingredient = new ingredientController();
        if (isset($_GET['idIngredientSupp'])) {
        $ingredient->deleteIngredientController($_GET['idIngredientSupp']);  
        header("Location:./gestionNutrition");
        }
        if (isset($_GET["idIngrValid"])) {
          $ingredient->validIngredientController($_GET['idIngrValid']);
          header("Location:./gestionNutrition");
        }
        if (isset($_GET["idIngrBloque"])) {
          $ingredient->bloqueIngredientController($_GET['idIngrBloque']);
          header("Location:./gestionNutrition");
        }

        if (isset($_POST["ajouter_ingredient"])) {
          $ingredient->addIngredientController();
        }
        $ingrs = $ingredient->getAllIngredientsController();
        $Admin->Entete_Page();
        ?>        
        <body>
            <?php
                $Admin->Menu(4);
                $userView->TitleSection("Gestion de", "nutrition", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem."); 
                $Admin->SearchBar("search Ingredient");
                $Admin->TrieButtons(["nom","calories"]);
                $Admin->table(["ingredient","calorie","healthy","saison",'états','modifier','supprimer'],0,$ingrs);
                $Admin->formNurtition(false,"ajouter");

          ?>
            <script src="./views/script/hero.js"></script>
            <script src="./views/script/addVitsMins.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
?>
