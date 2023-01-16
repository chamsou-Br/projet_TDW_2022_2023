<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];

$newCtrl = new newsController();
$news = $newCtrl->getNewsController();
$recette = $newCtrl->getNewsRecetteController();
    $User->Entete_Page();
    ?>



    <body>
        <?php
        $User->Menu(1);
        $User->Diaporama($news);
        $User->TitleSection("check our", "new recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $User->cardsContainer($recette);
        ?>
        <script src="./views/script/hero.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    <?php
?>