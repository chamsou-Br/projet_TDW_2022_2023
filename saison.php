<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];

$recetteCtrl = new recetteController();
$saisons = $recetteCtrl->getAllSaisonController();
$saisonFilter = ["All"];
foreach($saisons as $saison) {
    array_push($saisonFilter, $saison["nomSaison"]);
}
unset($saisonFilter[count($saisons) ]) ;
    $User->Entete_Page();

$values = $recetteCtrl->getrecetteSaisonController();
?>
    <body>
        <?php
        $User->header();
        $User->HeaderImage("assets/slide/slide-2.jpg", "Recettes natural avec", "Delcious");
        $User->Menu(4);
        $User->TitleSection("check our", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $User->FilterButtons($saisonFilter,0,"saison");
        $User->cardsContainer($values);
        ?>
        <script src="./views/script/hero.js"></script>
        <script src="./views/script/filterSaison.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    <?php
?>