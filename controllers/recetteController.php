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
        if (isset($_POST['addrecette'])) {
            $recetteModal = new recetteModal();
            $res = $recetteModal->addRecetteModal($_POST["idUser"],$_POST["nom"],$_POST["descr"],$_POST["tempsPréparation"],$_POST["tempsReposint"],$_POST["tempsCuisson"],$_POST["idCategorie"],$_POST["idFete"]);
            return $res;
        }

    }
}

?>