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

  public function addRecetteModal($idRecette,$idUser,$nom,$descr,$tprep,$tempsReposint,$tempsCuisson,$idCategorie,$idFete,$picture,$ingrs,$instrs,$ingrDesc) {
    $db = $this->Connexion();
    $_REQUEST_PICTURE = $db->prepare("INSERT INTO  `image` ( `path`, `idRecette` ) VALUES ( :pathimage , :idRecette)");
    $_REQUEST_PICTURE->bindParam("pathimage",$picture);
    $_REQUEST_PICTURE->bindParam("idRecette",$idRecette);
    $_REQUEST_PICTURE->execute();
    $_REQUEST = $db->prepare(" INSERT INTO recette ( `idRecette`,`idUser`, `nom`, `descr` , `tempsPreparation`, `tempsReposint`, `tempsCuisson`, `idCategorie`, `idFete`) VALUE (:idRecette, :idUser, :nom ,  :descr , :tprep, :tempsCuisson, :tempsReposint, :idCategorie, :idFete)");
    $_REQUEST->bindParam("idUser",$idUser);
    $_REQUEST->bindParam("idRecette",$idRecette);
    $_REQUEST->bindParam("nom",$nom);
    $_REQUEST->bindParam("descr",$descr);
    $_REQUEST->bindParam("tprep",$tprep);
    $_REQUEST->bindParam("tempsReposint",$tempsReposint);
    $_REQUEST->bindParam("tempsCuisson",$tempsCuisson);
    $_REQUEST->bindParam("idCategorie",$idCategorie);
    $_REQUEST->bindParam("idFete",$idFete);
    $_REQUEST->execute();
    $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    foreach($ingrs as $key => $ingr) {
      $_REQUEST_INGR = $db->prepare("INSERT INTO ingredient_recette (`idIngredient`,`idRecette` , `quan`) values (:idIngredient , :idRecette , :quan)");
      $_REQUEST_INGR->bindParam("idIngredient",$ingr);
      $_REQUEST_INGR->bindParam("idRecette",$idRecette);
      $_REQUEST_INGR->bindParam("quan",$ingrDesc[$key]);
      $_REQUEST_INGR->execute();
    }
    foreach($instrs as $key => $instr) {
      $_REQUEST_INSTR = $db->prepare("INSERT INTO etape values (:id  , :idRecette ,:instr)");
      $_REQUEST_INSTR->bindParam("id",$key);
      $_REQUEST_INSTR->bindParam("idRecette",$idRecette);
      $_REQUEST_INSTR->bindParam("instr",$instr);
      $_REQUEST_INSTR->execute();
    }
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

public function getAllCategorieModal(){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT *  FROM categorie ");
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}
public function getAllFeteModal(){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT *  FROM fetes ");
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}




    
}
?>