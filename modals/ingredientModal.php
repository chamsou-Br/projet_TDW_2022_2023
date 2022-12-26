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
}
?>