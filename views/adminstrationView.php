<?php 

require_once("./views/userView.php");
require_once("./controllers/authController.php");
require_once("./controllers/recetteController.php");
require_once("./controllers/ingredientController.php");

class adminstrationView {

    private function Entete_Page()
    {
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="./views/styleSheet/admin.css" rel="stylesheet" type="text/css" />
    <link href="./views/styleSheet/hero2.css" rel="stylesheet" type="text/css" />



</head>
<?php
    }

    private function Menu()
    {
?>
<header id="nav" class=" d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            <h1><a href="index.html" class="active">accueil</a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="#contact">
                        News
                    </a></li>
                <li><a class="nav-link scrollto" href="#contact">
                        Recettes
                    </a></li>
                <li><a class="nav-link scrollto" href="#contact">
                        utilisateurs
                    </a></li>
                <li><a class="nav-link scrollto" href="#contact">
                nutrition
                    </a></li>

            </ul>

        </nav>
        <!-- navbar -->

        <a href="#contact-btn" class="contact-btn scrollto">Contact us</a>

    </div>
</header><!-- End Header -->
<?php
    }

    private function SearchBar($title){
        ?>
        <form action="" style="margin : 0px;margin-left : 110px;" method="post" role="form" class="addForm">
          <div class="row" style="display: flex;align-items: center;">
            <div class="col-md-4 form-group" >
              <input type="text"  name="search" class="form-control" id="name" placeholder="<?php echo $title ?>" required>
            </div>
            <div class="col-md-6 text-center"><button name="searchSubmit" type="submit">Search</button></div>
          </div>
        </form>
        <?php
    }

    public function TrieButtons($tris)
    {
        ?>

            <div class="row" style="margin-left : 130px" >  
                <div class="col-lg-4">
                <select  class="form-select tri-select"  aria-label="Default select example">
                    <option selected>Trier par</option>
                    <?php foreach ($tris as $key=> $tri) { ?>
                      <option value="<?php echo $key ?> "><?php echo $tri ?></option>
                    <?php }?>
                    </select>
                </div>          

            </div>
            <?php
    }


    private function formNews(){
        ?>
                <form action="forms/contact.php" method="post" role="form" class="addForm">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="titre" class="form-control" id="name" placeholder="titre de news" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="recette" id="email" placeholder="recette" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="img" id="subject" placeholder="image de news" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="desc" rows="5" placeholder="description" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
        <?php


    }

    private function table($thead,$type,$values){
        ?>
        <section style="width: 80%;margin : auto;border : 2px solid #cfa671;padding: 0;margin-top : 30px">
     <div class="table-responsive">
  <table class="table table-striped  border-light">
    <thead >
      <tr>
        <?php 
        foreach($thead as $value){
            ?><th scope="col"><strong><?php echo($value) ?></strong></th><?php
        } ?>

      </tr>
    </thead>
    <tbody>
      <?php if ($type == 0) {
      $this->bodyIngredientTable($values);
      }
      if ($type == 1) {
        $this->bodyRecetteTable($values);
      }
      if($type == 2) {
      $this->bodyUserTable($values);
      }

       ?>
    </tbody>
  </table>
</div>
</section>
        <?php
    }

    private function bodyIngredientTable($values){
    foreach ($values as $value) {
      ?>     
      <tr >
        <th scope="row"><?php echo $value["nom"] ?></th>
        <td><?php echo $value["calories"] ?></td>
        <?php if ($value["Healthy"] == 1) { ?>
            <td><i class="bi bi-check2"></i></td>
          <?php
          } else { ?> 
           <td><i class="bi bi-x-lg"></i></td>
          <?php

          }?>
        <td><?php echo $value["saison"] ?></td>
        <td><a>modifier</a></td>
        <td><a href="?idIngredientSupp=<?php echo $value['nom'] ?>">Supprimer</a></td>

      </tr>
      <?php
    }
    }
    private function bodyUserTable($values){

      foreach ($values as $key=> $value) {
        ?>     
        <tr>
          <th scope="row"><?php echo $key ?></th>
          <td><?php echo $value["nom"] ?></td>
          <td><?php echo $value["prenom"] ?></td>
          <td><?php echo $value["email"] ?></td>
          <td><?php echo $value["age"] ?></td>
          <?php if ($value["valid"] == 1) { ?>
            <td><i class="bi bi-check2"></i></td>
          <?php
          } else { ?> 
           <td> <a href="./?idUserValid=<?php echo $value['email'] ?>" >valider</a> </td>
          <?php
          }?>
        </tr>
        <?php

      }
      }

