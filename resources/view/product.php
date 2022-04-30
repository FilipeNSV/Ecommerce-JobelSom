<?php

use App\Controller\SearchController;

require_once('include/header.php');

$search = new SearchController;

$resultSearch = $search->productSearch();

while ($resultRow = $resultSearch->fetch(PDO::FETCH_ASSOC)) {
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
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
    
  </div>

  <?php } ?>

</section><br>

<?php
require_once('include/footer.php');
?>