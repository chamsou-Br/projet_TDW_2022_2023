<?php

require_once('./modals/recetteModal.php');
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



}

?>