<?php 

require_once("./views/userView.php");

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

    private function SearchBar(){
        ?>
        <form action="forms/contact.php" style="width :80%;margin:auto" method="post" role="form" class="addForm">
          <div class="row" style="display: flex;align-items: center;">
            <div class="col-md-6 form-group" >
              <input type="text" style="margin-top : 10px" name="titre" class="form-control" id="name" placeholder="titre de news" required>
            </div>
            <div class="col-md-6 text-center"><button type="submit">Search</button></div>
          </div>
        </form>
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

    private function table($thead){
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
      <tr>
        <th scope="row">HDD Storage</th>
        <td>700 MB</td>
        <td>1,5 GB</td>
        <td>50 GB</td>
        <td>up to 5T</i></td>
      </tr>

    </tbody>
  </table>
</div>
</section>
        <?php
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
    private function formRecette(){
        ?>
                <form action="forms/contact.php" method="post" role="form" class="addForm">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="nom" class="form-control" id="name" placeholder="Recette" required>
            </div>

            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="tempsPréparation" id="email" placeholder="temps de Préparation" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="tempsReposint" id="email" placeholder="temps de Reposint" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="tempsCuisson" id="email" placeholder="temps de Cuisson" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0" style="display: flex;">
                    <div class="autocomplete" style="width: 100%;">
                        <input id="myInput" type="text"   class="form-control" name="ingredient"  required placeholder="Ingreedients">           
                    </div>           
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                 <button class="submitIngredient" type="submit">Ajouter Ingredient</button>   
            </div>
          </div>
          <div class="ingredient-select search-recette">

           </div>
          <div class="row mt-3">
            <div class="col-md-6 form-group">
                <select class="form-select" aria-label="Default select example">
                <option selected>select categorie</option>
                <option value="1">entrées</option>
                <option value="2">plats</option>
                <option value="3">desserts</option>
                <option value="4">boissons</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <select class="form-select" aria-label="Default select example">
                <option selected>select Fete</option>
                <option value="1">mariage</option>
                <option value="2">circoncision</option>
                <option value="3">Aid</option>
                <option value="4">AchoraZ</option>
                </select>
            </div>
              
            </div>
            <?php
            ?>
          <div class="form-group mt-3">
            <textarea class="form-control" name="desc" rows="5" placeholder="description Recette" required></textarea>
          </div>
         <button style="margin: auto;" class="submit" type="submit">Ajouter Recette</button>   
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
        $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "Utlisateurs de", "Delcious");
                $this->Menu();
                $userView->TitleSection("Consulter", "Utilisateurs", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");

                $userView->FilterButtons(["age", "email", "nom"]);
                $this->SearchBar();
                $this->table(["utilisateur","name","email","age","valider"]);
          ?>
            <script src="./views/script/hero.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
    }
    public function shownNtritionPage() {
        $userView = new userView();
        $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "ajpouter nutrition in", "Delcious");
                $this->Menu();
                $userView->TitleSection("Ajouter", "nutrition", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
            $this->table(["ingredient","calorie","healthy","saison","vitamins" , "minerals"]);
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
        $this->Entete_Page();
        ?>        
        <body>
            <?php
                $userView->header();
                $userView->HeaderImage("assets/slide/slide-2.jpg", "Gestion Recettes in", "Delcious");
                $this->Menu();
                $userView->TitleSection("Gestion de", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
            $userView->FilterButtons(["categorie1","categorie2","categorie3"]);
            $userView->FilterButtons(["fete1","fete2","fete3","fete4"]);
            $this->SearchBar();
                $this->table(["recette","utilisateur","calorie","categorie","notation","valider","modifier" , "supprimer"]);
            $this->formRecette();
          ?>
            <script src="./views/script/autoComplete2.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php
    }
}
?>