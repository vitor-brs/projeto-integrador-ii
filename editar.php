<?php
        session_start();
       if($_SESSION["autenticado"] != "logado"){
            session_destroy();
            echo "<script>window.location.href='error.php'</script>";
            exit();
        }
        $tokenUsuario = md5('seg' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        if($_SESSION["sessao"] != $tokenUsuario){
            session_destroy();
            echo "<script>window.location.href='error.php'</script>";
            exit();
        }
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <?php
        
            
            if ($_POST["btnBlue"] == null){
                echo "<script>window.location.href='error_nao_encontrado.php'</script>";
                
            }else {
                include("conexao.php");                      

                $idVisitante = $_POST["btnBlue"];
                                                                
                $sql = $conn->query("SELECT * FROM cad_visitante INNER JOIN agendamento ON cad_visitante.id = agendamento.id_visitante WHERE cad_visitante.id=$idVisitante;");
                                                        
                $row = $sql->fetch_assoc();

                $conn->close();
            }
            
            
                            
                   
        
  
    ?>



    <title>MUSEU Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Museu Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index_dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informações
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>Visitantes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ações:</h6>
                        <a class="collapse-item active" href="agenda.php">Agenda</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-file-alt"></i>
                    <span>Relatórios</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Customizados:</h6>
                        <a class="collapse-item" href="consolidado.php">Consolidado</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                
                <p class="text-center mb-2"><strong>MUSEU Admin</strong> Desenvolvido por alunos da UNIVESP para ICMC USP Museu de Computação</p>
                
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Editar visitantes</h1>
                        <form method="POST" action="remove.php" id="formEditar2" name="formEditar2">
                        <button id="rm" name="rm" value='<?php echo $row["id_visitante"]?>' onclick="funcaoRm()" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Excluir registro</button>
                        </form>
                                
                    </div>

                    <script>
                        function funcaoRm(){
                            document.getElementById("formEditar2").submit();
                            alert("Registro Excluído com sucesso!")
                        }
                    </script>
                    


                    
                    
                    <form method="POST" action="update.php" id="formEditar" name="formEditar">
                            
                        <div class="row">
                                    <div class="col-lg-6">    
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Dados do visitantes</h6>
                                                </div>
                                                <div class="card-body">

                                                <div class="row col-12 mx-auto">
                                                    <div class="col-md">
                                                                <div class="form-floating">
                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <span class="input-group-text">Data Cadastro</span>
                                                                        <input type="text" id="dataCadastro" name="dataCadastro" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["dt_cadastro"]?>' disabled>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md">
                                                                <div class="form-floating">
                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <span class="input-group-text">ID</span>
                                                                        <input type="text" id="idCadastro" name="idCadastro" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["id_visitante"]?>'>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>

                                                <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" >Nome Visitante*</span>
                                                        <input type="text" id="Nome" name="Nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["visitante"]?>' required>
                                                </div>


                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect01">Tipo Instituição*</label>
                                                    <select class="form-select" required aria-label="Default select example" id="selectgrupos" name="selectgrupos">
                                                        <option value='<?php echo $row["tipo"]?>'><?php echo $row["tipo"]?></option>
                                                        <option value="Escola pública de ensino fundamental">Escola pública de ensino fundamental</option>
                                                        <option value="Escola pública de ensino médio">Escola pública de ensino médio</option>
                                                        <option value="Escola pública de ensino fundamental e médio">Escola pública de ensino fundamental e médio</option>
                                                        <option value="Escola privada de ensino fundamental">Escola privada de ensino fundamental</option>
                                                        <option value="Escola privada de ensino médio">Escola privada de ensino médio</option>
                                                        <option value="Escola privada de ensino fundamental e médio">Escola privada de ensino fundamental e médio</option>
                                                        <option value="Instituição pública de ensino superior">Instituição pública de ensino superior</option>
                                                        <option value="Instituição privada de ensino superior">Instituição privada de ensino superior</option>
                                                        <option value="Empresa pública">Empresa pública</option>
                                                        <option value="Empresa privada">Empresa privada</option>
                                                        <option value="ONG - Organização não governamental">ONG - Organização não governamental</option>
                                                        <option value="Outros">Outros</option>
                                                    </select>
                                                </div>

                                                <div class="input-group input-group-sm mb-3 d-flex justify-content-start">
                                                        <span class="input-group-text">Telefone(Opcional)</span>
                                                        <input type="text" id="Telefone" name="Telefone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["telefone"]?>'>
                                                </div>
                                            
                                                <div class="input-group input-group-sm mb-3 d-flex justify-content-start" >
                                                        <span class="input-group-text">E-mail*</span>
                                                        <input type="text" class="form-control" id="email" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["email"]?>' required>
                                                </div>
                                                
                                                <div class="input-group input-group-sm mb-3 mx-auto" >
                                                            <span class="input-group-text">Quantidade de visitantes*</span>
                                                            <input type="text" class="form-control" id="qtdVisitante" name="qtdVisitante" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["qtd_visitante"]?>' required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3 mx-auto" >
                                                            <span class="input-group-text">Quantidade de visitantes segunda visita</span>
                                                            <input type="text" class="form-control" id="qtdVisitante2" name="qtdVisitante2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["qtd_visitante2"]?>' required>
                                                </div>
                                                
                                                
                                                <div class="row align-items-start border mx-auto">
                                                            
                                                            <div class="col">

                                                                <p>Possui necessidade especial?*</p> 

                                                            </div>
                                                            <div class="col">
                                                                
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" onclick="funcaoCheck()">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                    Sim
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2" onclick="funcaoCheck2()">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                    Não
                                                                    </label>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="input-group input-group-sm mb-3 p-3 mx-auto" >
                                                                <span class="input-group-text">Indique qual necessidade</span>
                                                                <input type="text" class="form-control" id="necessidade" name="necessidade" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["necessidade"]?>'>
                                                            </div>
                                                        
                                                </div>                                                




                                                </div> <!-- card-body -->
                                            </div> <!-- card -->
                                    </div> <!-- col -->
                                    <div class="col-lg-6">    
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Período de Visitação</h6>
                                                </div>
                                                <div class="card-body">


                                                <div class="col-md">
                                                    <div class="form-floating">
                                                        <div class="input-group input-group-sm mb-3 col-6 mx-auto">
                                                        <span class="input-group-text">Data Visitação</span>
                                                            <input type="date" id="data_visitacao" name="data_visitacao" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["dt_visita"]?>'>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md">
                                                    <div class="form-floating">
                                                    <div class="input-group mb-3 col-6 mx-auto">
                                                        <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                                        <select class="form-select" aria-label="Default select example" id="selectstatus" name="selectstatus">
                                                        <option value='<?php echo $row["estatus"]?>'><?php echo $row["estatus"]?></option>
                                                        <option value="Agendado">Agendado</option>
                                                        <option value="Cancelado">Cancelado</option>
                                                        <option value="Ausente">Ausente</option>
                                                        <option value="Compareceu">Compareceu</option>
                                                        </select>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>




                                                <h2 class="mb-3 text-center fw-light"></h2>
                                                        <h6 class="mb-3 text-center fw-light">Indique o período de datas que deseja agendar</h6>
                                                        <div class="d-grid gap-2 col-9 mx-auto">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">De*</span>
                                                                <input type="date" class="form-control" placeholder="Data Inicial" id="campo_p_inicial" name="campo_p_inicial" value='<?php echo $row["periodo_inicial"]?>' required>
                                                                <span class="input-group-text">Até*</span>
                                                                <input type="date" class="form-control" placeholder="Data Final" id="campo_p_final" name="campo_p_final" value='<?php echo $row["periodo_final"]?>' required>
                                                            </div>
                                                        </div>



                                                        <div class="col-md">
                                                            <div class="form-floating">
                                                                <div class="input-group input-group-sm mb-3 col-6 mx-auto">
                                                                <span class="input-group-text">Data Segunda Visitação </span>
                                                                    <input type="date" id="data_visitacao2" name="data_visitacao2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value='<?php echo $row["dt_visita2"]?>'>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="col-md">
                                                            <div class="form-floating">
                                                            <div class="input-group mb-3 col-6 mx-auto">
                                                                <label class="input-group-text" for="inputGroupSelect01">Status segunda visita</label>
                                                                <select class="form-select" aria-label="Default select example" id="selectstatus2" name="selectstatus2">
                                                                <option value='<?php echo $row["estatus2"]?>'><?php echo $row["estatus2"]?></option>
                                                                <option value="Agendado">Agendado</option>
                                                                <option value="Cancelado">Cancelado</option>
                                                                <option value="Ausente">Ausente</option>
                                                                <option value="Compareceu">Compareceu</option>
                                                                </select>
                                                                </div>
                                                                
                                                            </div>
                                                            </div>


                                            
                                                        <h6 class="mb-3 text-center fw-light">Indique o segundo período de datas que deseja agendar(Opcional)</h6>
                                                        <div class="d-grid gap-2 col-9 mx-auto">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">De</span>
                                                                <input type="date" class="form-control" placeholder="Data Inicial" id="campo_p_inicial_opt" name="campo_p_inicial_opt" value='<?php echo $row["periodo_inicial_opt"]?>'>
                                                                <span class="input-group-text">Até</span>
                                                                <input type="date" class="form-control" placeholder="Data Final" id="campo_p_final_opt" name="campo_p_final_opt" value='<?php echo $row["periodo_final_opt"]?>'>
                                                            </div>
                                                        </div>




                                                </div>
                                            </div>
                                    </div>

                                
                            </div>
                                
                            

                            <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                    <button class="btn btn-primary rounded-pill" onclick="funcaoSubmit()" id="Alterar" name="Alterar">Alterar dados do visitante</button>
                            </div>
                    </form>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <script>
             
            let verificaCheck = "<?php echo $row["especial"];?>"
            
                if (verificaCheck == "Sim"){
                    document.getElementById("flexRadioDefault").checked = true
                    document.getElementById("necessidade").required = true
                    
                    
                }
                if (verificaCheck == "Não") {
                    document.getElementById("flexRadioDefault2").checked = true             
                    
                }
            
            


            function funcaoCheck(){
              
              let inputSim = document.getElementById("flexRadioDefault");

              if (inputSim.checked == true){
                
                document.getElementById("flexRadioDefault2").checked = false
                document.getElementById("necessidade").required = true
                
              }
            }

            function funcaoCheck2(){
              let inputNao = document.getElementById("flexRadioDefault2");
              if (inputNao.checked == true){
                document.getElementById("flexRadioDefault").checked = false
                document.getElementById("necessidade").required = false
                document.getElementById("necessidade").value = "";
                
              }

            }



            function funcaoSubmit() {

  
                var verificaChkbox = document.getElementById("flexRadioDefault")
              if (verificaChkbox.checked){
                    
                    document.getElementById("necessidade").required = true
                    var necessita = document.getElementById("necessidade")
                    
                    
                }

              if (iNome == "" || selectedValue == "" || iEmail == "" || iQtdVisitante == "" || iDtInicial == "" || iDtFinal == "" || necessita.value == ""){
                alert("Preencha todos os campos marcados com *, para continuar!")
                
              }else{
                
                document.getElementById("formEditar").submit();
                
              }
              
            }
          </script>







            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ICMC USP Museu de Computação 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Encerrar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" se estiver pronto para encerrar a sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



</body>

</html>