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
    public function uploadPicture(){
        $target_dir = "assets/upload/";
        $target_file = $target_dir.basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ".htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
          }
        return $target_dir.htmlspecialchars(basename($_FILES["image"]["name"]));
    }

    public function addNewsController(){
        $newsModal = new newsModal();

        $res = $newsModal->addNewsModal($_POST["title"] ??  "", $_POST["descr"] ?? "", $this->uploadPicture(), isset($_POST["recette"]) ? $_POST["recette"] : NULL);
        return $res;
    }
    public function deleteNewsController($id){
        $newsModal = new newsModal();
        $res = $newsModal->deleteNewsModal($id);
        return $res;
    }

    
}
?>