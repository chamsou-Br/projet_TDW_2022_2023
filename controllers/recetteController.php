<?php

require_once('./modals/recetteModal.php');
require_once('./modals/ingredientModal.php');
class  recetteController{
    
    
    public function getAllRecetteController() {
        $recetteModal = new recetteModal();
        $res =  $recetteModal->getAllRecetteModal();
        return $res;
    }

    public function getRecetteByIdController($id){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getRecetteByIdModal($id);
        return $res;
    }
    public function getRecetteByCategorieController($categorie){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getRecetteByCategorieModal($categorie);
        return $res;
    }
    public function getRecetteByFeteController($fete){
        $recetteModal = new recetteModal();
        $res = $recetteModal->getRecetteByFeteModal($fete);
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
            $res = $recetteModal->addRecetteModal($_POST["idRecette"],$_POST["idUser"],$_POST["nom"],$_POST["descr"],$_POST["tprep"],$_POST["trepo"],$_POST["tcuis"],$_POST["categorie"],$_POST["fete"],$_POST["picture"],$_POST['ingredient'],$_POST["instruction"],$_POST['ingrDescr']);
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

    public function getSearchRecetteController($search){
        $recette = new recetteModal();
        $res = $recette->getSearchRecetteModal($search);
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
        $ingrModal = new ingredientModal();
        $recettes = $recetteModal->getAllRecetteModal();
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


}

?>