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

    public function AuthUser($email,$password) {
        $db = $this->Connexion();
        $_REQUEST = $db->prepare("SELECT * from utilisateur where email=:email AND motdepasse=:hash_pwd");
        $_REQUEST->bindParam("email",$email);
        $_REQUEST->bindParam("hash_pwd",$password);
        $_REQUEST->execute();
        $res = $_REQUEST->fetchAll(PDO::FETCH_ASSOC);
        if($_REQUEST->rowCount()==1){  
            session_start();
            $_SESSION["email"] = $res[0]['email'];
            $_SESSION["password"] = $res[0]['hash_pwd'];       
            $this->Deconexion($db);       
            return "true";
        }else{
            $this->Deconexion($db);
            return "false";
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

    public function LogOut() {
        if (isset($_POST['logout'])) {
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
        }

    }


}




?>