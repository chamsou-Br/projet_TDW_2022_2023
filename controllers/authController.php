<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/modals/authModal.php';

class AuthController
{
    public function AuthUser_Controller($email,$password) {
        $AuthModal = new AuthModal();
        $isAuth = $AuthModal->AuthUser($email,$password);
        return $isAuth;
    }

    public function RegisterUserController() {
        $AuthModal = new AuthModal();
        $res = $AuthModal->registreUser($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["age"],$_POST["password"]);
        return $res;
    }

    public function VerifyIfAuthDoneAlready_Controller() {
        $AuthModal = new AuthModal();
        $isAuth =$AuthModal->VerifyIfAuthDoneAlready();
        if ($isAuth == false) {
            header("Location:./login.php");
        }
        return $isAuth;
    }

    public function getAlluserController(){
        $AuthModal = new AuthModal();
        $res = $AuthModal->getAllUsersModal();
        return $res;
    }

    public function valideuserController($id){
        $AuthModal = new AuthModal();
        $res = $AuthModal->valideUserModal($id);
        return $res;
    }

    public function LogOut_Controller() {
        $AuthModal = new AuthModal();
        $AuthModal->LogOut();
    }
    public function getsearchUserController($search){
        $auth = new AuthModal();
        $res = $auth->getSearchUserModal($search);
        return $res;
    }

    public function getUserController($id){
        $auth = new AuthModal();
        $res = $auth->getUserModal($id);
        return $res;
    }

    public function updateUserController(){
        $auth = new AuthModal();
        $auth->ubdateuserModal($_POST["nom"],$_POST["prenom"],$_POST['email'],$_POST["age"],$_POST["motdepass"]);
    }

}




?>