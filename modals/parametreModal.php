<?php 

class parametreModal{

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

    public function getDiaporamaModal (){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM diaporama join recette on recette.idRecette = diaporama.idRecette JOIN image ON recette.idRecette = image.idRecette ");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getDiaporamaNewsModal (){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM diaporama join news on news.idNews = diaporama.idNews ");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function addDiaporamaRecetteModal($idRecette){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("INSERT INTO  `diaporama` (`idRecette`) VALUES ( :idRecette ) ");
        $_REQUEST->bindParam("idRecette", $idRecette);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function addDiaporamaNewsModal($idNews){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("INSERT INTO  `diaporama` (`idNews`) VALUES ( :idNews) ");
        $_REQUEST->bindParam("idNews", $idNews);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function deleteDiaporamaModal ($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("DELETE FROM diaporama WHERE idDiaporama = :id");
        $_REQUEST->bindParam("id", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function ubdateSeilIdeeRecette($seilIdeeRecette) {
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("UPDATE parametre set seilIdeeRecette = :seilIdeeRecette WHERE idparametre = 1");
        $_REQUEST->bindParam("seilIdeeRecette", $seilIdeeRecette);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getParametresModal() {
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * from parametre");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }


    
    
    
}

?>