<?php 

class newsModal{

    private $username;
    private $password;
    private $host;
    private $databasename;
    public function __construct()
    {
        $this->username = "root";
        $this->password = "";
        $this->databasename = "TDW";
    }

    public function Connexion()
    {
        try {
            $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->databasename . ';', $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $th) {
            printf("erreur de connexion à la base de donnée", $th->getMessage());
            exit();
        }
        return $db;
    }

    private function Deconexion(&$db){
        $db = null;
    }

    public function getNewsModal (){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM `news` WHERE idRecette IS NULL");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getNewsRecetteModal (){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT image.*,news.idNews,recette.*,categorie.nom as nomCategorie,categorie.idCategorie,fetes.idFete,utilisateur.email,fetes.nom as nomFete , utilisateur.nom as nomUser FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN categorie on recette.idCategorie = categorie.idCategorie JOIN fetes on recette.idFete = fetes.idFete INNER JOIN utilisateur on   recette.idUser = utilisateur.email join news on recette.idRecette = news.idRecette order by recette.nom");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function addNewsModal ($title,$descr,$img,$recette){
        $db = $this->Connexion();
        if (intval($recette) > 0) {
            $_REQUEST = $db->prepare("INSERT INTO news (`title`,`descr`,`img`,`idRecette`) values (:title,:descr,:img,:recette)");
            $_REQUEST->bindParam('recette',$recette);
        }else {
            $_REQUEST = $db->prepare("INSERT INTO news (`title`,`descr`,`img`) values (:title,:descr,:img)");
        }    
        $_REQUEST->bindParam('title', $title);
        $_REQUEST->bindParam('descr', $descr);
        $_REQUEST->bindParam('img', $img);

        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function deleteNewsModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("DELETE FROM news WHERE idNews = :id");
        $_REQUEST->bindParam("id", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    
}

?>