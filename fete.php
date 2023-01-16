<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];
$recetteController = new recetteController();
$values = $recetteController->getAllRecetteController();
$fetes = $recetteController->getAllFeteController();
$User->Entete_Page();
$feteFiter = [];
foreach ($fetes as $fete) {
    array_push($feteFiter, $fete["nom"]);
}
?>

    <body>
        <?php
        $User->header();
        $User->HeaderImage("assets/slide/slide-2.jpg", "Fetes avec", "Delcious");
        $User->Menu(5);
        $User->TitleSection("check our", "Fetes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $User->FilterButtons($feteFiter, 0,"fete");
        $User->cardsContainer($values);
        ?>
        <script src="./views/script/hero.js"></script>
        <script src="./views/script/filterFete.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    <?php
?>