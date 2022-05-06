<?php

use App\Controller\SearchController;

require_once('include/header.php');

$search = new SearchController;

$resultSearch = $search->productSearchTitle();

$resultRow = $resultSearch->fetch(PDO::FETCH_ASSOC);
?><br>

<section>
  <div class="container">

    <div class="container" id="titleDestaques">
      <h2><?php echo $resultRow['titulo']; ?></h2>
    </div><br>

    <div class="card mb-3" style="max-width: 100%;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $resultRow['urlimg']; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $resultRow['subtitulo']; ?></h5>
            <p class="card-text"><?php echo $resultRow['descricao']; ?></p>
          </div>
          <div style="margin: 0 0 15px 15px;">
            <a href="https://wa.me/5587988429906" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> WhatsApp </a><br>
            <span class="badge bg-primary"><i class="fa-solid fa-phone"></i> (87) 3861-0480</span><br>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-3" style="max-width: 100%;">
      <div class="row g-0">
        <div class="card-body">
          <h5 class="card-title"><?php echo $resultRow['titulodesc']; ?></h5>
          <p class="card-text"><?php echo $resultRow['descricaocomp']; ?></p>
        </div>
      </div>
    </div>

    <a href="#" id="btnTopo" class="btn btn-success"><i class="fa-solid fa-arrow-up"></i></a>

  </div>

</section><br><br>

<section class="d-flex justify-content-center align-items-center h-50 min-vh-50">
  <div class="container">
    <div class="row g-3">

      <div class="container" id="titleDestaques">
        <h2>Produtos Similares</h2>
      </div>

      <?php

      while ($resultRow = $resultSearch->fetch(PDO::FETCH_ASSOC)) {
      ?>

        <div class="col-md-4 col-lg-3">
          <div class="card text-center h-100 d-fex p-4 flex-column">
            <img src="<?php echo $resultRow['urlimg']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title mt-3"><?php echo $resultRow['titulo']; ?></h5>
              <p class="card-text"><?php echo $resultRow['subtitulo']; ?></p>
              <a href="product.php?searchProduct=<?php echo $resultRow['titulo']; ?>" class="btn mt-auto btn-outline-success">Mais Informações</a>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>
</section><br>

<?php
require_once('include/footer.php');
?>