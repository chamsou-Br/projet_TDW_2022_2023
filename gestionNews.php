<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();

$userView = new userView();
$Admin->Entete_Page();
$newsCtrl = new newsController();
if (isset($_POST["addNews"]) ) {
   $newsCtrl->addNewsController();
}
if (isset($_GET["idNewsSupp"])) {
$newsCtrl->deleteNewsController($_GET["idNewsSupp"]);
}
$news = $newsCtrl->getNewsController();
$recete = $newsCtrl->getNewsRecetteController();
?>        
<body>
    <?php
        $Admin->Menu(1);
        $userView->TitleSection("Add", "some news", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $Admin->table(["title","description","Recette",'supprimer'],3,array_merge($news,$recete));
        $Admin->formNews();

  ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>
