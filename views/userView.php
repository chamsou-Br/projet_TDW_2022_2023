<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/controllers/authController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/controllers/recetteController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/controllers/ingredientController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/controllers/parametreController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/controllers/newsController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projet_php/views/adminstrationView.php';
class userView
{

    public function Entete_Page()
    {
        if(session_id() == ''){
            session_start();
         }
        ?>

        <head>
            <meta charset="UTF-8">
            <meta charset="ISO-8859-1">
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
            <link rel="stylesheet" href="./views/styleSheet/login.css">
            <link href="./views/styleSheet/hero.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
            <style>
            body {
            font-family: "Amarante";
            }
            </style>
        </head>
        <?php
    }

    public function LoginScreen()
    {

        ?>
        <div class="box-form">
            <div class="left">
                <div class="overlay">
                    <h1>Bienvenue avec nous</h1>
                    <p>Chef master un site web algerien pour proposer une variete de recettes différentes a la demande , et
                        partager les plus délicieux plats algériens .</p>
                    <span>
                        <p>conexion avec réseau sociaux</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
                    </span>
                </div>
            </div>
            <div class="right">
                <h5>connecter</h5>
                <p>Vous n'aves pas un compte ? <a style="color: #cfa671;" href="./registre">Creer nouvelle compte</a> Cela prend moins d’une minute</p>
                <p><a style="color: #cfa671;" href="./">Consulter les recettes comme un Visiteur</a></p>
                <form  style="margin-top: -10px;" method="post">
                    <div class="inputs">
                        <input required type="text" name="email" placeholder="email">
                        <br>
                        <input required type="password" name="password" placeholder="mot de passe">
                    </div>
                    <div class="remember-me--forget-password">
                        <!-- Angular -->
                        <p>Mot de passe oublié ?</p>
                    </div>
                    <br>
                    <button type="submit" class="submitInput" name="login">connexion</button>
                    <br>
                </form>


            </div>

        </div>
        <!-- partial -->
        <?php
    }

