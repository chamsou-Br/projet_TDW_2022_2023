<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();



$User->Entete_Page();
$recette = new recetteController();
$ingredient = new ingredientController();
$auth = new AuthController();
$isAuth = $auth->VerifyIfAuthDoneAlready_Controller();
if(isset($_GET["id"])&& isset($_GET["idUser"]) && $isAuth != false) {
    if( intval($_GET["fav"]) == 1){
        header("location:./recette?id=".$_GET["id"]);
        $recette->defavoriserRecetteController($_GET["idUser"], $_GET["id"]);
    }else {
        header("location:./recette?id=".$_GET["id"]);
        $recette->favoriserRecetteController($_GET["idUser"], $_GET["id"]);
    }
}
if (isset($_GET["note"])  ) {
    if ($isAuth !=false) {
        $recette->noterRecetteController($_GET["id"], $isAuth[0]["email"], $_GET["note"]);
        header("location:./recette?id=".$_GET["id"]);
    }else {
        header("location:./connexion");
    }
}
if (isset($_GET["noteUbdate"])){
    $recette->updatenoteRecetteController($_GET["id"], $isAuth[0]["email"], $_GET["noteUbdate"]);
    header("location:./recette?id=".$_GET["id"]);
}
if ($isAuth != false ) {
    $isFav = $recette->isFavoriserRecetteController($isAuth[0]["email"], $_GET["id"] ?? 0);
    $note = $recette->getNoteRecetteByUserController($_GET['id'], $isAuth[0]["email"]);
}else {
    $isFav = 0;
    $note = [];
}            



$recetteDetails = $recette->getRecetteByIdController($_GET["id"] ?? 0);
$ingrs = $ingredient->getIngredientRecettController($_GET["id"] ?? 0);
$instrs = $recette->getInstructionsRecettesController($_GET["id"] ?? 0);
$isAuth = $auth->VerifyIfAuthDoneAlready_Controller();

?>
<body>
    <?php
    
    $User->header();
    $User->HeaderImage("assets/slide/slide-2.jpg", "preparation", "Recette");
    $User->Menu(-1);
    $User->DetaialsRecette($recetteDetails[0], $ingrs, $instrs ,$isAuth,$isFav,count($note)> 0 ? $note[0]["note"] :-1 );
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="./views/script/autoComplete2.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>