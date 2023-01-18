<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/controllers/authController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/controllers/ingredientController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/controllers/newsController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/controllers/parametreController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/controllers/recetteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/views/adminstrationView.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projet_php/views/userView.php';

class showPages {

    public function showAcceilPage()
    {
        $user = new userView();
        $user->AcceilPage();
    }

    public function showAjouterrecettePage()
    {
        $user = new userView();
        $user->AjouterRecettePage();
    }
    public function showCategoriePage()
    {
        $user = new userView();
        $user->categoriePage();
    }

    public function showLoginPage()
    {
        $user = new userView();
        $user->connexionPage();
    }

    public function showFetePage()
    {
        $user = new userView();
        $user->FetePage();
    }
    public function showHealthyPage()
    {
        $user = new userView();
        $user->healthyPage();
    }

    public function showIdeeRecettePage()
    {
        $user = new userView();
        $user->ideeRecettePage();
    }

    public function showNewsPage()
    {
        $user = new userView();
        $user->NewsPage();
    }

    public function showNutritionPage()
    {
        $user = new userView();
        $user->nutritionPage();
    }
    public function showProfilePge()
    {
        $user = new userView();
        $user->profilePage();
    }
    public function showDetailsRecetePage()
    {
        $user = new userView();
        $user->recetteDetailsPage();
    }


    public function showRegistrePage()
    {
        $user = new userView();
        $user->registrePage();
    }

    public function showSaisonPage()
    {
        $user = new userView();
        $user->saisonPage();
    }

    public function showAdminPage()
    {
        $admin = new adminstrationView();
        $admin->adminPage();
    }
    public function showGestionNewsPage()
    {
        $admin = new adminstrationView();
        $admin->gestionNewsPage();
    }
    public function showGestionNutritionPage()
    {
        $admin = new adminstrationView();
        $admin->gestionNutritionPage();
    }

    public function showGestionRecettePage()
    {
        $admin = new adminstrationView();
        $admin->gestionRecettePage();
    }

    public function showParamsPage()
    {
        $admin = new adminstrationView();
        $admin->paramsPage();
    }

    public function showModifierNutritionPage()
    {
        $admin = new adminstrationView();
        $admin->modifierNutritionPage();
    }

    public function showModifieRecettePage()
    {
        $admin = new adminstrationView();
        $admin->modifierRecettePage();
    }
    public function showGestionUserPage()
    {
        $admin = new adminstrationView();
        $admin->gestionUserPage();
    }
    public function showProfileAccessPage(){
        $admin = new adminstrationView();
        $admin->ProfileAccess(); 
    }
}




?>