    public function RegistreScreen()
    {
        $auth = new AuthController();
        if (isset($_POST['register'])) {
            $res = $auth->RegisterUserController();
            echo count($res);
        }
        ?>
        <div class="box-form">
            <div class="left">
                <div class="overlay">
                    <h1>Bienvenue avec nous</h1>
                    <p>Chef master un site web algerien pour proposer une variete de recettes différentes a la demande , et
                        partager les plus délicieux plats algériens .</p>
                    <span>
                        <p>conexion avec réseau sociaux</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
                    </span>
                </div>
            </div>
            <div class="right" style="width: 50%;">
                <h5>connecter</h5>
                <p>Vous aves  un compte ? <a style="color: #cfa671;" href="./connexion">connectez avec nous </a></p>
                <p style="margin-top: -10px;"><a style="color: #cfa671;" href="./">Consulter les recettes comme un Visiteur</a></p>
                <form style="margin-top: -20px;" method="post">
                    <div class="inputs">
                        <input type="text" required name="nom" placeholder="nome">
                  
                        <input type="text" required name="prenom" placeholder="prenom">
                       
                        <input type="email" required name="email" placeholder="email">
                       
                        <input type="number" required name="age" placeholder="age">
                       
                        <input type="password" required name="password" placeholder="mot de passe">
                    </div>
                    <br>
                    <button type="submit" class="submitInput" name="register">connexion</button>
                </form>


            </div>

        </div>
        <!-- partial -->
        <?php
    }
    public function TrieButtons($tris)
    {
        ?>

            <div class="row" style="margin-left : 20px" >  
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


    public function HeaderImage($img, $title1, $title2)
    {
        ?>
        <div style="background-image: url(<?php echo $img ?>);" class="header-img">
            <h1  >
                <?php echo $title1 ?><span><?php echo ' ' . $title2 ?></span>
            </h1>
        </div>
        <?php
    }

    public function TitleSection($title1, $title2, $desc)
    {
        ?>
        <div class="section-title">
            <h2>
                <?php echo $title1 ?><span><?php echo " " . $title2 ?></span>
            </h2>
            <p>
                <?php echo $desc ?>
            </p>
        </div><?php
    }

    public function Header()
    {
        ?>
        <header id="header" class=" d-flex align-items-center header-transparent">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <div class="logo me-auto">
                    <img src="./assets/logo.jpg" class="logo-img" />
                </div>

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto" href="#contact">
                                <div class="iconContainer"><i class="bi bi-facebook"></i></div>
                            </a></li>
                        <li><a class="nav-link scrollto" href="#contact">
                                <div class="iconContainer"><i class="bi bi-twitter"></i></div>
                            </a></li>
                        <li><a class="nav-link scrollto" href="#contact">
                                <div class="iconContainer"><i class="bi bi-instagram"></i></div>
                            </a></li>


                    </ul>

                </nav>
                <!-- navbar -->

                <a href="mailto:jc_berkane@esi.dz" class="contact-btn scrollto">Contact us</a>

            </div>
        </header><!-- End Header -->
        <?php
    }

    public function Hero($values)
    {
        ?>
        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">
                        <?php foreach ($values as $key => $value) { ?>
                            <div class="carousel-item <?php if ($key == 0) echo 'active' ?>" style="background-image: url(<?php echo $value["path"] ?>);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown"><span><?php echo $value["nom"] ?></span> </h2>
                                    <p class="animate__animated animate__fadeInUp"><?php echo $value["descr"] ?></p>
                                    <div>
                                        <a href="./ajouterRecette" class="btn-menu animate__animated animate__fadeInUp scrollto">ajouter recette</a>
                                        <a href="./recette?id=<?php echo $value["idRecette"] ?>"
                                            class="btn-book animate__animated animate__fadeInUp scrollto">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>



                    </div>
                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                    </a>

                </div>
            </div>
        </section><!-- End Hero -->
        <?php
    }




    public function Menu($key)
    {

        

        ?>
        <header id="nav" class=" d-flex align-items-center header-transparent">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <div class="logo me-auto">
                    <h1><a href="./" class="active">accueil</a></h1>
                </div>

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a style="<?php if ($key == 1) echo "color: #cfa671;" ?>" class="nav-link scrollto" href="./news">
                                News
                            </a></li>
                        <li><a style="<?php if ($key == 2) echo "color: #cfa671;" ?>" class="nav-link scrollto" href="./ideeRecette">
                                idées de recette
                            </a></li>
                        <li><a style="<?php if ($key == 3) echo "color: #cfa671;" ?>" class="nav-link scrollto" href="./healthy">
                                Healthy
                            </a></li>
                        <li><a style="<?php if ($key == 4) echo "color: #cfa671;" ?>" class="nav-link scrollto" href="./saison">
                                saisons
                            </a></li>
                        <li><a style="<?php if ($key == 5) echo "color: #cfa671;" ?>" class="nav-link scrollto" href="./fete">
                                fêtes
                            </a></li>
                        <li><a style="<?php if ($key == 6) echo "color: #cfa671;" ?>" class="nav-link scrollto" href="./nutrition">
                                nutrition
                            </a></li>
                    </ul>

                </nav>
                <!-- navbar -->

                <a href="./profile" class="contact-btn scrollto">
                <?php  if (!isset($_SESSION["email"]))
                            echo "connexion"; else echo "profile" ?></a>

            </div>
        </header><!-- End Header -->
        <?php
    }

    public function Carousel($title2, $values)
    {

        ?>
        <div class="carouselContainer">
            <div style="margin: 40px 0px;" id="<?php echo $title2 ?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators ">
                    <?php $j = 0;
                    while ($j < count($values) / 3) {
                        ?>
                        <button type="button" data-bs-target="#<?php echo $title2 ?>" data-bs-slide-to="<?php echo $j ?>"
                            class="<?php if ($j == 0)
                                echo ('active') ?>" aria-current="true"
                                aria-label="<?php echo "Slide " . $j ?>"></button>
                        <?php
                        $j = $j + 1;
                    } ?>
                </div>
                
                <div class="carousel-inner" style="padding: 0 20px;">
                    <?php

                    $i = 0;
                    while ($i + 3 <= count($values)) {
                        ?>
                        <div class="carousel-item <?php if ($i < 3)
                            echo "active" ?>">
                                <div style="display: flex;padding : 50px 30px">
                                    <?php
                        $this->CardRecette($i, $values[$i]);
                        $this->CardRecette($i + 1, $values[$i + 1]);
                        $this->CardRecette($i + 2, $values[$i + 2]);
                        ?>
                            </div>
                        </div>
                        <?php
                        $i = $i + 3;
                    }
                    if ($i < count($values)) {
                        ?>

                        <div class="carousel-item ">
                            <div style="display: flex;padding : 50px 30px">
                                <?php
                                while ($i < count($values)) {
                                    $this->CardRecette($i, $values[$i]);
                                    $i = $i + 1;
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>

                    <button style="margin-left: 0px;" class="carousel-control-prev" type="button"
                        data-bs-target="#<?php echo $title2 ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button style="margin-right: 0px;" class="carousel-control-next" type="button"
                        data-bs-target="#<?php echo $title2 ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <?php
    }

    public function FilterButtons($filters, $active,$title)
    {
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <form class="special-menu text-center">
                        <div class="button-group filter-button-group <?php echo $title ?>">

                            <?php foreach ($filters as $key => $value) { ?>
                                <button type="submit"
                                    class="<?php if ($key == $active || ($active == -1) && $key == 0)
                                        echo "active"; ?>"
                                    name="<?php echo $value ?>" data-filter="*">
                                    <?php echo ($value) ?>
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <?php
    }


    public function Gallerie($nom)
    {
        ?>
            <div class="gallery">
                <div class="section-title">
                    <h2>quelque picture de <span>
                            <?php echo " " . $nom ?>
                        </span></h2>
                </div>
                <div class="row g-0 gallery-items">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="./assets/slide/slide-1.jpg" class="gallery-lightbox">
                                <img src="./assets/slide/slide-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="./assets/slide/slide-2.jpg" class="gallery-lightbox">
                                <img src="./assets/slide/slide-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="./assets/slide/slide-3.jpg" class="gallery-lightbox">
                                <img src="./assets/slide/slide-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="./assets/slide/slide-1.jpg" class="gallery-lightbox">
                                <img src="./assets/slide/slide-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>



                </div>
            </div>
            <?php
    }
    public function CardRecette($i, $value)
    {
        ?>

            <a href="./recette?id=<?php echo $value["idRecette"] ?>" class="card" style="width: 18rem;">
                <div class="card-image" style="background-image: url(<?php echo ($value['path']) ?>)"></div>
                <div class="box">
                    <span>
                        <?php if ($i + 1 < 10)
                            echo "0" . ($i + 1);
                        else
                            echo ($i + 1); ?>
                    </span>
                    <h4><?php echo $value["nom"] ?></h4>
                    <p>
                        <?php echo substr($value["descr"], 0, 100) ?>
                    </p>
                </div>

    </a>

            <?php
    }
    
    public function SearchBar($title){
        ?>
        <form action="" style="width :80%;margin:auto" method="post" role="form" class="addForm">
          <div class="row" style="display: flex;align-items: center;">
            <div class="col-md-6 form-group" >
              <input type="text" style="margin-top : 10px" name="search" class="form-control" id="searchInput" placeholder="<?php echo $title ?>" required>
            </div>
            <div class="col-md-6 text-center"><button name="searchSubmit" class="searchSubmit" type="submit">Search</button></div>
          </div>
        </form>
        <?php
    }

    public function News($value)
    {
        ?>

            <div class="swiper-slide events">
                <div class="row event-item" style="margin-top: -10px;">
                    <div class="col-lg-5">
                        <img src="<?php echo $value["img"] ?>" style="z-index: 20;width :100%;max-height : 400px;  object-fit: cover;border : 3px solid #FFF;border-radius : 20px;margin : 0 20px" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" style="margin-left: 20px;">
                        <h3><?php echo $value["title"] ?></h3>

                        <ul>
                            <?php
                            $items = explode(".",$value["descr"]);
                            foreach($items as $item){
                                ?>
                                <li><i class="bi bi-check-circle"></i> <?php echo $item ?></li>
                                <?php
                            }
                            ?>

                        </ul>
                        <p>

                        </p>
                    </div>
                </div>
            </div>
            <?php
    }

    public function Diaporama($values)
    {

        ?>

            <div class="diaporama">
                <header id="slideshow">
                    <div class="slide-wrapper">

                        <!-- Define each of the slides
               and write the content -->

                        <?php
                        $array = array_slice($values, 0,3);
                         foreach ($array as $value) {
                            ?>
                            <div class="slide" style="background-image: url(<?php echo ($value["img"])?>); background-size: cover;">
                                <div class="slide-cover">
                                    <?php $this->News($value) ?>
                                </div>
                            </div>
                            <?php

                        } ?>
                        <div class="slide"
                            style="background-image: url(<?php echo ($values[0]["img"]) ?>); background-size: cover;">
                            <div class="slide-cover">
                                    <?php $this->News($values[0]) ?>
                                </div>
                        </div>

                    </div>
                </header>
            </div>
            <?php
    }

    public function ProfileUser($value){
        ?>
            <div class="profile">
                <div class="row" style="display: flex;align-items: center;">
                    <div class="col-lg-4">
                        <div class="profile-img">
                            <img src="https://ptetutorials.com/images/user-profile.png" />
                        </div>
                        <form method="post" style=" width: 100%;display : flex; justify-content: center;"">
                        <button style="margin: auto;" class="submit"   name="logout" type="submit">Deconexion</button>
                        </form>
                        
                    </div>
                    <form method="post"  class="col-lg-8 row profile-info" >

                    <div class="col-md-6 form-group">
                        <input type="text" name="nom" value="<?php echo $value["nom"] ?>" class="form-control" id="name" placeholder="name " >
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="prenom" value="<?php echo $value["prenom"] ?>" class="form-control" id="name" placeholder="prenom" >
                    </div>
                    <div class="col-md-6 form-group ">
                        <input type="text" name="email" value="<?php echo $value["email"] ?>" class="form-control" id="name" placeholder="email" >
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="number" name="age" value="<?php echo $value["age"] ?>" class="form-control" id="name" placeholder="age" >
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="password" name="motdepass" value="<?php echo $value["motdepass"] ?>" class="form-control" id="name" placeholder="nouvelle password" >
                    </div>
                    <div class="col-md-6 form-group">
                    <button style="margin: auto;" class="submit "  name="save-profile" type="submit">Sauvgarder</button>
                    </div>
                    </form>
                </div>
            </div>
        <?php
    }
    public function DetaialsRecette($details, $ingrs, $instrs,$isAuth,$isFav,$note)
    {
        $prep = isset($details["tempsPreparation"]) ? $details["tempsPreparation"] : 0;
        $repo = isset($details["tempsReposint"]) ? $details["tempsReposint"] : 0;
        $cuis = isset($details["tempsCuisson"]) ? $details["tempsCuisson"] : 0;
        $tot = $repo + $prep + $cuis;
        // $user = isset($details["idUser"]) ? "@" . explode("@", $details["idUser"])[0] : "@undifined";
        $user = $details["firstName"] . '_' . $details["lastName"];
        $calorie = 0;
        foreach ($ingrs as $ingr) {
            $calorie = $calorie + $ingr["calories"];
        }
        ?>
            <div>
                <div class="row">
                    <div class="col-lg-4 ingredient">
                        <div style="position: relative;" class="recette-img">
                            <?php if ($isAuth != false) { ?>
                                <div style="position : absolute;top : 20px ;left : 20px;z-index : 20">
                                    <a href="?id=<?php echo $details["idRecette"] ?>&idUser=<?php echo $isAuth[0]["email"] ?>&fav=<?php echo $isFav ?>">
                                        <i style="<?php if ($isFav== 0)
                                        echo 'color: #FFF';
                                         else
                                        echo 'color: #ff002b' ?>;font-size : 36px" class="bi  bi-heart-fill"></i>
                                    </a>    
                                </div>
                        <?php } else {?>
                            <div style="position : absolute;top : 20px ;left : 20px;z-index : 20">
                                    <a href="./connexion">
                                        <i style="color: #FFF;font-size : 36px" class="bi  bi-heart-fill"></i>
                                    </a>    
                                </div>
                        <?php }?>
                            <img src="<?php echo $details["path"] ?>" />
                        </div>
                        <div class="userInfo">
                            <h5><i style="color: #6c665c;" class="bi bi-person-circle"></i>
                                <?php echo $user ?>
                            </h5>
                            <?php if ($isAuth != false) { ?>
                            <h5><?php echo $details['notation'] ?><i class="bi bi-star-fill"></i></h5>
                            <?php } ?>
                        </div>
                        
                        <h1 >Ingredient</h1>
                        <?php
                        foreach ($ingrs as $key => $ingr) {
                            ?>
                            <div class="etape-item">
                                <div>
                                    <span><?php echo $key + 1 ?></span>
                                </div>
                                <h5>
                                    <?php echo $ingr["quan"].' - '.$ingr["nom"].' -'  ?>
                                </h5>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-8 etape">
                        <div class="recette-info">
                            <h1>
                                <?php echo $details['nom'] ?>
                            </h1>
                            <p><?php echo $details['descr'] ?></p>
                        </div>
                        <div class="recette-time">
                            <div>
                                Prep : <span>
                                    <?php echo $prep . ' min' ?>
                                </span>
                            </div>
                            <div>
                                Repo : <span><?php echo $repo . ' min' ?></span>
                            </div>
                            <div>
                                Cuiss : <span>
                                    <?php echo $cuis . ' min' ?>
                                </span>
                            </div>
                            <div>
                                Total : <span><?php echo $tot . ' min' ?></span>
                            </div>
                            <div>
                                Difficulté : <span><?php if (count($instrs) > 7)
                                    echo "difficile"; else echo "facile" ?></span>
                            </div>
                        </div>
                        <div class="recette-calorie">
                            <div>
                                <i style="margin-right: 5px;" class="bi bi-dash-circle-fill"></i> cette recette contiane <span>
                                    <?php echo $calorie ?>
                                </span> calories
                            </div>
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>
                        <div class="notation">
                        <?php if ($note == -1) { ?>
                        <a href="?id=<?php echo $details["idRecette"]?>&note=1" ><i value="1" class="bi bi-star notationIcon"></i></a>
                        <a href="?id=<?php echo $details["idRecette"]?>&note=2"><i value="2" class="bi bi-star notationIcon"></i></a>
                        <a href="?id=<?php echo $details["idRecette"]?>&note=3"><i value="3" class="bi bi-star notationIcon"></i></a>
                        <a href="?id=<?php echo $details["idRecette"]?>&note=4"><i value="4" class="bi bi-star notationIcon"></i></a>
                        <a href="?id=<?php echo $details["idRecette"]?>&note=5 "><i value="5" class="bi bi-star notationIcon"></i></a>
                        <?php } else { 
                            for ($j  =0 ; $j < $note ; $j ++) {
                                ?>
                                <a href="?id=<?php echo $details["idRecette"]?>&noteUbdate=<?php echo $j+1 ?>" ><i  value="1" class="bi bi-star-fill notationIcon note"></i></a>
                                <?php
                            }
                            for ($j  = $note ; $j < 5 ; $j ++) {
                                ?>
                                <a href="?id=<?php echo $details["idRecette"]?>&noteUbdate=<?php echo $j+1 ?>" ><i value="1" class="bi bi-star notationIcon "></i></a>
                                <?php
                            }
                             } ?>
                        </div>
                        <?php if ( $isAuth[0]["email"] == $details["idUser"]) { ?>
                        <div class="recette-calorie" style="width: 110px;">
                        <a href="./modifierRecette?id=<?php echo $details["idRecette"] ?>">
                            <div>
                                <i style="margin-right: 5px;color:#FFF" class="bi bi-dash-circle-fill"></i><span style="color: #FFF;">
                                    modifier
                                </span>
                            </div>
                            </a>
                        </div>
                        <?php } ?>
                        <div class="userInfo">

                        </div>
                        <h1>Instructions</h1>
                        <?php
                        foreach ($instrs as $key => $instr) {
                            ?>
                            <div class="etape-item">
                                <div>
                                    <span>
                                        <?php echo $key + 1 ?>
                                    </span>
                                </div>
                                <h5><?php echo $instr["instruction"] ?> </h5>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
    }



    public function inputAutoComplete()
    {
        ?>
            <form class="autocomplete-container" autocomplete="off" action="">
                <div class="autocomplete" style="width:300px;">
                    <input id="myInput" type="text" name="myCountry" placeholder="Ingreedients">
                </div>
                <button type="submit" class="submit">Ajouter</button>
            </form>

            <form style="display: block;" method="post" class="search-recette">
            <div style="display: flex;" class="ingredient-select">

            </div>
                <button style="margin-left : 40%;display : block" sty type="submit" name="submit" class="submit">Chercher</button>
            </form>
            <br/><br>
            <?php
    }

    public function cardsContainer($values)
    {

        ?>
            <div style="display: flex;  flex-wrap: wrap;">
                <?php foreach ($values as $key => $value) { 
                            $prep = isset($value["tempsPreparation"]) ? $value["tempsPreparation"] : 0;
                            $repo = isset($value["tempsReposint"]) ? $value["tempsReposint"] : 0;
                            $cuis = isset($value["tempsCuisson"]) ? $value["tempsCuisson"] : 0;
                            $tot = $repo + $prep + $cuis;?>
                    <div class="cardInfo" style="margin : 20px" categorie="<?php echo $value["nomCategorie"] ?>"
                        fete="<?php echo $value["nomFete"] ?>" saison="<?php if(isset($value['saison'])) echo $value['saison'] ?>" 
                        calories="<?php if(isset($value['calories'])) echo $value['calories'] ?>" >
                        <input type="hidden" value="<?php echo $prep ?>" />
                        <input type="hidden" value="<?php echo $repo ?>" />
                        <input type="hidden" value="<?php echo $cuis ?>" />
                        <input type="hidden" value="<?php echo $tot?>" />
                        <input type="hidden" value="<?php echo $value['notation'] ?>" />
                        <input type="hidden" value="<?php if(isset($value['calories'])) echo $value['calories']?>" />
                        <?php $this->CardRecette($key, $value); ?>
                    </div>
                <?php } ?>
            </div>
            <?php
    }

    public function CardIngredient($values)
    {
        $ingredient = new ingredientController();
        ?>
            <div class="blog-box">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($values as $value) {
                           
                                ?>
                                <div class="col-lg-4 col-md-6 col-12 cardIngredient">
                                    <div class="blog-box-inner">
                                        <div class="blog-img-box">
                                            <img class="img-fluid" src="./assets/slide/slide-1.jpg" alt="">
                                        </div>
                                        <div class="blog-detail">
                                            <h4>
                                                <?php echo $value["nom"] ?>
                                            </h4>
                                            <h6><?php echo $value["descr"] ?></h6>
                                            <div class="border"></div>
                                            <div class="recette-calorie">
                                                <div>
                                                    <i style="margin-right: 5px;" class="bi bi-dash-circle-fill"></i><span>
                                                        <?php echo $value["calories"] ?>
                                                    </span> calories
                                                </div>
                                                <i class="bi bi-lightbulb-fill"></i>
                                            </div>
                                            <div class="vitamine-items">
                                                <?php
                                                $vits = $ingredient->getVitaminsIngredientController($value["nom"]);
                                                foreach ($vits as $vit) {
                                                    ?>
                                                    <div class="vitamine-item">
                                                        <?php echo $vit["sign"] ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="mineral-items">
                                                <?php
                                                $mins = $ingredient->getMinealsIngredientController($value["nom"]);
                                                foreach ($mins as $min) {
                                                    ?>
                                                    <div class="mineral-item">
                                                        <div class="mineral-sign">
                                                            <?php echo $min["sign"] ?>
                                                        </div>
                                                        <span><?php echo $min["nom"] ?></span>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php if ($value["Healthy"] == 1) {
                                                ?>
                                                <a class="btn btn-md btn-circle btn-outline-new-white" href="">Healthy</a>
                                                <?php
                                            }
                                            ?>
                                            <a class="btn btn-md btn-circle btn-outline-new-white" href=""><?php echo $value["saison"] ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            
                        }
                        ?>

                    </div>
                </div>
            </div><?php
    }


    public function seeAll($href){
        ?>
                <div class="viewAllContainer" >
                    <a class="viewAll" href="<?php echo $href ?>" style=""> view tous</a>
                </div>
        <?php
    }








}
?>