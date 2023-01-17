<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/parametreModal.php';
class parametreController{


    public function getDiaporamaController(){
        $par = new parametreModal();
        $res = $par->getDiaporamaModal();
        return $res;
    }

    public function getDiaporamaNewsController(){
        $par = new parametreModal();
        $res = $par->getDiaporamaNewsModal();
        return $res;
    }


    public function addDiaporamaController($idRecette,$idNews){
        $par = new parametreModal();
        $res = $par->addDiaporamaNewsModal($idNews);
        $res2 = $par->addDiaporamaRecetteModal($idRecette);
        return $res;
    }
    public function deleteDiaporamaController($id){
        $par = new parametreModal();
        $res = $par->deleteDiaporamaModal($id);
        return $res;
    }

    public function ubdateSeilIdeeRecetteController($seil){
        $par = new parametreModal();
        $res = $par->ubdateSeilIdeeRecette($seil);
        return $res;
    }
    public function getParamatreController(){
        $par = new parametreModal();
        $res = $par->getParametresModal();
        return $res;
    }



}

?>