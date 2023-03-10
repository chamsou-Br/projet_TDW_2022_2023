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
        $this->databasename = "TDW";
    }

    public function Connexion()
    {
        try {
            ini_set('mssql.charset', 'UTF-8');
            $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->databasename . ';', $this->username, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
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
        $_REQUEST = $db->prepare("SELECT image.*, recette.*,categorie.nom as nomCategorie,categorie.idCategorie,fetes.idFete,utilisateur.email,fetes.nom as nomFete , utilisateur.nom as nomUser FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN categorie on recette.idCategorie = categorie.idCategorie JOIN fetes on recette.idFete = fetes.idFete INNER JOIN utilisateur on   recette.idUser = utilisateur.email  order by recette.nom ");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getRecetteByIdModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT recette.*,image.*,utilisateur.nom as firstName,utilisateur.prenom as lastName FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN utilisateur on recette.idUser = utilisateur.email  where recette.idRecette = :id");
        $_REQUEST->bindParam("id",$id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function getRecetteByUserModal($idUser){
      $db = $this->Connexion();
      $_REQUEST = $db->prepare("SELECT image.*, recette.*,categorie.nom as nomCategorie,categorie.idCategorie,fetes.idFete,utilisateur.email,fetes.nom as nomFete , utilisateur.nom as nomUser FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN categorie on recette.idCategorie = categorie.idCategorie JOIN fetes on recette.idFete = fetes.idFete INNER JOIN utilisateur on   recette.idUser = utilisateur.email  where recette.idUser = :idUser");
      $_REQUEST->bindParam("idUser",$idUser);
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
    $_REQUEST = $db->prepare("SELECT image.*, recette.*,categorie.nom as nomCategorie,categorie.idCategorie,fetes.idFete,fetes.nom as nomFete  FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN categorie on recette.idCategorie = categorie.idCategorie JOIN fetes on recette.idFete = fetes.idFete  where recette.idCategorie = :categorie and valid = 1");
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

public function getAllSaisonModal(){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT *  FROM saison ");
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

public function deleteRecetteModal($id){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("DELETE FROM `recette` WHERE idRecette = :id");
  $_REQUEST->bindParam("id", $id);
  $_REQUEST->execute();
  $_REQUEST = $db->prepare("DELETE FROM `ingredient_recette` WHERE idRecette = :id");
  $_REQUEST->bindParam("id", $id);
  $_REQUEST->execute();
  $_REQUEST = $db->prepare("DELETE FROM `etape` WHERE idRecette = :id");
  $_REQUEST->bindParam("id", $id);
  $_REQUEST->execute();
  $_REQUEST = $db->prepare("DELETE FROM `image` WHERE idRecette = :id");
  $_REQUEST->bindParam("id", $id);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function valideRecetteModal($id){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("UPDATE recette SET valid = 1 where idRecette = :id");
  $_REQUEST->bindParam("id", $id);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function bloquerRecetteModal($id){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("UPDATE recette SET valid = 0 where idRecette = :id");
  $_REQUEST->bindParam("id", $id);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}


public function getSearchRecetteModal($search){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT  recette.*,categorie.nom as nomCategorie,categorie.idCategorie,fetes.idFete,utilisateur.email,fetes.nom as nomFete , utilisateur.nom as nomUser FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN categorie on recette.idCategorie = categorie.idCategorie JOIN fetes on recette.idFete = fetes.idFete INNER JOIN utilisateur on   recette.idUser = utilisateur.email where instr(recette.nom,:search) order by recette.nom ");
    $_REQUEST->bindParam("search", $search);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function addFavoriteRecetteModal($idUser , $idRecette){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("INSERT INTO recettefavoris values (:idUser ,:idRecette)");
  $_REQUEST->bindParam("idUser", $idUser);
  $_REQUEST->bindParam("idRecette", $idRecette);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}
public function deleteFavoriteRecetteModal($idUser , $idRecette){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("DELETE FROM recettefavoris WHERE idUser = :idUser AND idRecette = :idRecette");
  $_REQUEST->bindParam("idUser", $idUser);
  $_REQUEST->bindParam("idRecette", $idRecette);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function getFavoriteRecetteModal($id){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT image.*, recette.*,categorie.nom as nomCategorie,categorie.idCategorie,fetes.idFete,utilisateur.email,fetes.nom as nomFete , utilisateur.nom as nomUser FROM recette JOIN image ON recette.idRecette = image.idRecette JOIN categorie on recette.idCategorie = categorie.idCategorie JOIN fetes on recette.idFete = fetes.idFete INNER JOIN utilisateur on   recette.idUser = utilisateur.email JOIN recettefavoris on recette.idRecette = recettefavoris.idRecette WHERE recettefavoris.idUser = :idUser");
  $_REQUEST->bindParam("idUser", $id);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function favoriseRecetteModal($idUser , $idRecette){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("INSERT INTO recettefavoris values ( :idUser , :idRecette) ");
  $_REQUEST->bindParam("idUser", $idUser);
  $_REQUEST->bindParam("idRecette", $idRecette);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function defavoriserRecetteModal($idUser , $idRecette){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("DELETE FROM recettefavoris where  idUser = :idUser AND idRecette = :idRecette ");
  $_REQUEST->bindParam("idUser", $idUser);
  $_REQUEST->bindParam("idRecette", $idRecette);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function isFavoriserRecette($idUser,$idRecette){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT * FROM recettefavoris where  idUser = :idUser AND idRecette = :idRecette ");
  $_REQUEST->bindParam("idUser", $idUser);
  $_REQUEST->bindParam("idRecette", $idRecette);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
    if ($_REQUEST->rowCount() == 1) {
      $is = 1;
    }
    else {
      $is = 0;
    }
  $this->Deconexion($db);
  return $is;
}



public function modifierRecetteModal($idRecette,$idUser,$nom,$descr,$tprep,$tempsReposint,$tempsCuisson,$idCategorie,$idFete,$picture,$ingrs,$instrs,$ingrDesc){
  $db = $this->Connexion();
  if ($picture != false) {
    $_REQUEST_PICTURE = $db->prepare("UPDATE  `image` set `path` = :pathimage  where idRecette = :idRecette");
    $_REQUEST_PICTURE->bindParam("pathimage",$picture);
    $_REQUEST_PICTURE->bindParam("idRecette",$idRecette);
    $_REQUEST_PICTURE->execute();
  }
  $_REQUEST = $db->prepare("UPDATE recette SET nom = :nom , descr = :descr , tempsPreparation = :tempsPreparation , tempsReposint = :tempsReposint , tempsCuisson = :tempsCuisson , idCategorie = :idCategorie, idFete = :idFete where idRecette = :idRecette");
  $_REQUEST->bindParam("idRecette", $idRecette);
  $_REQUEST->bindParam("nom", $nom);
  $_REQUEST->bindParam("descr", $descr);
  $_REQUEST->bindParam("tempsPreparation", $tprep);
  $_REQUEST->bindParam("tempsReposint", $tempsReposint);
  $_REQUEST->bindParam("tempsCuisson", $tempsCuisson);
  $_REQUEST->bindParam("idCategorie", $idCategorie);
  $_REQUEST->bindParam("idFete", $idFete);
  $_REQUEST->execute();
  $_REQUEST1 = $db->prepare("DELETE FROM ingredient_recette where idRecette = :idRecette");
  $_REQUEST1->bindParam("idRecette", $idRecette);
  $_REQUEST1->execute();
  $_REQUEST2 = $db->prepare("DELETE FROM etape where idRecette = :idRecette");
  $_REQUEST2->bindParam("idRecette", $idRecette);
  $_REQUEST2->execute();
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

  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}

public function noterRecetteModal($idRecette,$idUser,$note){
  $db = $this->Connexion();
  $_REQUEST_INSTR = $db->prepare("INSERT INTO notation (`idRecette`,`idUser`,`note`) values (:idRecette  , :idUser ,:note)");
  $_REQUEST_INSTR->bindParam("idRecette",$idRecette);
  $_REQUEST_INSTR->bindParam("idUser",$idUser);
  $_REQUEST_INSTR->bindParam("note",$note);
  $_REQUEST_INSTR->execute();
  $this->Deconexion($db);

}

public function ubdateRecetteModal($idRecette,$idUser,$note){
  $db = $this->Connexion();
  $_REQUEST_INSTR = $db->prepare("UPDATE notation set note = :note where idRecette = :idRecette  and idUser = :idUser ");
  $_REQUEST_INSTR->bindParam("idRecette",$idRecette);
  $_REQUEST_INSTR->bindParam("idUser",$idUser);
  $_REQUEST_INSTR->bindParam("note",$note);
  $_REQUEST_INSTR->execute();
  $this->Deconexion($db);

}

public function getNoteRecetteByUser($idRecette , $idUser){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT * from notation where idRecette = :idRecette  and idUser = :idUser");
  $_REQUEST->bindParam("idRecette",$idRecette);
  $_REQUEST->bindParam("idUser",$idUser);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $this->Deconexion($db);
  return $res;
}
public function getNoteRecette($idRecette,$note){
  $db = $this->Connexion();
  $_REQUEST = $db->prepare("SELECT * from notation where idRecette = :idRecette  ");
  $_REQUEST->bindParam("idRecette",$idRecette);
  $_REQUEST->execute();
  $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
  $resultat = $note;
    echo (count($res));
  foreach($res as $rec) {
      $resultat = $resultat + $rec["note"];
      echo $rec["note"];
      
  }
  $resultat = $resultat / (count($res) + 1);
  $_REQUEST_NOTE = $db->prepare("UPDATE recette set notation = :notation where idRecette = :idRecette");
  $_REQUEST_NOTE->bindParam("notation",$resultat);
  $_REQUEST_NOTE->bindParam("idRecette",$idRecette);
  $_REQUEST_NOTE->execute();
  $this->Deconexion($db);
  return $res;
}






    
}
?>