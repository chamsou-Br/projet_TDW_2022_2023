<?php 
class recetteModal {

    private $username;
    private $password;
    private $host;
    private $databasename;
    public function __construct()
    {
        $this->username = "root";
        $this->password = "";
        $this->databasename = "projtest2";
    }

    public function Connexion()
    {
        try {
            ini_set('mssql.charset', 'UTF-8');
            $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->databasename . ';', $this->username, $this->password);
        } catch (PDOException $th) {
            printf("erreur de connexion à la base de donnée", $th->getMessage());
            exit();
        }
        return $db;
    }

    private function Deconexion(&$db){
        $db = null;
    }

    public function getAllRecetteModal(){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM recette JOIN image ON recette.idRecette = image.idRecette");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getRecetteByIdModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM recette JOIN image ON recette.idRecette = image.idRecette where recette.idRecette = :id");
        $_REQUEST->bindParam("id",$id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

  public function addRecetteModal($idUser,$nom,$descr,$tempsPréparation,$tempsReposint,$tempsCuisson,$idCategorie,$idFete) {
    $db = $this->Connexion();
    $_REQUEST = $db->prepare(" INSERT INTO recette ( `idUser`, `nom`, `descr` , `tempsPréparation`, `tempsReposint`, `tempsCuisson`, `idCategorie`, `idFete`) VALUE (:idUser, :nom ,  :descr , :tempsPréparation, :tempsCuisson, :tempsReposint, :idCategorie, :idFete)");
    $_REQUEST->bindParam("idUser",$idUser);
    $_REQUEST->bindParam("nom",$nom);
    $_REQUEST->bindParam("descr",$descr);
    $_REQUEST->bindParam("tempsPréparation",$tempsPréparation);
    $_REQUEST->bindParam("tempsReposint",$tempsReposint);
    $_REQUEST->bindParam("tempsCuisson",$tempsCuisson);
    $_REQUEST->bindParam("idCategorie",$idCategorie);
    $_REQUEST->bindParam("idFete",$idFete);
    $_REQUEST->execute();
    $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    $this->Deconexion($db);
    return $res;   
  }

  public function getRecetteByCategorieModal($categorie) {
    $db = $this->Connexion();
    $_REQUEST = $db->prepare("SELECT * FROM recette JOIN image ON recette.idRecette = image.idRecette where recette.idCategorie = :categorie");
    $_REQUEST->bindParam("categorie",$categorie);
    $_REQUEST->execute();
    $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    $this->Deconexion($db);
    return $res;
  }

  public function getRecetteByFeteModal($fete) {
    $db = $this->Connexion();
    $_REQUEST = $db->prepare("SELECT * FROM recette JOIN image ON recette.idRecette = image.idRecette where recette.idFete = :fete");
    $_REQUEST->bindParam("fete",$fete);
    $_REQUEST->execute();
    $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    $this->Deconexion($db);
    return $res;
  }
  public function getInstuctionRecetteModal($id){
    $db = $this->Connexion();
    $_REQUEST = $db->prepare("SELECT *  FROM etape  where idRecette = :id");
    $_REQUEST->bindParam("id",$id);
    $_REQUEST->execute();
    $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    $this->Deconexion($db);
    return $res;
}




    
}
?>