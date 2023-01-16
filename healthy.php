<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];

$recetteCtrl = new recetteController();
$values =  $recetteCtrl->getRecetteHealthyController();
    $User->Entete_Page();
    ?>
    <body>
        <?php
        $User->header();
        $User->HeaderImage("assets/slide/slide-2.jpg", "Bonne santé avec", "Delcious");
        $User->Menu(3);
        $User->TitleSection("check our", "Healthy Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $User->SearchBar("taper number de calories");
        $User->cardsContainer($values);
        ?>
        <script src="./views/script/hero.js"></script>
        <script src="./views/script/calories.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    <?php
?>