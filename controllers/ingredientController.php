<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/ingredientModal.php';
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

    public function deleteIngredientController($id){
        $ingr = new ingredientModal();
        $res = $ingr->deleteIngredientModal($id);
        return $res;
    }

    public function addIngredientController(){
        $ingr = new ingredientModal();
        $res = $ingr->addIngredientModal($_POST["nom"],$_POST["desc"],$_POST["calorie"],$_POST["Healthy"] > 70 ? 1 : 0,$_POST["saison"],$_POST['vits'] ?? [] ,$_POST['mins'] ?? [] );
        return $res;
    }

    public function validIngredientController($id){
        $ingr = new ingredientModal();
        $res = $ingr->valideIngredientModal($id);
        return $res;
    }
    public function bloqueIngredientController($id){
        $ingr = new ingredientModal();
        $res = $ingr->bloqueIngredientModal($id);
        return $res;
    }
    public function modifierIngredientController($id){
        $ingr = new ingredientModal();
        $res = $ingr->modifierInredientModal($id,$_POST["desc"],$_POST["calorie"],$_POST["Healthy"] > 70 ? 1 : 0,$_POST["saison"],$_POST['vits'] ?? [] ,$_POST['mins'] ?? []  );
        return $res;
    }
}
?>