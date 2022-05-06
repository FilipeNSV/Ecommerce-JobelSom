<?php
require_once("include/headerPanel.php");

use App\Controller\DisplayPanelController;
use App\Controller\UserController;
?>

<main class="container" id="main">

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

    <section id="users">

        <div class="container" align="right" id="btnsUsers">

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertUser">
                Cadastrar
            </button>

            <?php
            $user = new UserController;
            $user->userRegister();
            $user->userUpdate();
            $user->userDelete();
            //var_dump($result);            
            ?>

            <div class="modal fade" id="insertUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: black;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Inserir Usuário</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="userFNInsert" placeholder="First Name" required>
                                            <label for="floatingInputGrid">Primeiro Nome</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="userSNInsert" placeholder="Second Name" required>
                                            <label for="floatingInputGrid">Segundo Nome</label>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="userEmailInsert" placeholder="name@example.com" required>
                                    <label for="floatingInputGrid">Email</label>
                                </div><br>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="userPassInsert" placeholder="password" required>
                                    <label for="floatingInputGrid">Senha</label>
                                </div><br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="btnUserInsert" value="Insert">Cadastrar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div><br>

        <table class="table" id="tableUsers">
            <thead>
                <tr class="table-dark">
                    <h4 id="titleUsers"><span class="badge bg-dark">Tabela de Usuários</span></h4>
                    <th scope="col">ID</th>
                    <th scope="col">1º Nome</th>
                    <th scope="col">2º Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
            $ObDisplay = new DisplayPanelController;
            $userRows = $ObDisplay->startDisplayPUsers();

            while ($userRow = $userRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $userRow['id']; ?></th>
                        <td><?php echo $userRow['primeironome']; ?></td>
                        <td><?php echo $userRow['segundonome']; ?></td>
                        <td><?php echo $userRow['email']; ?></td>
                        <td><?php echo $userRow['senha']; ?></td>
                        <td><a class="btn btn-sm btn-warning" data-bs-toggle="modal" name="btnAltertUser" data-bs-target="#alterUser">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <a class="btn btn-sm btn-danger" data-bs-toggle="modal" name="btnDeletetUser" data-bs-target="#deletetUser">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>
                            <a type="button" id="btnSelect" name="btnSelectUser" class="btn btn-sm btn-outline-primary" href="userpanelU.php?id=<?php echo $userRow['id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>

            <?php

            $userCon = new UserController;
            $updateRows = $userCon->userSelectReturn();
            while ($updateRow = $updateRows->fetch(PDO::FETCH_ASSOC)) {  ?>

                <div class="modal fade" id="alterUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Alterar Usuário</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="fw-bold">Confira os Dados!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="userIDAlter" readonly placeholder="ID" value="<?php echo $updateRow['id']; ?>">
                                        <label for="floatingInputGrid">ID</label>
                                    </div><br>
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="userFNAlter" placeholder="First Name" value="<?php echo $updateRow['primeironome']; ?>">
                                                <label for="floatingInputGrid">Primeiro Nome</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="userSNAlter" placeholder="Second Name" value="<?php echo $updateRow['segundonome']; ?>">
                                                <label for="floatingInputGrid">Segundo Nome</label>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="userEmailAlter" placeholder="name@example.com" value="<?php echo $updateRow['email']; ?>">
                                        <label for="floatingInputGrid">Email</label>
                                    </div><br>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="userPassAlter" placeholder="password" value="<?php echo $updateRow['senha']; ?>">
                                        <label for="floatingInputGrid">Senha</label>
                                    </div><br>
                                    <h6 class="alert alert-warning text-dark" role="alert">Tem certeza que deseja ALTERAR o item selecionado?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnUserAlter" value="Alter">Alterar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="deletetUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Excluir Usuário</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="fw-bold" style="color: red;">ID selecionado: <?php echo $updateRow['id']; ?></h5>
                                    <hr>
                                    <h6 class="fw-bold">Digite/Confirme o ID!</h6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="userIDDelete" placeholder="ID">
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

</main>

<?php
require_once("include/footerPanel.php");
?>