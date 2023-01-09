<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/parametreModal.php';
class parametreController{

    public function getDiaporamaController(){
        $par = new parametreModal();
        $res = $par->getDiaporamaModal();
        return $res;
    }

}

?>