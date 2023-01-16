<?php 


require_once('./views/userView.php');
require_once('./views/adminstrationView.php');

$User = new userView();
$Admin = new adminstrationView();


$request = $_SERVER['REQUEST_URI'];

$auth = new AuthController();
if (isset($_POST['login'])) {
    $res = $auth->AuthUser_Controller($_POST['email'], $_POST["password"]);
    if(count($res) > 0){
        header("Location:./profile");
    } else
        $isAdmin = $auth->authAdminController($_POST['email'], $_POST["password"]);
        if ($isAdmin ==1) {
            header("Location:./admin");
    } else
        echo "false";
       
}
$User->Entete_Page();

?>
<body>
    <?php
    $User->LoginScreen();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
?>