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

    <title>MUSEU Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <script>            
    function myFunctionDois() {

        
    document.getElementById("formAgenda").action = "/editar.php";  
    document.getElementById("formAgenda").submit();
                                                
    }

    </script>

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
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
                    <h1 class="h3 mb-2 text-gray-800">Lista Agendamentos</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabela de Agendamentos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mx-auto" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Data cadastro</th>
                                            <th>Visitante</th>
                                            <th>Tipo</th>
                                            <th>De</th>
                                            <th>Até</th>
                                            <th>De(Opcional)</th>
                                            <th>Até(Opcional)</th>
                                            <th>Qtd visitantes</th>
                                            <th>Qtd visitantes 2</th>
                                            <th>Data da visitação</th>
                                            <th>Data da visitação 2</th>
                                            <th>Necessidade especial</th>
                                            <th>Status</th>
                                            <th>Status 2</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Data cadastro</th>
                                            <th>Visitante</th>
                                            <th>Tipo</th>
                                            <th>De</th>
                                            <th>Até</th>
                                            <th>De(Opcional)</th>
                                            <th>Até(Opcional)</th>
                                            <th>Qtd visitantes</th>
                                            <th>Qtd visitantes 2</th>
                                            <th>Data da visitação</th>
                                            <th>Data da visitação 2</th>
                                            <th>Necessidade especial</th>
                                            <th>Status</th>
                                            <th>Status 2</th>
                                            <th>Editar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    
                                <?php


                                include("conexao.php");


                                $sql = $conn->query("SELECT * FROM agendamento, cad_visitante WHERE id_visitante=cad_visitante.id"); 
                                $row = $sql->fetch_assoc();
                                
                                
                                if($row == null){
                                    
                                }else {
                                    echo '';
                                        do{
                                        $divide_dt1 = explode("-",$row["periodo_inicial"]);
                                        $reverte1 = array_reverse($divide_dt1);
                                        $juntadt1 = implode("/", $reverte1);
        
                                        $divide_dt2 = explode("-",$row["periodo_final"]);
                                        $reverte2 = array_reverse($divide_dt2);
                                        $juntadt2 = implode("/", $reverte2);


                                        $divide_dt1_opt = explode("-",$row["periodo_inicial_opt"]);
                                        $reverte1_opt = array_reverse($divide_dt1_opt);
                                        $juntadt1_opt = implode("/", $reverte1_opt);
        
                                        $divide_dt2_opt = explode("-",$row["periodo_final_opt"]);
                                        $reverte2_opt = array_reverse($divide_dt2_opt);
                                        $juntadt2_opt = implode("/", $reverte2_opt);
                                        
                                        

                                        $divide_dtVisita = explode("-",$row["dt_visita"]);
                                        $reverteDtVisita = array_reverse($divide_dtVisita);
                                        $juntaDtVisita = implode("/", $reverteDtVisita);


                                        $divide_dtVisita2 = explode("-",$row["dt_visita2"]);
                                        $reverteDtVisita2 = array_reverse($divide_dtVisita2);
                                        $juntaDtVisita2 = implode("/", $reverteDtVisita2);


                                        $divide_dtCad = explode(" ",$row["dt_cadastro"]);
                                        $divide_dtCad2 = explode("-",$divide_dtCad[0]);
                                        $reverteDtCad = array_reverse($divide_dtCad2);
                                        $juntaDtCad = implode("/", $reverteDtCad);

                                        

                                            echo "<tr>" . "<td>" . $row["id"] . "</td>" . "<td>" . $juntaDtCad . "</td>" . "<td>" . $row["visitante"] . "</td>" . "<td>" . $row["tipo"] . "</td>" . "<td>" . $juntadt1 . "</td>" . "<td>" . $juntadt2 . "</td><td>" . $juntadt1_opt . "</td>" . "<td>" . $juntadt2_opt . "</td><td>" . $row["qtd_visitante"] . "</td>" . "<td>" . $row["qtd_visitante2"] . "</td>" . "<td>" . $juntaDtVisita . "</td>" . "<td>" . $juntaDtVisita2 . "</td>" . "<td>" . $row["especial"]. "</td>" . "<td>" . $row["estatus"] . "</td>" . "<td>" . $row["estatus2"] . "</td>" . '<td>' . '<form method="POST" action="editar.php" id="formAgenda" name="formAgenda">' . '<button value=' . $row["id"] . ' class="btn btn-primary id="btnBlue" name="btnBlue" type="submit"><i class="fas fa-edit"></i></button>' . '</form>' . "</td></tr>";  

                                            
                                        }while($row = $sql->fetch_assoc());

                                                                    
                                    
                                }

                                echo '';
                            
                          
                            
                      $conn->close();
                    ?>
                    


                                    

                                    </tbody>

                                    

                                </table>
                            </div>
                        </div>
                    </div>



                    



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>