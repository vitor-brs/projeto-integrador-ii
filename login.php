<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


    
</head>
<body class="bg-primary">
    
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-dark">
                        <div class="col-6 w-auto p-3 text-center text-white fw-light">
                            <img src="img/logoMuseuBranco.png"><h3><br><br>Museu de Computação ICMC USP<br><br></h3>
                            <br>
                            <img src="img/apple.jpg" width="100%" height="100%">
                            <p>
                                <br><br>
                                
                            </p> 
                        </div>
                    </div>
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 fw-light mb-4">Bem-Vindo!</h1>
                            </div>
                            
                                <form method="POST" action="plogin.php">
                                    <div class="input-group input-group-sm mb-3 col-2 mx-auto">
                                        <span class="input-group-text" >Usuário</span>
                                        <input type="text" id="usuario" name="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                      </div>
                            
                                      <div class="input-group input-group-sm mb-3 col-2 mx-auto">
                                        <span class="input-group-text">Senha</span>
                                        <input type="password" id="pwd" name="pwd" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                      </div>
            
                                      <br>
                                      <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary rounded-pill" type="submit" id="Enviar" >Enviar</button>
                                      </div>
                                      
                                </form>
                                
                            <hr>
                            <div class="text-center">
                                <a class="small" href="index.php">Voltar a página inicial</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>
</html>