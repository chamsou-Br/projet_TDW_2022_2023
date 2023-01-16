<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];


$id = $_GET["id"] ?? 0;
$recetteCtrl = new recetteController();
$catgrs = $recetteCtrl->getAllCategoriesController();
$recette = $recetteCtrl->getRecetteByCategorieController($id);
$saisons = $recetteCtrl->getAllSaisonController();
$saisonFilter = ["All"];
foreach($saisons as $saison) {
    array_push($saisonFilter, $saison["nomSaison"]);
}
unset($saisonFilter[count($saisons) ]) ;
$User->Entete_Page();
?>
<body>
    <?php
    $User->header();
    $User->HeaderImage("assets/slide/slide-2.jpg", $catgrs[$id]["nom"].' in', "Delcious");
    $User->Menu(-1);
    $User->TitleSection($catgrs[$id]["nom"] , " Recttes",  "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    $User->FilterButtons($saisonFilter,0,"saison");
    $User->TrieButtons(["temp prep","temp repos",'temp cuiss',"temp total",'notation',"calories"]);
    $User->cardsContainer($recette);
    ?>
    <script src="./views/script/filterSaison.js"></script>
    <script src="./views/script/categorieTri.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>