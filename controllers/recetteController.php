<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/recetteModal.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/ingredientModal.php';
class  recetteController{


    public function uploadPicture(){
        $target_dir = "assets/upload/";
        $target_file = $target_dir.basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ".htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
          }
        return $target_dir.htmlspecialchars(basename($_FILES["image"]["name"]));
    }

    
    public function getAllRecetteController() {
        $recetteModal = new recetteModal();
        $recettes =  $recetteModal->getAllRecetteModal();
        $ingrModal = new ingredientModal();
        $res = [];
        foreach($recettes as $key =>$rec ) {
            $ingrs = $ingrModal->getIngredintRecette($rec["idRecette"]);
            $i = 0;
            $c = 0;
            foreach( $ingrs as $ingr) {
                if ($ingr["Healthy"] == 1) {
                    $i = $i + 1;
                }
                $c = $c + $ingr["calories"];
            }
                $rec["Healthy"] = 1;
                $rec["calories"] = $c;
                array_push($res, $rec);
        }
        return $res;
    }

    public function getRecetteByIdController($id){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getRecetteByIdModal($id);
        return $res;
    }
    public function getRecetteByCategorieController($categorie){
        $recetteModal = new recetteModal();
        $recettes = $recetteModal->getRecetteByCategorieModal($categorie);
        $res = [];
        $res = $this->getCalories($recettes);
        $res = $this->GetSaison($res);
        return $res;
    }
    
    public function getRecetteByFeteController($fete){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getRecetteByFeteModal($fete);
        return $res;
    }

    
    public function getRecetteByUserController($user){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getRecetteByUserModal($user);
        return $res;
    }

    public function getInstructionsRecettesController($id){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getInstuctionRecetteModal($id);
        return $res;
    }

    

    public function addRecette() {
        if (isset($_POST['ajouter-recette'])) {
            $recetteModal = new recetteModal();
            $res = $recetteModal->addRecetteModal($_POST["idRecette"],$_POST["idUser"],$_POST["nom"],$_POST["descr"],$_POST["tprep"],$_POST["trepo"],$_POST["tcuis"],$_POST["categorie"],$_POST["fete"],$this->uploadPicture(),$_POST['ingredient'],$_POST["instruction"],$_POST['ingrDescr']);
            return $res;
        }
    }

    public function modifierRecette() {
        if (isset($_POST['ajouter-recette'])) {
            $recetteModal = new recetteModal();
            if ($_FILES["image"]["size"]> 0) {
                $image = $this->uploadPicture();
            }else {
                $image = false;
            }
            $res = $recetteModal->modifierRecetteModal($_POST["idRecette"],$_POST["idUser"],$_POST["nom"],$_POST["descr"],$_POST["tprep"],$_POST["trepo"],$_POST["tcuis"],$_POST["categorie"],$_POST["fete"],$image,$_POST['ingredient'] ?? [],$_POST["instruction"] ?? [],$_POST['ingrDescr'] ?? []);
            return $res;
        }
    }

    public function getAllCategoriesController(){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getAllCategorieModal();
        return $res;
    }

    public function getAllFeteController(){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getAllFeteModal();
        return $res;
    }
    public function getAllSaisonController(){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getAllSaisonModal();
        return $res;
    }


    public function deleteRecetteController($id){
        $recette = new recetteModal();
        $res = $recette->deleteRecetteModal($id);
        return $res;
    }
    public function valideRecetteController($id){
        $recette = new recetteModal();
        $res = $recette->valideRecetteModal($id);
        return $res;
    }
    public function bloquerRecetteController($id){
        $recette = new recetteModal();
        $res = $recette->bloquerRecetteModal($id);
        return $res;
    }

    public function getSearchRecetteController($search){
        $recette = new recetteModal();
        $recettes = $recette->getSearchRecetteModal($search);
        $res = [];
        $res = $this->getCalories($recettes);
        return $res;
    }

    public function getrecetteIdeeController(){
        $idee = $_POST["ingredient"] ? $_POST["ingredient"] : [];
        $res = [];
        $recetteModal = new recetteModal();
        $ingrModal = new ingredientModal();
        $recettes = $recetteModal->getAllRecetteModal();
        foreach($recettes as $key =>$rec ) {
            $ingrs = $ingrModal->getIngredintRecette($rec["idRecette"]);
            $i = 0;
            foreach( $ingrs as $ingr) {

                if (stripos(json_encode($idee),$ingr['nom']) !== false) {
                    $i = $i + 1;
                }
                // echo $ingr["nom"] . '| '.$i.' | '.$rec["idRecette"].'  '.$idee[0]."{{";
            }
            if ($i >= 0.7 * count($idee)){
                array_push($res, $rec);
            }


        }
        return $res; 
    }

    

    public function getrecetteSaisonController(){
        $res = [];
        $recetteModal = new recetteModal();
        $recettes = $recetteModal->getAllRecetteModal();
        $ingrModal = new ingredientModal();
        $res = [];
        foreach($recettes as $key =>$rec ) {
            $ingrs = $ingrModal->getIngredintRecette($rec["idRecette"]);
            $i = 0;
            $c = 0;
            foreach( $ingrs as $ingr) {
                if ($ingr["Healthy"] == 1) {
                    $i = $i + 1;
                }
                $c = $c + $ingr["calories"];
            }

            if ($i >= 0.7 * count($ingrs ) && $c > 0){
                $rec["Healthy"] = 1;
                $rec["calories"] = $c;
                array_push($res, $rec);
            }
        }
        $res = $this->GetSaison($res);
        return $res; 
    }

    public function getRecetteHealthyController(){
        $res = [];
        $recetteModal = new recetteModal();
        $ingrModal = new ingredientModal();
        $recettes = $recetteModal->getAllRecetteModal();
        foreach($recettes as $key =>$rec ) {
            $ingrs = $ingrModal->getIngredintRecette($rec["idRecette"]);
            $i = 0;
            $c = 0;
            foreach( $ingrs as $ingr) {
                if ($ingr["Healthy"] == 1) {
                    $i = $i + 1;
                }
                $c = $c + $ingr["calories"];
            }

            if ($i >= 0.7 * count($ingrs ) && $c > 0){
                $rec["Healthy"] = 1;
                $rec["calories"] = $c;
                array_push($res, $rec);
            }
        }
        return $res; 

    }

    public function addFavoriteRecetteControlle($idUser,$idRecette){
        $recetteModal = new recetteModal();
        $recetteModal->addFavoriteRecetteModal($idUser, $idRecette);
    }
    public function deleteFavoriteRecetteController($idUser,$idRecette){
        $recetteModal = new recetteModal();
        $recetteModal->deleteFavoriteRecetteModal($idUser, $idRecette);
    }

    public function getFavoriteRecetteController($id){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getFavoriteRecetteModal($id);
        return $res;
    }

    private function GetSaison($recettes){
        $ingrModal = new ingredientModal();
        $res = [];
        foreach($recettes as $key =>$rec ) {
            $ingrs = $ingrModal->getIngredintRecette($rec["idRecette"]);
            $ete = 0;
            $printemp = 0;
            $hiver = 0;
            $autumn = 0;
            foreach( $ingrs as $ingr) {
                switch ($ingr["saison"]) {
                    case "l'automne" : 
                        $autumn = $autumn + 1 ;
                        break ;
                    case "l'ete" : 
                        $ete = $ete + 1 ;
                        break ;
                    case "l'hiver" : 
                        $hiver = $hiver + 1 ;
                        break ;
                    case "le printemps" : 
                        $printemp = $printemp + 1 ;
                        break ;
                    default : 
                        break;
                }
            }
            $maxValue = max($ete,$hiver,$printemp,$autumn);
            switch ($maxValue) {
                case $ete : 
                    $rec["saison"] = "l'ete" ;
                    break ;
                case $autumn : 
                    $rec["saison"] = "l'automne" ;
                    break ;
                case $hiver: 
                    $rec["saison"] = "l'hiver" ;
                    break ;
                case $printemp : 
                    $rec["saison"] = "le printemps" ;
                    break ;
                default : 
                    break;
            }
            array_push($res,$rec);
        }
        return $res; 
    }

    private function getCalories($recettes){
        $ingrModal = new ingredientModal();
        $res = [];
        foreach($recettes as $key =>$rec ) {
            $ingrs = $ingrModal->getIngredintRecette($rec["idRecette"]);
            $i = 0;
            $c = 0;
            foreach( $ingrs as $ingr) {
                if ($ingr["Healthy"] == 1) {
                    $i = $i + 1;
                }
                $c = $c + $ingr["calories"];
            }

            if ($i >= 0.7 * count($ingrs ) && $c > 0){
                $rec["Healthy"] = 1;
            }
            $rec["calories"] = $c;
            array_push($res, $rec);
        }
        return $res; 
    }

    public function favoriserRecetteController($idUser,$idRecette){
        $recette = new recetteModal();
        $res = $recette->favoriseRecetteModal($idUser, $idRecette);
        return $res;
    }
    public function defavoriserRecetteController($idUser,$idRecette){
        $recette = new recetteModal();
        $res = $recette->defavoriserRecetteModal($idUser, $idRecette);
        return $res;
    }
    public function isFavoriserRecetteController($idUser,$idRecette){
        $recette = new recetteModal();
        $res = $recette->isFavoriserRecette($idUser, $idRecette);
        return $res;
    }


    public function noterRecetteController($idRecette,$idUser,$note){
        $recette = new recetteModal();
        $recette->getNoteRecette($idRecette, $note);
       $recette->noterRecetteModal( $idRecette,$idUser,$note);
    }

    public function updatenoteRecetteController($idRecette,$idUser,$note){
        $recette = new recetteModal();
        $recette->getNoteRecette($idRecette, $note);
       $recette->ubdateRecetteModal( $idRecette,$idUser,$note);
    }
    public function getNoteRecetteByUserController($idRecette,$idUser){
        $recette = new recetteModal();
        $res = $recette->getNoteRecetteByUser($idRecette,$idUser);
        return $res;
    }



}

?>