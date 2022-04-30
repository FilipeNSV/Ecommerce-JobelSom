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
          <div class="card h-100 d-fex p-4 flex-column">
            <a href="product.php?searchProduct=<?php echo $productsRows['titulo']; ?>"><img src="<?php echo $productsRows['urlimg']; ?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
            <a href="product.php?searchProduct=<?php echo $productsRows['titulo']; ?>"><h5 class="card-title mt-3"><?php echo $productsRows['titulo']; ?></h5></a>
              <p class="card-text"><?php echo $productsRows['subtitulo']; ?></p>
              <a href="#" class="btn mt-auto btn-outline-success">Fale Conosco</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>

</nav>
<br>



<?php
require_once('include/footer.php');
?>