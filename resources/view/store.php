<?php
require_once('include/header.php');

use App\Controller\StoreController;
?><br>

<nav class="navbar navbar-expand-lg navbar-light">

  <div class="container">

    <div class="row g-3">

      <div class="container" id="titleDestaques">
        <h2>Produtos</h2>
      </div>
      <?php
      $store = new StoreController;
      $productsRow = $store->startStore();

      while ($productsRows = $productsRow->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="col-md-4 col-lg-3">
          <div class="card text-center h-100 d-fex p-4 flex-column">
            <img src="<?php echo $productsRows['urlimg']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title mt-3"><?php echo $productsRows['titulo']; ?></h5>
              <p class="card-text"><?php echo $productsRows['subtitulo']; ?></p>
              <a href="?router=Site/product/<?php echo $productsRows['titulo']; ?>" class="btn mt-auto btn-outline-success">Mais Informações</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <a href="#" id="btnTopo" class="btn btn-success"><i class="fa-solid fa-arrow-up"></i></a>

  </div>

</nav>
<br>



<?php
require_once('include/footer.php');
?>