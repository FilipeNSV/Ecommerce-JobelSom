<?php
require_once('include/header.php');

use \App\Controller\DisplayHomeController;

$display = new DisplayHomeController;
?><br><br>

<main>
    <!-- Seção 1 Carousel -->
    <section class="d-flex justify-content-center align-items-center h-50 min-vh-50">
        <?php
        $resultS1 = $display->startDisplayS1();
        ?>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="height: 20em;">
                    <div class="carousel-item active">
                        <img src="<?php print_r($resultS1[0]['urlimgcarousel']); ?>" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php print_r($resultS1[1]['urlimgcarousel']); ?>" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php print_r($resultS1[2]['urlimgcarousel']); ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" style="border-radius: 40%;" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon  bg-dark" style="border-radius: 40%;" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section><br><br>

    <!-- Seção 2 -->
    <section class="d-flex justify-content-center align-items-center h-50 min-vh-50">
        <div class="container">
            <div class="row g-3">

                <div class="container" id="titleDestaques">
                    <h2>Produtos em destaque</h2>
                </div>

                <?php
                    $resultS2 = $display->startDisplayS2();
                    while ($resultS2row = $resultS2->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 d-fex p-4 flex-column">
                            <img src="<?php echo $resultS2row['urlimg']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><?php echo $resultS2row['titulo']; ?></h5>
                                <p class="card-text"><?php echo $resultS2row['subtitulo']; ?></p>
                                <a href="#" class="btn mt-auto btn-outline-success">Mais Informações</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section><br>

    <!-- Seção 3(Serviços) -->
    <div class="container">
        <div class="row g-3">
            <div class="container" id="titleServicos">
                <h2>Diversos Serviços com Alta Qualidade</h2>
            </div>

            <div class="col-md-4">
                <div class="h-100 d-flex p-4 flex-column">
                    <img src="../img/banner1.png" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 d-flex p-4 flex-column">
                    <img src="../img/banner2.png" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 d-flex p-4 flex-column">
                    <img src="../img/banner3.png" class="card-img-top" alt="...">
                </div>
            </div>
        </div>

        <?php
        $resultS3 = $display->startDisplayS3();
        ?>

        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active list-group-item-light" id="list-service1-list" data-bs-toggle="list" href="#list-service1" role="tab" aria-controls="list-service1">
                        <?php
                        print_r($resultS3[0]['titulo']);
                        ?>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light" id="list-service2-list" data-bs-toggle="list" href="#list-service2" role="tab" aria-controls="list-service2">
                        <?php
                        print_r($resultS3[1]['titulo']); ?>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light" id="list-service3-list" data-bs-toggle="list" href="#list-service3" role="tab" aria-controls="list-service3">
                        <?php
                        print_r($resultS3[2]['titulo']);
                        ?>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light" id="list-service4-list" data-bs-toggle="list" href="#list-service4" role="tab" aria-controls="list-service4">
                        <?php
                        print_r($resultS3[3]['titulo']);
                        ?>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-service1" role="tabpanel" aria-labelledby="list-service1-list">
                        <?php
                        print_r($resultS3[0]['descricao']);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="list-service2" role="tabpanel" aria-labelledby="list-service2-list">
                        <?php
                        print_r($resultS3[1]['descricao']);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="list-service3" role="tabpanel" aria-labelledby="list-service3-list">
                        <?php
                        print_r($resultS3[2]['descricao']);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="list-service4" role="tabpanel" aria-labelledby="list-service4-list">
                        <?php
                        print_r($resultS3[3]['descricao']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <!-- Seção 4 -->
    <section class="d-flex justify-content-center align-items-center h-50 min-vh-50">
        <div class="container">
            <div class="row g-3">
                <div class="container" id="titleMVendidos">
                    <h2>Mais Vendidos</h2>
                </div>

                <?php
                    $resultS4 = $display->startDisplayS4();
                    while ($resultS4row = $resultS4->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 d-fex p-4 flex-column">
                            <img src="<?php echo $resultS4row['urlimg']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><?php echo $resultS4row['titulo']; ?></h5>
                                <p class="card-text"><?php echo $resultS4row['subtitulo']; ?></p>
                                <a href="#" class="btn mt-auto btn-outline-success">Mais Informações</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section><br>

    <!-- Seção 5 -->
    <section class="d-flex justify-content-center align-items-center h-50 min-vh-50">
        <div class="container">
            <div class="row g-3">
                <div class="container" id="titlePatrocinados">
                    <h2>Patrocinados</h2>
                </div>

                <?php
                    $resultS5 = $display->startDisplayS5();
                    while ($resultS5row = $resultS5->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 d-fex p-4 flex-column">
                            <img src="<?php echo $resultS5row['urlimg']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><?php echo $resultS5row['titulo']; ?></h5>
                                <p class="card-text"><?php echo $resultS5row['subtitulo']; ?></p>
                                <a href="#" class="btn mt-auto btn-outline-success">Mais Informações</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section><br>

</main>

<?php
require_once('include/footer.php');
?>