    private function bodyRecetteTable($values){

        foreach ($values as $value) {
          ?>     
          <tr categorie="<?php if (isset($value["nomCategorie"])) echo $value["nomCategorie"] ?>" fete="<?php if(isset($value["nomFete"])) echo $value["nomFete"] ?>">
            <th scope="row"><?php echo $value["nom"] ?></th>
            <td><?php echo $value["nomUser"] ?></td>
            <td><?php echo $value["nomCategorie"] ?></td>
            <td><?php echo $value["nomFete"] ?></td>
            <td><?php echo $value["tempsPreparation"]." min" ?></td>
            <td><?php echo $value["tempsReposint"]." min" ?></td>
            <td><?php echo $value["tempsCuisson"]." min" ?></td>
            <td><?php echo $value["calories"] ?></td>
            <?php if ($value["valid"] == 1) { ?>
              <td><i class="bi bi-check2"></i></td>
            <?php
            } else { ?> 
             <td> <a href="?idRecetteValide=<?php echo $value['idRecette'] ?>" >valider</a> </td>
            <?php
  
            }?>
              <td><a>modifier</a></td>
              <td><a href="?idRecetteSupp=<?php echo $value['idRecette'] ?>">Supprimer</a></td>
          </tr>
          <?php
  
        }
        }

