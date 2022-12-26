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
    <!-- <link rel="stylesheet" href="./views/styleSheet/login.css"> -->
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
                <h1>BienVenue avec nous</h1>
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
            <p>Don't have an account? <a href="#">Creer nouvelle compte</a> Cela prend moins d’une minute</p>
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

private function Header()
    {
    ?>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    }

private function Carousel()
    {
        ?>
        <div class="carouselContainer" >
        <div style="margin: 40px 0px;" id="carouselExampleIndicators"   class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators "  >
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
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
            <button style="margin-left: -30px;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button style="margin-right: -30px;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next"  >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <?php
    }

private function CardRecette(){
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
public function ShowLoginPage()
    {
    ?>
    <?php
            $this->Entete_Page();
    ?>

    <body>
        <?php
            $this->header();
            $this->Hero();
        $this->Carousel();
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