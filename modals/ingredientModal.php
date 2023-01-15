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
        $this->databasename = "TDW";
    }

    public function Connexion()
    {
        try {
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

    public function addIngredientModal($nom , $descr,$cal,$healthy,$saison,$vits,$mins){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("INSERT INTO  `ingredient` values ( :nom , :descr , :cal , :healthy , :saison , 0 )");
        $_REQUEST->bindParam("nom", $nom);
        $_REQUEST->bindParam("descr", $descr);
        $_REQUEST->bindParam("cal", $cal);
        $_REQUEST->bindParam("healthy", $healthy);
        $_REQUEST->bindParam("saison", $saison);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        foreach($vits as $vit) {
            $_REQUEST1 = $db->prepare('INSERT INTO `vitamine_ingredient` VALUES ( :idIngredient , :idVitamine )');
            $_REQUEST1->bindParam("idIngredient", $nom);
            $_REQUEST1->bindParam("idVitamine", $vit);
            $_REQUEST1->execute();
        }
        foreach($mins as $min) {
            $_REQUEST2 = $db->prepare('INSERT INTO `mineral_ingredient` VALUES ( :idIngredient , :idMineral )');
            $_REQUEST2->bindParam("idIngredient", $nom);
            $_REQUEST2->bindParam("idMineral", $min);
            $_REQUEST2->execute();
        }
        $this->Deconexion($db);
        return $res;
    }

    public function valideIngredientModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("UPDATE ingredient SET valide = 1 where nom = :id");
        $_REQUEST->bindParam("id", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
      }

      public function bloqueIngredientModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("UPDATE ingredient SET valide = 0 where nom = :id");
        $_REQUEST->bindParam("id", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
      }

      public function modifierInredientModal($nom , $descr,$cal,$healthy,$saison,$vits,$mins){
        $db = $this->Connexion();
        echo $nom . ' ' . $descr . " " . $cal . " " . $healthy . ' ' . $saison . ' #';
        $_REQUEST = $db->prepare("UPDATE ingredient SET nom = :nom , descr = :descr , calories = :calories , saison = :saison , Healthy = :Healthy where nom = :nom");
        $_REQUEST->bindParam("nom", $nom);
        $_REQUEST->bindParam("descr", $descr);
        $_REQUEST->bindParam("calories", $cal);
        $_REQUEST->bindParam("saison", $saison);
        $_REQUEST->bindParam("Healthy", $healthy);
        $_REQUEST->execute();
        $_REQUEST1 = $db->prepare("DELETE FROM mineral_ingredient where idIngredient = :nom");
        $_REQUEST1->bindParam("nom", $nom);
        $_REQUEST1->execute();
        $_REQUEST2 = $db->prepare("DELETE FROM vitamine_ingredient where idIngredient = :nom");
        $_REQUEST2->bindParam("nom", $nom);
        $_REQUEST2->execute();
        foreach($vits as $vit) {
            $_REQUEST1 = $db->prepare('INSERT INTO `vitamine_ingredient` VALUES ( :idIngredient , :idVitamine )');
            $_REQUEST1->bindParam("idIngredient", $nom);
            $_REQUEST1->bindParam("idVitamine", $vit);
            $_REQUEST1->execute();
        }
        foreach($mins as $min) {
            $_REQUEST2 = $db->prepare('INSERT INTO `mineral_ingredient` VALUES ( :idIngredient , :idMineral )');
            $_REQUEST2->bindParam("idIngredient", $nom);
            $_REQUEST2->bindParam("idMineral", $min);
            $_REQUEST2->execute();
        }
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
      }
}
?>