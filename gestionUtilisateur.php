<?php 

require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();

$userView = new userView();
$auth = new AuthController();

if (isset($_GET['idUserValid'])) {
  $auth->valideuserController($_GET['idUserValid']);
header("Location:./gestionUtilisateur"); 
}
if (isset($_GET['idUserBloque'])) {
  $auth->bloquerUserController($_GET['idUserBloque']);     
  header("Location:./gestionUtilisateur"); 
}
// get users info for table
$users = [];
if (isset($_POST["searchSubmit"])){
 $users = $auth->getsearchUserController($_POST["search"]);
}else {
  $users = $auth->getAlluserController();
}

$Admin->Entete_Page();
?>        
<body>
    <?php
        $Admin->Menu(3);
        $userView->TitleSection("Consulter", "Utilisateurs", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $Admin->SearchBar('chercher utilisateur par nom');
        $userView->FilterButtons(['nom', 'prenom',"email",'age',] ,0,'');
        $Admin->table(["utilisateur","name","prenom","email","age","états"],2,$users);
  ?>
    <script src="./views/script/hero.js"></script>
    <script src="./views/script/sort.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>
