<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');
require_once('./controllers/authController.php');

$User = new userView();
$Admin = new adminstrationView();
$auth = new AuthController();

        $userView = new userView();
        $recetteCtrl = new recetteController();
        $isAuth = $auth->VerifyIfAuthDoneAlready_Controller();
        if ($isAuth == false) {
             header("Location:./connexion");
        }
        if (isset($_POST["ajouter-recette"]) && isset($_POST['ingredient']) && isset($_POST["instruction"])) {
          $recetteCtrl->addRecette();
        }
        $recs = $recetteCtrl->getAllRecetteController();
            $Admin->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->Menu(-1);
                $userView->TitleSection("Ajouter", "Recette", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
                $Admin->formRecette(count($recs),$isAuth[0]["email"]);
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
