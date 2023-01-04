<?php 

require_once('./modals/ingredientModal.php');
class ingredientController {
    public function getAllIngredientsController(){
        $IngreModal = new ingredientModal();
        $res = $IngreModal->getAllIngredientsModal();
        return $res;
    }

    public function getIngredientByIdController($id) {
        $IngreModal = new ingredientModal();
        $res = $IngreModal->getIngredientByIdModal($id);
        return $res;   
    }

    public function getIngredientRecettController($id) {
        $IngreModal = new ingredientModal();
        $res = $IngreModal->getIngredintRecette($id);
        return $res;  
    }

    public function getVitaminsIngredientController($id){
        $ingredient = new ingredientModal();
        $res = $ingredient->getVitaminsIngredientModal($id);
        return $res;
    }

    public function getMinealsIngredientController($id){
        $ingredient = new ingredientModal();
        $res = $ingredient->getMinealsIngredientModal($id);
        return $res;
    }

    public function getVitaminsController(){
        $ingredient = new ingredientModal();
        $res = $ingredient->getVitaminsModal();
        return $res;
    }
    public function getMineralsController(){
        $ingredient = new ingredientModal();
        $res = $ingredient->getMineralsModal();
        return $res;
    }

    
}
?>