    public function Selected($name,$title) {
        ?>
    <h1 class="selectedTitle"><?php echo($title)?></h1>
    <section class="selected">
        <div class="form-check">
            <input class="form-check-input-healthy" type="checkbox" name="<?php echo($name)?>" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input-healthy" name="<?php echo($name)?>" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
            </label>
        </div>
    </section>
        <?php
    }
    private function formNurtition(){
        ?>
                <form action="forms/contact.php" method="post" role="form" class="addForm">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="nom" class="form-control" id="name" placeholder="Ingredient" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="calorie" id="email" placeholder="calories" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6 form-group">
                <select class="form-select" aria-label="Default select example">
                <option selected>choisi un saison</option>
                <option value="1">le printemps</option>
                <option value="2">l'été</option>
                <option value="3">l'automne</option>
                <option value="3">l'hiver</option>
                </select>
            </div>
                 <div class="col-md-6 form-group">
                <div class="form-check">
                    <input class="form-check-input-healthy" type="checkbox" name="healthy" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Healthy
                    </label>
                </div>
                </div>
            </div>
            <?php
                $this->Selected("vitamine[]","Vitamine");
                $this->Selected('mineral[]',"Minerale")
            ?>
          <div class="form-group mt-3">
            <textarea class="form-control" name="desc" rows="5" placeholder="description d'ingredient" required></textarea>
          </div>
          <div class="text-center"><button type="submit">Ajouter Ingredient</button></div>
        </form>
        <?php


    }
    private function formRecette($id){
      $recette = new recetteController();

        ?>
        <form action="" method="post" role="form" class="addForm">
         <input type="hidden" name="idRecette" value="<?php echo $id ?>"  class="form-control" id="name"  >
         <input type="hidden" name="idUser" value="user1@gmail.com"  class="form-control" id="name"  >
          <div class="row">

            <div class="col-md-6 form-group">
              <input type="text" name="nom" class="form-control" id="name" placeholder="Recette" >
            </div>

            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="tprep" id="email" placeholder="temps de Préparation" >
            </div>

            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="trepo" id="email" placeholder="temps de Reposint" >
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="tcuis" id="email" placeholder="temps de Cuisson" >
            </div>

            <div class="col-md-3 form-group mt-3 mt-md-0" style="display: flex;">
                    <div class="autocomplete" style="width: 100%;">
                        <input id="myInput" type="text"   class="form-control" name="ingredient"  placeholder="Ingreedients">           
                    </div>           
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control ingredientDescr" name="ingredientDescr" id="email" placeholder="ingredient quantite" >
            </div>
            <div class="col-md-3 form-group mt-3 mt-md-0">
                 <button class="submitIngredient" type="submit">Ajouter Ingredient</button>   
            </div>
            <div class="ingredient-select search-recette">

            </div>

            <div class="col-md-6 form-group mt-3 mt-md-0" style="display: flex;">
                    <input id="instruction" type="text" class="form-control" name="etape" id="email" placeholder="instruction" >
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                 <button class="submitInstruction" type="submit">Ajouter Instruction</button>   
            </div>
            <div class="instruction-select search-recette" style="display: block;">
            
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-6 form-group">
                <select class="form-select" name="categorie"  aria-label="Default select example">
                <option selected>select categorie</option>
                <?php
                $res = $recette->getAllCategoriesController();
                foreach($res as $value) {
                  ?>
                  <option  value="<?php echo $value["idCategorie"] ?>"><?php echo $value["nom"] ?></option>
                  <?php
                }
                ?>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <select class="form-select" name="fete" aria-label="Default select example">
                <option selected>select Fete</option>
                <?php
                $fetes = $recette->getAllFeteController();
                foreach($fetes as $value) {
                  ?>
                  <option value="<?php echo $value["idFete"] ?>"><?php echo $value["nom"] ?></option>
                  <?php
                }
                ?>
                </select>
            </div>
            
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="picture" id="email" placeholder="picture" >
            </div>
              
            </div>
            <?php
            ?>
          <div class="form-group mt-3">
            <textarea class="form-control" name="descr" rows="5" placeholder="description Recette" ></textarea>
          </div>
         <button style="margin: auto;" class="submit " name="ajouter-recette" type="submit">Ajouter Recette</button>   
        </form>
        <?php


    }
    public function showAddNewsPage() {
        $userView = new userView();
        $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "News in", "Delcious");
                $this->Menu();
                $userView->TitleSection("Add", "some news", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
                $this->table(["news","title","description"]);
                $this->formNews();

          ?>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
    }
    public function showUsersPage() {
        $userView = new userView();
        $auth = new AuthController();
        
        if (isset($_GET['idUserValid'])) {
          $auth->valideuserController($_GET['idUserValid']);     
        }
        // get users info for table
        $users = [];
        if (isset($_POST["searchSubmit"])){
         $users = $auth->getsearchUserController($_POST["search"]);
        }else {
          $users = $auth->getAlluserController();
        }

        $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "Utlisateurs de", "Delcious");
                $this->Menu();
                $userView->TitleSection("Consulter", "Utilisateurs", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
                // $userView->FilterButtons(["age", "email", "nom"]);
                $this->SearchBar('chercher utilisateur par nom');
                $userView->FilterButtons(['nom', 'prenom',"email",'age',] ,0);
                $this->table(["utilisateur","name","prenom","email","age","valider"],2,$users);
          ?>
            <script src="./views/script/hero.js"></script>
            <script src="./views/script/sort.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
    }
    public function shownNtritionPage() {
        $userView = new userView();
        $ingredient = new ingredientController();
        if (isset($_GET['idIngredientSupp'])) {
        $ingredient->deleteIngredientController($_GET['idIngredientSupp']);     
        }
        $ingrs = $ingredient->getAllIngredientsController();
        $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "ajpouter nutrition in", "Delcious");
                $this->Menu();
                $userView->TitleSection("Ajouter", "nutrition", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem."); 
                $this->table(["ingredient","calorie","healthy","saison",'modifier','supprimer'],0,$ingrs);
                $this->formNurtition();

          ?>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
    }
    public function shownGestionRecettePage() {
        $userView = new userView();
        $recetteCtrl = new recetteController();
        if (isset($_GET['idRecetteSupp'])) {
        $recetteCtrl->deleteRecetteController($_GET['idRecetteSupp']);     
        }
        if (isset($_GET['idRecetteValide'])) {
          $recetteCtrl->valideRecetteController($_GET['idRecetteValide']);     
        }
        if (isset($_POST["ajouter-recette"])) {
          $recetteCtrl->addRecette();
        }
        // get recette info for table
        $recs = [];
        if (isset($_POST["searchSubmit"])){
         $recs = $recetteCtrl->getSearchRecetteController($_POST["search"]);
        }else {
          $recs = $recetteCtrl->getAllRecetteController();
        }
        $categorie = $recetteCtrl->getAllCategoriesController();
          $fetes = $recetteCtrl->getAllFeteController();
          $catgFilter = ["All"];
          $feteFilter = ["All"];
          foreach($categorie as $cat) {
          array_push($catgFilter, $cat["nom"]);
          }
          foreach ($fetes as $fete) {
        array_push($feteFilter, $fete["nom"]);
          }
            $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "Gestion Recettes in", "Delcious");
                $this->Menu();
                $userView->TitleSection("Gestion de", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
                $userView->FilterButtons($feteFilter,0,"fete");
                $userView->FilterButtons($catgFilter,0,"categorie");
                $this->SearchBar("search recette");
                $this->TrieButtons(["temp prep","temp repos",'temp cuiss',"calories"]);
                $this->table(["recette","utilisateur","categorie","fete","temp prep","temp repo",'temp cuiss','calories',"valider","modifier" , "supprimer"],1,$recs);
                $this->formRecette(count($recs));
          ?>
            <script src="./views/script/autoComplete.js"></script>
            <script src="./views/script/filterGestionRecette.js"></script>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
    }
}
?>