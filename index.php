<?php 
require_once('./views/userView.php');
require_once('./views/adminstrationView.php');
$view = new userView();
$view2 = new adminstrationView();
$view2->shownGestionRecettePage();
?>