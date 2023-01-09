<?php 



require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/newsModal.php';
class newsController {
   
    public function getNewsController(){
        $newsModal = new newsModal();
        $res = $newsModal->getNewsModal();
        return $res;
    }
    public function getNewsRecetteController(){
        $newsModal = new newsModal();
        $res = $newsModal->getNewsRecetteModal();
        return $res;
    }

    public function addNewsController(){
        $newsModal = new newsModal();
        $res = $newsModal->addNewsModal($_POST["title"] ??  "", $_POST["descr"] ?? "kk", $_POST["img"] ?? "", isset($_POST["recette"]) ? $_POST["recette"] : NULL);
        return $res;
    }
    public function deleteNewsController($id){
        $newsModal = new newsModal();
        $res = $newsModal->deleteNewsModal($id);
        return $res;
    }

    
}
?>