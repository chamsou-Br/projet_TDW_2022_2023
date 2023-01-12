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
    public function addDiaporamaModal($idRecette,$idNews){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("INSERT INTO  `diaporama` (`idRecette`,`idNews`) VALUES ( :idRecette , :idNews) ");
        $_REQUEST->bindParam("idRecette", $idRecette);
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
    
    
    
}

?>