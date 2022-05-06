<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon/jobelsom.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/styleLogReg.css">

    <title>User Panel</title>
</head>

<body>
    <!-- header -->
    <header class="header">

        <div class="container-fluid">
            <nav class="navbar navbar-dark">
                <ul class="nav justify-content-center">

                    <div class="col">
                        <a href="home.php"><img src="../img/logo.png" style="height: 8em;" alt="Logo Jobel Som"></a>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php" style="color: white; margin-top: 30px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg></a>
                    </li>

                </ul>
            </nav>
        </div>

    </header><br><br>

    <!-- Login -->
    <form action="../../app/Controller/LoginController.php" method="POST">
        <div class="container shadow" id="login">
            <h1>Login</h1><br>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                <label for="floatingInputGrid">Email</label>
            </div><br>
            <div class="form-floating">
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                <label for="floatingInputGrid">Password</label>
            </div><br>
            <div>
                <input type="submit" class="btn mt-auto btn-outline-success" name="btnLogin" value="Login"></input>
            </div>

        </div><br><br><br><br>
    </form>

</body>

</html>