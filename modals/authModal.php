<?php


class AuthModal
{
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

    
    public function registreUser($nom,$prenom,$email,$age,$password) {
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("INSERT INTO utilisateur (`email`,`nom` , `prenom` , `age` ,`valid`, `motdepass`) values (:email,:nom,:prenom,:age , 0 ,:motdepass)");
        $_REQUEST->bindParam("email",$email);
        $_REQUEST->bindParam("nom",$nom);
        $_REQUEST->bindParam("prenom",$prenom);
        $_REQUEST->bindParam("age",$age);
        $_REQUEST->bindParam("motdepass",$password);
        $_REQUEST->execute();
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;    
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public function AuthUser($email,$password) {
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * from utilisateur where email=:email AND motdepass=:hash_pwd");
        $_REQUEST->bindParam("email",$email);
        $_REQUEST->bindParam("hash_pwd",$password);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        if($_REQUEST->rowCount()==1){  
            session_start();
            $_SESSION["email"] = $res[0]['email'];
            $_SESSION["password"] = $res[0]['motdepass'];       
            $this->Deconexion($db);       
            return $res[0];
        }else{
            $this->Deconexion($db);
            return [];
        }
    }

    public function VerifyIfAuthDoneAlready() {
        $db = $this->Connexion();
        session_start();
        if (isset($_SESSION["user"])&& isset($_SESSION["password"])) {
            $_REQUEST = $db->prepare("SELECT * from utilisateur where name_user=:name_user AND hash_pwd=:hash_pwd");
            $_REQUEST->bindParam("email",$_SESSION["email"]);
            $_REQUEST->bindParam("hash_pwd",$_SESSION["password"]);
            $_REQUEST->execute();
            $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
            if($_REQUEST->rowCount()==1){    
                $this->Deconexion($db);     
                return true;
            }else {
                $this->Deconexion($db);   
                return false;
            }
        }
    }

    public function getAllUsersModal(){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM utilisateur order by nom ");
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;

    }

    public function valideUserModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("UPDATE utilisateur SET valid = 1 where email = :id");
        $_REQUEST->bindParam("id", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
      }

      public function getSearchUserModal($search){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM utilisateur where instr(nom,:search) order by nom ");
          $_REQUEST->bindParam("search", $search);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res;
      }
    public function LogOut() {
        if (isset($_POST['logout'])) {
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
        }

    }

    public function getUserModal($id){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * FROM utilisateur where email = :email");
        $_REQUEST->bindParam("email", $id);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);
        return $res[0];
    }

    public function ubdateuserModal($nom,$prenom,$email,$age,$password){
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("UPDATE utilisateur SET nom = :nom , prenom = :prenom , age = :age , motdepass = :motdepass where email = :email");
        $_REQUEST->bindParam("nom", $nom);
        $_REQUEST->bindParam("prenom", $prenom);
        $_REQUEST->bindParam("age", $age);
        $_REQUEST->bindParam("motdepass", $password);
        $_REQUEST->bindParam("email", $email);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        $this->Deconexion($db);

    }


}




?>