<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];


$recetteCtrl = new recetteController();
$authCtrl = new AuthController();
if(isset($_POST["logout"])) {
    $authCtrl->LogOut_Controller();
}
if(isset($_POST["save-profile"])){
    $authCtrl->updateUserController();
}
$is = $authCtrl->VerifyIfAuthDoneAlready_Controller();
if ($is != false) {
    $user = $is[0];
}else {
    header("Location:./connexion");
}
$recette = $recetteCtrl->getFavoriteRecetteController($user["email"]);
$recetteUser  =$recetteCtrl->getRecetteByUserController($user["email"]);

$User->Entete_Page();
?>
<body>
    <?php

    $User->Menu(-1);
    $User->ProfileUser($user);
    $User->TitleSection("Votre favorites", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    $User->cardsContainer($recette);
    $User->TitleSection("Votre", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
    $User->cardsContainer($recetteUser);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>