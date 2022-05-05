<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icon/jobelsom.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <link rel="stylesheet" href="../css/style.css">


    <title>Jobel Som</title>
</head>

<body>

    <header>

        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" style="border: black 2px solid; margin-left: 5px; background-color: white; position: absolute; margin-top: 100px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <div class="container p-1 my-1">
                        <div class="row">
                            <div class="col">
                                <a href="home.php"><img src="../img/logo.png" style="height: 8em;" alt="Logo Jobel Som"></a>
                            </div>
                            <div class="col-6">
                                <form class="d-flex" method="GET" action="product.php" style="padding-top: 40px">
                                    <input class="form-control me-2" name="searchProduct" type="search" placeholder="Busca..." aria-label="Search">
                                    <button class="btn btn-light" type="submit" id="btnSrc"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg></button>
                                </form>
                            </div>
                            <div class="col">
                                <a href="#" class="d-inline justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#btnImgHeader" style="color: white;"><i class="fa-solid fa-credit-card" style="margin-top: 47px; margin-left: 15px;"></i> <i class="fa-solid fa-bag-shopping"></i> VENHA JÁ NOS CONHECER <i class="fa-solid fa-cart-shopping"> <i class="fa-solid fa-shop"></i></i></a>
                            </div>

                            <div class="modal fade" id="btnImgHeader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #dd6d28;">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: white;">NOSSA LOJA!</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-lg">
                                                <div class="form-floating">
                                                    <img style="width: 100%;" src="../img/Jobel1.jpeg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <a href="https://www.google.com/maps/place/Jobel+Som/@-9.3987061,-40.4920536,21z/data=!4m5!3m4!1s0x0:0x88fb06cb1396d92e!8m2!3d-9.3987194!4d-40.4920632" target="_blank" style="color: white; padding-right: 60px;">
                                    <i class="fa-solid fa-map-location-dot"></i> Localização
                                </a>
                            </div>
                            <div class="col-6">
                                <ul class="nav" id="navMenu" style="margin-top: -20px; margin-left: 20px; padding-bottom: 10px;">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Categorias
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="product.php?searchProduct=aparelho" value="aparelho">Aparelhos Automotivos</a></li>
                                            <li><a class="dropdown-item" href="product.php?searchProduct=alto">Alto-Falantes</a></li>
                                            <li><a class="dropdown-item" href="product.php?searchProduct=caixa">Caixas de Som</a></li>
                                            <li><a class="dropdown-item" href="product.php?searchProduct=pelicula">Películas</a></li>
                                            <li><a class="dropdown-item" href="product.php?searchProduct=">Diversos</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item fw-bolder" href="store.php">Toda a Loja</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="home.php#titleServicos">Serviços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="home.php#titleMVendidos">Mais Vendidos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="home.php#titlePatrocinados">Patrocinados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#footer">Contato</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <a href="userpanelP.php" id="btnLoginAdm" class="d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-user-gear" style="color: white;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>

            <div class="row">

                <div class="col">
                    <div class="offcanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="margin-bottom: 45%; background-color: #dd6d28;">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <hr>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php#" style="color: white;">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php#titleServicos" style="color: white;">Serviços</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php#titleMVendidos" style="color: white;">Mais Vendidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php#titlePatrocinados" style="color: white;">Patrocinados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#footer" style="color: white;">Contato</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" href="store.php" style="color: white">Toda a Loja</a>
                                </li>
                            </ul>
                            <form class="d-flex" method="GET" action="product.php" style="padding-top: 40px">
                                <input class="form-control me-2" name="searchProduct" type="search" placeholder="Busca..." aria-label="Search">
                                <button class="btn btn-light" type="submit" id="btnSrc"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-9" id="imgLogoResp">
                    <a href="home.php"><img src="../img/logo.png" style="height: 8em;" alt="Logo Jobel Som"></a>
                </div>
            </div>

        </div>

    </header>