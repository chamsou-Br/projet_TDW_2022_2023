<?php

require_once("./controllers/authController.php");

class userView
{

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
    <link rel="stylesheet" href="./views/styleSheet/login2.css">
    <link href="./views/styleSheet/hero.css" rel="stylesheet" type="text/css" />




</head>
<?php
    }

    private function LoginScreen()
    {
        $auth = new AuthController();
        if (isset($_POST['email']) && isset($_POST["password"])) {
            echo ($_POST['email']);
            echo ($_POST["password"]);
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
    <div class="right">
        <h5>connecter</h5>
        <p>Vous n'aves pas un compte ? <a href="#">Creer nouvelle compte</a> Cela prend moins d’une minute</p>
        <form method="post">
            <div class="inputs">
                <input type="text" name="email" placeholder="email">
                <br>
                <input type="password" name="password" placeholder="mot de passe">
            </div>

            <br><br>

            <div class="remember-me--forget-password">
                <!-- Angular -->
                <label>
                    <input type="checkbox" name="check" />
                    <span class="text-checkbox">Souvenez-vous de moi</span>
                </label>
                <p>Mot de passe oublié ?</p>
            </div>
            <br>
            <button type="submit" class="submitInput" name="connecter">connexion</button>
        </form>


    </div>

</div>
<!-- partial -->
<?php
    }


    private function HeaderImage($img, $title1, $title2)
    {
?>
<div style="background-image: url(<?php echo $img ?>);" class="header-img">
    <h1><?php echo $title1 ?><span><?php echo ' ' . $title2 ?></span></h1>
</div>
<?php
    }

    private function TitleSection($title1, $title2, $desc)
    {
?>
<div class="section-title">
    <h2><?php echo $title1 ?><span><?php echo " " . $title2 ?></span></h2>
    <p><?php echo $desc ?></p>
</div><?php
    }

    private function Header()
    {
?>
<header id="header" class=" d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            <h1><a href="index.html">Delicious</a></h1>
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

        <a href="#contact-btn" class="contact-btn scrollto">Contact us</a>

    </div>
</header><!-- End Header -->
<?php
    }

    private function Hero()
    {
?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(assets/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>Delicious</span> Restaurant</h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                vel. Minus et tempore modi architecto.</p>
                            <div>
                                <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our
                                    Menu</a>
                                <a href="#book-a-table"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(assets/slide/slide-2.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                vel. Minus et tempore modi architecto.</p>
                            <div>
                                <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our
                                    Menu</a>
                                <a href="#book-a-table"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(assets/slide/slide-3.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                vel. Minus et tempore modi architecto.</p>
                            <div>
                                <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our
                                    Menu</a>
                                <a href="#book-a-table"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                            </div>
                        </div>
                    </div>
                </div>

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
                        idées de recette
                    </a></li>
                <li><a class="nav-link scrollto" href="#contact">
                        Healthy
                    </a></li>
                <li><a class="nav-link scrollto" href="#contact">
                        saisons
                    </a></li>
                <li><a class="nav-link scrollto" href="#contact">
                        fêtes
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

    private function Carousel($title2)
    {
?>
<div class="carouselContainer">

    <div style="margin: 40px 0px;" id="<?php echo $title2 ?>" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators ">
            <button type="button" data-bs-target="#<?php echo $title2 ?>" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#<?php echo $title2 ?>" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#<?php echo $title2 ?>" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="padding: 0 20px;">
            <div class="carousel-item active">
                <div style="display: flex;padding : 50px 30px">
                    <?php
        $this->CardRecette();
        $this->CardRecette();
        $this->CardRecette();
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div style="display: flex;padding : 50px 30px">
                    <?php
        $this->CardRecette();
        $this->CardRecette();
        $this->CardRecette();
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div style="display: flex;padding : 50px 30px">
                    <?php
        $this->CardRecette();
        $this->CardRecette();
        $this->CardRecette();
                    ?>
                </div>
            </div>
        </div>
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

    private function FilterButtons($filters)
    {
?>
<div class="row">
    <div class="col-lg-12">
        <div class="special-menu text-center">
            <div class="button-group filter-button-group">
                <button class="active" data-filter="*">All</button>
                <?php foreach ($filters as $value) { ?>
                <button data-filter="*"><?php echo ($value) ?></button>
                <?php
        }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    }

    private function Gallerie($nom)
    {
?>
<div class="gallery">
    <div class="section-title">
        <h2>quelque picture de <span><?php echo " " . $nom ?></span></h2>
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
    private function CardRecette()
    {
?>
<div class="card" style="width: 18rem;">
    <div class="card-image" style="background-image: url(assets/rec1.jpg)"></div>
    <div class="box">
        <span>01</span>
        <h4>Lorem Ipsum</h4>
        <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
    </div>

</div>
<?php
    }

    private function News()
    {
?>

<div class="swiper-slide events">
    <div class="row event-item">
        <div class="col-lg-6">
            <img src="assets/rec1.jpg" style="z-index: 20;" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Custom Parties</h3>
            <div class="price">
                <p><span>$99</span></p>
            </div>
            <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua.
            </p>
            <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            </ul>
            <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
            </p>
        </div>
    </div>
</div>
<?php
    }

    private function Diaporama($images)
    {
     ?>
<div class="diaporama">
    <header id="slideshow">
        <div class="slide-wrapper">

            <!-- Define each of the slides
       and write the content -->

            <?php foreach ($images as $image) {
       ?>
            <div class="slide" style="background-image: url(<?php echo ($image) ?>); background-size: cover;">
                <div class="slide-cover">
                    <?php $this->News() ?>
                </div>

            </div>
            <?php

        } ?>
            <div class="slide" style="background-image: url(<?php echo (reset($images)) ?>); background-size: cover;">
            </div>

        </div>
    </header>
</div>
<?php
    }
    private function DetaialsRecette()
    {
        ?>
<div>
    <div class="row">
        <div class="col-lg-4 ingredient">
            <div class="recette-img">
                <img src="./assets/slide/slide-1.jpg" />
            </div>
            <div class="userInfo">
                <h5><i style="color: #6c665c;" class="bi bi-person-circle"></i> chamsou Br</h5>
                <h5>4.5 <i class="bi bi-star-fill"></i></h5>
            </div>
            <h1>Ingredient</h1>
            <div class="etape-item">
                <div>
                    <span>1</span>
                </div>
                <h5>400g from tomato and botato </h5>
            </div>
            <div class="etape-item">
                <div>
                    <span>2</span>
                </div>
                <h5>1 orange non traitée et 100 g d’écorces d’oranges confites coupées en petits dés</h5>
            </div>
            <div class="etape-item">
                <div>
                    <span>3</span>
                </div>
                <h5>1L from oil </h5>
            </div>
            <div class="etape-item">
                <div>
                    <span>4</span>
                </div>
                <h5>coffe of water </h5>
            </div>
        </div>
        <div class="col-lg-8 etape">
            <div class="recette-info">
                <h1>Bourek à la viande hachée</h1>
                <p>Le bourek est une pâtisserie salée que l’on trouve régulièrement sur les tables du Ramadan en
                    Turquie. Cette gourmandise est constituée d’une feuille de yufka (comparable aux feuilles de brick,
                    mais plus épaisse), farcie avec la préparation de votre choix et roulée sous forme de cigare. Nous
                    vous proposons aujourd’hui de réaliser de délicieux boureks à la viande hachée</p>
            </div>
            <div class="recette-time">
                <div>
                    Prep : <span>10 min</span>
                </div>
                <div>
                    Repo : <span>20 min</span>
                </div>
                <div>
                    Cuiss : <span>10 min</span>
                </div>
                <div>
                    Total : <span>40 min</span>
                </div>
            </div>
            <div class="recette-calorie">
                <div>
                    <i style="margin-right: 5px;" class="bi bi-dash-circle-fill"></i> cette recette contiane <span> 102
                    </span> calories
                </div>
                <i class="bi bi-lightbulb-fill"></i>
            </div>
            <h1>Instructions</h1>
            <div class="etape-item">
                <div>
                    <span>1</span>
                </div>
                <h5>Émincez finement l’oignon et faites-le suer dans un filet d’huile d’olive. Ajoutez la viande hachée
                    , faites revenir quelques minutes puis salez et poivrez. Ajoutez les épices. Remuez avec une
                    cuillère en bois pour bien détacher la viande </h5>
            </div>
            <div class="etape-item">
                <div>
                    <span>2</span>
                </div>
                <h5>Faites chauffer 1 c. à soupe d'huile d'olive dans une poêle.</h5>
            </div>
            <div class="etape-item">
                <div>
                    <span>3</span>
                </div>
                <h5>Versez 40 cl d'eau puis le cube de bouillon et laissez cuire à feu moyen en remuant de temps en
                    temps</h5>
            </div>

        </div>
    </div>
</div>
<?php
    }
    public function ShowNewsScreen()
    {
?>
<?php
        $this->Entete_Page();
?>



<body>
    <?php
        $this->header();
        $this->Diaporama(["./assets/slide/slide-1.jpg", "./assets/slide/slide-2.jpg", './assets/slide/slide-3.jpg']);
        $this->Menu();
        $this->TitleSection("check our", "new recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $this->Carousel("News");
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
    }
    public function ShowHealthyScreen()
    {
?>
<?php
        $this->Entete_Page();
?>



<body>
    <?php
        $this->header();
        $this->HeaderImage("assets/slide/slide-2.jpg", "Bonne santé avec", "Delcious");
        $this->Menu();
        $this->TitleSection("check our", "Healthy Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $this->Carousel("fete");
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
    }
    public function ShowSaisonScreen()
    {
?>
<?php
        $this->Entete_Page();
?>



<body>
    <?php
        $this->header();
        $this->HeaderImage("assets/slide/slide-2.jpg", "Recettes natural avec", "Delcious");
        $this->Menu();
        $this->TitleSection("check our", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $this->FilterButtons(["L'ete", "le printemp", "l'hiver", "l'autumn"]);
        $this->Carousel("fete");
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
    }

    private function inputAutoComplete(){
        ?>
        <form class="autocomplete-container" autocomplete="off" action="">
            <div class="autocomplete" style="width:300px;">
                <input id="myInput" type="text" name="myCountry" placeholder="Ingreedients">
            </div>
            <button type="submit" class="submit">Ajouter</button>          
        </form>
        <div class="ingredient-select">

         </div>
         <form class="search-recette">
         <button type="submit2" class="submit">Chercher</button> 
         </form>
        <?php
    }
    public function ShowIdeeRecettesPage(){
        ?>
        <?php
                $this->Entete_Page();
        ?>
        
        
        
        <body>
            <?php
                $this->header();
                $this->HeaderImage("assets/slide/slide-2.jpg", "Chercher Recettes avec", "Delcious");
                $this->Menu();
                
                $this->TitleSection("check our", "Recettes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $this->inputAutoComplete();
                $this->Carousel("fete");
            ?>
            <script src="./views/script/hero.js"></script>
            <script src="./views/script/autoComplete2.js"></script>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </body>
        <?php 
    }
    public function ShowFeteScreen()
    {
?>
<?php
        $this->Entete_Page();
?>



<body>
    <?php
        $this->header();
        $this->HeaderImage("assets/slide/slide-2.jpg", "Fetes avec", "Delcious");
        $this->Menu();
        $this->TitleSection("check our", "Fetes", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $this->FilterButtons(["mariage", "circoncision", "Aid", "Achoura"]);
        $this->Carousel("fete");
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
    }
    private function CardIngredient(){
        ?>
        	<div class="blog-box">
		<div class="container">
        <div class="row">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="blog-box-inner">
            <div class="blog-img-box">
                <img class="img-fluid" src="./assets/slide/slide-1.jpg" alt="">
            </div>
            <div class="blog-detail">
                <h4>sucre glace</h4>
                <h6>this ingredient is good ingr h kl qsk sp donc il faur</h6>
                <div class="border"></div>
                <div class="recette-calorie">
                    <div>
                        <i style="margin-right: 5px;" class="bi bi-dash-circle-fill"></i><span> 102 </span> calories
                    </div>
                    <i class="bi bi-lightbulb-fill"></i>
                </div>
                <div class="vitamine-items">
                    <div class="vitamine-item">A1</div><div class="vitamine-item">A2</div><div class="vitamine-item">D2</div><div class="vitamine-item">D2</div><div class="vitamine-item">B2</div><div class="vitamine-item">B1</div><div class="vitamine-item">K</div><div class="vitamine-item">C1</div>
                </div>
                <div class="mineral-items">
                    <div class="mineral-item">
                        <div class="mineral-sign">Ca</div>
                        <span>Calcium</span>
                    </div>
                    <div class="mineral-item">
                        <div class="mineral-sign">Ch</div>
                        <span>Chloride</span>
                    </div>
                    <div class="mineral-item">
                        <div class="mineral-sign">Mg</div>
                        <span>Magnes</span>
                    </div>
               </div>
                <a  class="btn btn-md btn-circle btn-outline-new-white" href="">Healthy</a>
                <a class="btn btn-md btn-circle btn-outline-new-white" href="">Saison</a>
            </div>
        </div>
    </div>
    
        </div></div>
</div><?php
    }
    public function ShowNutritionPage()
    {
?>
?>
<?php
        $this->Entete_Page();
?>
<body>
    <?php
        $this->header();
        $this->HeaderImage("assets/slide/slide-2.jpg", "Ingredients in", "Delcious");
        $this->Menu();
        $this->TitleSection("check our", "Ingredients", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
       $this->CardIngredient()
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php

    }
    public function ShowLoginPage()
    {
    ?>
<?php
        $this->Entete_Page();
?>



<body>
    <?php
        $this->header();
        $this->HeaderImage("assets/slide/slide-2.jpg", "Delcios", "Restaurant");
        $this->Menu();
        // $this->DetaialsRecette();
        // $this->Gallerie("Bourek ");
        $this->TitleSection("check our", "plats", "Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.");
        $this->Carousel("id1");
        $this->Carousel("id2");
        $this->Carousel("id3");
    ?>
    <script src="./views/script/hero.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
    }

}
?>