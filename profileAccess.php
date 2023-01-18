<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/controllers/showPagesController.php';

$showPagesController = new showPages();

$showPagesController->showProfileAccessPage();

?>