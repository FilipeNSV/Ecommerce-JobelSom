<?php
require_once("include/headerPanel.php");

use App\Controller\DisplayPanelController;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\PaginationController;
use App\Controller\SelectRowController;

?>

<main class="container" id="main">


    <?php
    $ObDisplayHome = new DisplayPanelController;
    $homeCon = new HomeController;
    ?>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Tabelas
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="?router=Site/userpanelP/" id="btnTableProducts">Produtos</a></li>
            <li><a class="dropdown-item" href="?router=Site/userpanelH/" id="btnTableHome">Home</a></li>
            <li><a class="dropdown-item" href="?router=Site/userpanelU/" id="btnTableUsers">Usuários</a></li>
        </ul>
    </div><br><br>

    <section id="products">

        <div class="container" align="right" id="btnsProduct">

            <?php
            $product = new ProductController;
            $product->productUpdate();
            $product->productDelete();
            ?>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertProduct">
                Cadastrar
            </button>

            <div class="modal fade" id="insertProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="?router=Site/ProductController/" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: black;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Inserir Produto</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="ProductTiInsert">
                                        <label for="floatingInputGrid">Titulo</label>
                                    </div>
                                </div><br>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="ProductSubInsert">
                                        <label for="floatingInputGrid">Subtitulo</label>
                                    </div>
                                </div><br>
                                <div class="col-lg">
                                    <div class="form-floating">
                                        <textarea type="text" class="form-control" name="ProductDeInsert" rows="3"></textarea>
                                        <label for="floatingInputGrid">Descrição</label>
                                    </div>
                                </div><br>
                                <div class="col-md">
                                    <label for="floatingInputGrid">Imagem</label>
                                    <input type="file" class="form-control" name="ProductImgInsert">
                                </div><br>
                                <div class="col-sm">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="ProductTiDInsert">
                                        <label for="floatingInputGrid">Titulo da Descrição Complementar</label>
                                    </div>
                                </div><br>
                                <div class="col-lg">
                                    <div class="form-floating">
                                        <textarea type="text" class="form-control" name="ProductDeCInsert" rows="3"></textarea>
                                        <label for="floatingInputGrid">Descrição Complementar</label>
                                    </div>
                                </div><br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="btnProducInsert" value="Alter">Inserir</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div><br>

        <table class="table" id="tableProducts">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Produtos</span></h4><br>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">URL Imagem</th>
                    <th scope="col">Titulo Desc.</th>
                    <th scope="col">Desc. Comp.</th>
                    <th scope="col">Selec.</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $pag = explode("/", filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
            $productRows = $ObDisplayHome->startDisplayPProducts((!empty($pag[2])) ? $pag[2] : 1);
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
                            <td><input class="form-check-input mt-0" type="checkbox" name="productID" value="<?php echo $productRow['id']; ?>">
                                <button type="submit" id="btnSelect" name="btnSelectUser" class="btn btn-sm btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                    </svg>
                                </button>
                            </td>
                            <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnInsertProduct" data-bs-target="#UpdateProduct">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </a>
                                <a class="btn btn-sm btn-danger" data-bs-toggle="modal" name="btnDeleteProduct" data-bs-target="#deletetProduct">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>
                            </td>
                        </form>
                    </tr>
                </tbody>

            <?php } ?>

            <?php
            $page = new PaginationController;
            $pag = explode("/", filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
            $resultPage = $page->paginationProducts((!empty($pag[2])) ? $pag[2] : 1);
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="?router=Site/userpanelP/1">Inicio</a></li>
                    <?php for ($i = 0; $i < $resultPage; $i++) {
                        if ($i >= 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="?router=Site/userpanelP/<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="?router=Site/userpanelP/<?php echo $resultPage; ?>"><?php echo $resultPage; ?></a></li>
                    <li class="page-item"><a class="page-link" href="?router=Site/userpanelP/<?php echo $resultPage; ?>">Fim</a></li>
                </ul>
            </nav>

            <?php
            $productcon = new SelectRowController;
            $updateProdRows = $productcon->selectProduct();
            while ($updateProdRow = $updateProdRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="UpdateProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Produto</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="ProductIdUpadate" readonly value="<?php echo $updateProdRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="col-sm">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="ProductTiUpadate" value="<?php echo $updateProdRow['titulo']; ?>">
                                            <label for="floatingInputGrid">Titulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="ProductSubUpadate" value="<?php echo $updateProdRow['subtitulo']; ?>">
                                            <label for="floatingInputGrid">Subtitulo</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" name="ProductDeUpadate" rows="3"><?php echo $updateProdRow['descricao']; ?></textarea>
                                            <label for="floatingInputGrid">Descrição</label>
                                        </div>
                                    </div><br>
                                    <div class="col-md">
                                        <label for="floatingInputGrid">Imagem</label>
                                        <input type="file" class="form-control" name="ProductImgUpadate">
                                        URL Imagem atual: <?php echo $updateProdRow['urlimg']; ?>
                                    </div><br>
                                    <div class="col-sm">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="ProductTiDUpadate" value="<?php echo $updateProdRow['titulodesc']; ?>">
                                            <label for="floatingInputGrid">Titulo da Descrição Complementar</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" name="ProductDeCUpadate" rows="3"><?php echo $updateProdRow['descricaocomp']; ?></textarea>
                                            <label for="floatingInputGrid">Descrição Complementar</label>
                                        </div>
                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnProductImgUpadate">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="deletetProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Excluir Usuário</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="fw-bold" style="color: red;">ID selecionado: <?php echo $updateProdRow['id']; ?></h5>
                                    <hr>
                                    <h6 class="fw-bold">Digite/Confirme o ID!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="ProductIDDelete">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <h6 class="alert alert-danger text-dark" role="alert">Tem certeza que deseja EXCLUIR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnUserDelete" value="Delete">Excluir</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </table>



    </section>

    <a href="#" id="btnTopo" class="btn btn-success"><i class="fa-solid fa-arrow-up"></i></a>

</main>

<?php
require_once("include/footerPanel.php");
?>