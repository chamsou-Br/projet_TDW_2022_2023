<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();

$userView = new userView();
        $recetteCtrl = new recetteController();

        if (isset($_GET['idRecetteSupp'])) {
        $recetteCtrl->deleteRecetteController($_GET['idRecetteSupp']);
      header("Location:./gestionRecette");
        }
        if (isset($_GET['idRecetteValide'])) {
          $recetteCtrl->valideRecetteController($_GET['idRecetteValide']);    
          header("Location:./gestionRecette"); 
        }
        if (isset($_GET['idRecetteBloque'])) {
          $recetteCtrl->bloquerRecetteController($_GET['idRecetteBloque']);     
          header("Location:./gestionRecette");
        }
        if (isset($_POST["ajouter-recette"]) && isset($_POST['ingredient']) && isset($_POST["instruction"])) {
          $recetteCtrl->addRecette();
        }
        // get recette info for table
        $recs = [];
        if (isset($_POST["searchSubmit"])){
         $recs = $recetteCtrl->getSearchRecetteController($_POST["search"]);
        }else {
          $recs = $recetteCtrl->getAllRecetteController();
        }
        $categorie = $recetteCtrl->getAllCategoriesController();
          $fetes = $recetteCtrl->getAllFeteController();
          $catgFilter = ["All"];
          $feteFilter = ["All"];
          foreach($categorie as $cat) {
          array_push($catgFilter, $cat["nom"]);
          }
          foreach ($fetes as $fete) {
        array_push($feteFilter, $fete["nom"]);
          }
            $Admin->Entete_Page();
        ?>        
        <body style="overflow-x: hidden;">
            <?php
                $Admin->Menu(2);
                $userView->TitleSection("Gestion de", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
                $userView->FilterButtons($feteFilter,0,"fete");
                $userView->FilterButtons($catgFilter,0,"categorie");
                $Admin->SearchBar("search recette");
                $Admin->TrieButtons(["temp prep","temp repos",'temp cuiss','temp total',"calories"]);
                $Admin->table(["recette","utilisateur","categorie","fete","temp prep","temp repo",'temp cuiss','temp total','calories',"états","modifier" , "supprimer"],1,$recs);
                $Admin->formRecette(count($recs),"admin",false,"ajouter Recette");
          ?>
            <script src="./views/script/autoComplete.js"></script>
            <script src="./views/script/filterGestionRecette.js"></script>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
?>
