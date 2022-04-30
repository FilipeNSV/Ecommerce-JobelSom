<?php
require_once("include/headerPanel.php");

use App\Controller\DisplayPanelController;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\SelectRowController;
use App\Controller\PaginationController;
?>

<main class="container" id="main">


    <?php
    $ObDisplayHome = new DisplayPanelController;
    $homeCon = new HomeController;
    $productcon = new ProductController;
    ?>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Tabelas
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="userpanelP.php" id="btnTableProducts">Produtos</a></li>
            <li><a class="dropdown-item" href="userpanelH.php" id="btnTableHome">Home</a></li>
            <li><a class="dropdown-item" href="userpanelU.php" id="btnTableUsers">Usuários</a></li>
        </ul>
    </div><br><br>

    <section id="home">

        <table class="table" id="tableProductsHome">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Produtos</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">URL Imagem</th>
                    <th scope="col">Titulo Desc.</th>
                    <th scope="col">Desc. Comp.</th>
                    <th scope="col">Selec.</th>
                </tr>
            </thead>

            <?php

            $productRows = $ObDisplayHome->startDisplayPProducts((!empty($_GET['page'])) ? $_GET['page'] : 1);

            while ($productRow = $productRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <form action="" method="post">
                            <th scope="row"><?php echo $productRow['id']; ?></th>
                            <td><?php echo $productRow['titulo']; ?></td>
                            <td><?php echo $productRow['subtitulo']; ?></td>
                            <td><?php echo $productRow['descricao']; ?></td>
                            <td><?php echo $productRow['urlimg']; ?></td>
                            <td><?php echo $productRow['titulodesc']; ?></td>
                            <td><?php echo $productRow['descricaocomp']; ?></td>
                            <td><input type="checkbox" class="form-check-input mt-0" name="productID" value="<?php echo $productRow['id']; ?>">
                                <button type="submit" id="btnSelect" name="btnSelectUser" class="btn btn-sm btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                    </svg>
                                </button>
                            </td>
                            </td>
                        </form>
                    </tr>
                </tbody>
            <?php } ?>

            <?php
            $page = new PaginationController;
            $resultPage = $page->paginationProducts((!empty($_GET['page'])) ? $_GET['page'] : 1);
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="userpanelH.php?page=1">Inicio</a></li>
                    <?php for ($i = 0; $i < $resultPage; $i++) {
                        if ($i >= 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="userpanelH.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="userpanelH.php?page=<?php echo $resultPage; ?>"><?php echo $resultPage; ?></a></li>
                    <li class="page-item"><a class="page-link" href="userpanelH.php?page=<?php echo $resultPage; ?>">Fim</a></li>
                </ul>
            </nav>
        </table>

        <table class="table" id="tableHomeS1">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Seção 1 - Carousel</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">URL Imagem</th>
                    <th scope="col">Selec.</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $homeCon->updateS1HById();
            $homeS1Rows = $ObDisplayHome->startDisplayPS1();
            while ($homeS1Row = $homeS1Rows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $homeS1Row['id']; ?></th>
                        <td><?php echo $homeS1Row['titulo']; ?></td>
                        <td><?php echo $homeS1Row['urlimgcarousel']; ?></td>
                        <td>
                            <a type="button" id="btnSelect" name="btnSelect" class="btn btn-sm btn-outline-primary" href="userpanelH.php?id=<?php echo $homeS1Row['id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                </svg>
                            </a>
                        </td>
                        <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnUpdateImg" data-bs-target="#UpdateImg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>

                    </tr>
                </tbody>
            <?php } ?>

            <?php
            $homeCon->updateS1HById();

            $s1updateRows = $homeCon->S1SelectReturn();
            while ($s1updateRow = $s1updateRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="UpdateImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Usuário</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="S1IdUpadate" value="<?php echo $s1updateRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS1TiUpadate" value="<?php echo $s1updateRow['titulo']; ?>">
                                            <label for="floatingInputGrid">Titulo da Imagem</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <label for="floatingInputGrid">Imagem</label>
                                        <input type="file" class="form-control" name="HomeS1ImgUpadate">
                                        URL Imagem atual: <?php echo $s1updateRow['urlimgcarousel']; ?>

                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnHomeS1ImgUpadate" value="Alter">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </table>

        <table class="table" id="tableHomeS2">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Seção 2 - Produtos em destaque</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">URL Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $homeCon->updateS2HById();
            $homeS2Rows = $ObDisplayHome->startDisplayPS2();
            while ($homeS2Row = $homeS2Rows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $homeS2Row['id']; ?></th>
                        <td><?php echo $homeS2Row['titulo']; ?></td>
                        <td><?php echo $homeS2Row['subtitulo']; ?></td>
                        <td><?php echo $homeS2Row['descricao']; ?></td>
                        <td><?php echo $homeS2Row['urlimg']; ?></td>
                        <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnUpdateImgS2" data-bs-target="#UpdateImgS2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>

            <?php
            $productcon = new SelectRowController;
            $updateProdRows = $productcon->selectProduct();
            while ($updateProdRow = $updateProdRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="UpdateImgS2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Seção 2</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="S2IdUpadate" readonly value="<?php echo $updateProdRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="col-sm">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS2TiUpadate" readonly value="<?php echo $updateProdRow['titulo']; ?>">
                                            <label for="floatingInputGrid">Titulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS2SubUpadate" readonly value="<?php echo $updateProdRow['subtitulo']; ?>">
                                            <label for="floatingInputGrid">Subtitulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" name="HomeS2DeUpadate" readonly rows="3"><?php echo $updateProdRow['descricao']; ?></textarea>
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS2ImgUpadate" readonly value="<?php echo $updateProdRow['urlimg']; ?>">
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnHomeS2ImgUpadate" value="Alter">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </table>

        <table class="table" id="tableHomeS3">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Seção 3 - Diversos Serviços com Alta Qualidade</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Selec.</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $homeCon->updateS3HById();
            $homeS3Rows = $ObDisplayHome->startDisplayPS3();
            while ($homeS3Row = $homeS3Rows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $homeS3Row['id']; ?></th>
                        <td><?php echo $homeS3Row['titulo']; ?></td>
                        <td><?php echo $homeS3Row['descricao']; ?></td>
                        <td>
                            <a type="button" id="btnSelect" name="btnSelect" class="btn btn-sm btn-outline-primary" href="userpanelH.php?id=<?php echo $homeS3Row['id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                </svg>
                            </a>
                        </td>
                        <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnUpdateImgS3" data-bs-target="#UpdateImgS3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>

            <?php
            $homeCon->updateS3HById();

            $s3updateRows = $homeCon->S3SelectReturn();
            while ($s3updateRow = $s3updateRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="UpdateImgS3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Seção 3</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="S3IdUpadate" value="<?php echo $s3updateRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="col-sm">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS3TiUpadate" value="<?php echo $s3updateRow['titulo']; ?>">
                                            <label for="floatingInputGrid">Titulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" name="HomeS3DeUpadate" rows="3"><?php echo $s3updateRow['descricao']; ?></textarea>
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnHomeS3ImgUpadate" value="Alter">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </table>

        <table class="table" id="tableHomeS4">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Seção 4 - Mais Vendidos</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">URL Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $homeCon->updateS4HById();
            $homeS4Rows = $ObDisplayHome->startDisplayPS4();
            while ($homeS4Row = $homeS4Rows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $homeS4Row['id']; ?></th>
                        <td><?php echo $homeS4Row['titulo']; ?></td>
                        <td><?php echo $homeS4Row['subtitulo']; ?></td>
                        <td><?php echo $homeS4Row['descricao']; ?></td>
                        <td><?php echo $homeS4Row['urlimg']; ?></td>
                        <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnUpdateImgS4" data-bs-target="#UpdateImgS4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>

            <?php
            $productcon = new SelectRowController;
            $updateProdRows = $productcon->selectProduct();
            while ($updateProdRow = $updateProdRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="UpdateImgS4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Seção 4</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="S4IdUpadate" readonly value="<?php echo $updateProdRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="col-sm">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS4TiUpadate" readonly value="<?php echo $updateProdRow['titulo']; ?>">
                                            <label for="floatingInputGrid">Titulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS4SubUpadate" readonly value="<?php echo $updateProdRow['subtitulo']; ?>">
                                            <label for="floatingInputGrid">Subtitulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" name="HomeS4DeUpadate" readonly rows="3"><?php echo $updateProdRow['descricao']; ?></textarea>
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS4ImgUpadate" readonly value="<?php echo $updateProdRow['urlimg']; ?>">
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnHomeS4ImgUpadate" value="Alter">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </table>

        <table class="table" id="tableHomeS5">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Seção 5 - Patrocinados</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">URL Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $homeCon->updateS5HById();
            $homeS5Rows = $ObDisplayHome->startDisplayPS5();
            while ($homeS5Row = $homeS5Rows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $homeS5Row['id']; ?></th>
                        <td><?php echo $homeS5Row['titulo']; ?></td>
                        <td><?php echo $homeS5Row['subtitulo']; ?></td>
                        <td><?php echo $homeS5Row['descricao']; ?></td>
                        <td><?php echo $homeS5Row['urlimg']; ?></td>
                        <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnUpdateImgS5" data-bs-target="#UpdateImgS5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>

            <?php
            $productcon = new SelectRowController;
            $updateProdRows = $productcon->selectProduct();
            while ($updateProdRow = $updateProdRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="UpdateImgS5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Seção 5</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="S5IdUpadate" readonly value="<?php echo $updateProdRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="col-sm">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS5TiUpadate" readonly value="<?php echo $updateProdRow['titulo']; ?>">
                                            <label for="floatingInputGrid">Titulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS5SubUpadate" readonly value="<?php echo $updateProdRow['subtitulo']; ?>">
                                            <label for="floatingInputGrid">Subtitulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" name="HomeS5DeUpadate" readonly rows="3"><?php echo $updateProdRow['descricao']; ?></textarea>
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="HomeS5ImgUpadate" readonly value="<?php echo $updateProdRow['urlimg']; ?>">
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnHomeS5ImgUpadate" value="Alter">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </table>

    </section>

    <?php
    require_once("include/footerPanel.php");
    ?>