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
}
?>