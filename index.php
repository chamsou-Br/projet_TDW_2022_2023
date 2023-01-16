<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();



$User->Entete_Page();
$par = new parametreController();
$diapo = $par->getDiaporamaController();
?>
<body>
    <?php
    $User->header();
    $User->Hero($diapo);
    $User->Menu(0);

    $recetteController = new recetteController();
    $values0 = $recetteController->getRecetteByCategorieController(0);
    $values1 = $recetteController->getRecetteByCategorieController(1);
    $values2 = $recetteController->getRecetteByCategorieController(2);
    $values3 = $recetteController->getRecetteByCategorieController(3);
    $User->TitleSection("check our", "entrées", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    
    ?>

    <?php
    $User->seeAll("./categorie?id=0");
    $User->Carousel("id1", $values0);
    $User->TitleSection("check our", "plats", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    $User->seeAll("./categorie?id=1");
    $User->Carousel("id2", $values1);
    $User->TitleSection("check our", "desserts", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    $User->seeAll("./categorie?id=2");
    $User->Carousel("id3", $values2);
    $User->TitleSection("check our", "boissons", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    $User->seeAll("./categorie?id=3");
    $User->Carousel("id4", $values3);
    $User->Menu(0);
    $User->header();

    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>