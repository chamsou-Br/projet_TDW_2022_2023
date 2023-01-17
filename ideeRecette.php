<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];


$recetteController = new recetteController();
if (isset($_POST["submit"])) {
    $values = $recetteController->getrecetteIdeeController();
} else {
    $values = $recetteController->getAllRecetteController();
}
$categorie = $recetteController->getAllCategoriesController();
$fetes = $recetteController->getAllFeteController();
$catgFilter = ["All"];
$feteFilter = ["All"];
foreach($categorie as $cat) {
array_push($catgFilter, $cat["nom"]);
}
foreach ($fetes as $fete) {
array_push($feteFilter, $fete["nom"]);
}



$User->Entete_Page();
?>

    <body>
        <?php
        $User->header();
        $User->HeaderImage("assets/slide/slide-2.jpg", "Chercher Recettes avec", "Delcious");
        $User->Menu(2);
        $User->TitleSection("check our", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $User->inputAutoComplete();
        $User->FilterButtons($feteFilter,0,"fete");
        $User->FilterButtons($catgFilter,0,"categorie");
        ?>
        <div style="margin-left: -115px;">
        <?php
        $Admin->TrieButtons(["temp prep","temp repos",'temp cuiss','temp total',"notation","calories"]);
        ?>
        </div>
        <?php
        $User->cardsContainer($values)

        ?>
        <script src="./views/script/hero.js"></script>
        <script src="./views/script/ideeRecette.js"></script>
        <script src="./views/script/autoComplete.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
<?php
?>