<?php 

class ingredientModal{
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

    public function getAllIngredientsModal(){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM ingredient order by nom ");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getIngredientByIdModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM ingredient where nom = :id");
        $_REQUEST->bindParam("id",$id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getIngredintRecette($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT *  FROM ingredient  join ingredient_recette on ingredient_recette.idIngredient = ingredient.nom where idRecette = :id");
        $_REQUEST->bindParam("id",$id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getVitaminsModal(){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM `vitamine`");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }
    public function getMineralsModal(){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM `mineral`");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }


    public function getVitaminsIngredientModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM vitamine_ingredient join vitamine on vitamine.sign = vitamine_ingredient.idVitamine where vitamine_ingredient.idIngredient = :id");
        $_REQUEST->bindParam("id",$id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function getMinealsIngredientModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM mineral_ingredient join mineral on mineral.sign = mineral_ingredient.idMineral where mineral_ingredient.idIngredient = :id");
        $_REQUEST->bindParam("id",$id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
    }

    public function deleteIngredientModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("DELETE FROM `ingredient` WHERE nom = :id");
        $_REQUEST->bindParam("id", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
      }
}
?>