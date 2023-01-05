<?php

require_once("./modals/authModal.php");
class AuthController
{
    public function AuthUser_Controller($email,$password) {
        echo($email." ".$password);
        $AuthModal = new AuthModal();
        $isAuth = $AuthModal->AuthUser($email,$password);
        return $isAuth;
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

}




?>