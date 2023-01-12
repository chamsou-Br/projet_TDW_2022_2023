<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/parametreModal.php';
class parametreController{

    public function getDiaporamaController(){
        $par = new parametreModal();
        $res = $par->getDiaporamaModal();
        return $res;
    }

    public function addDiaporamaController($idRecette,$idNews){
        $par = new parametreModal();
        $res = $par->addDiaporamaModal($idRecette,$idNews);
        return $res;
    }
    public function deleteDiaporamaController($id){
        $par = new parametreModal();
        $res = $par->deleteDiaporamaModal($id);
        return $res;
    }


}

?>