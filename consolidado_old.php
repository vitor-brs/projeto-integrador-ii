<?php
session_start();
 if($_SESSION["autenticado"] != "logado"){
            session_destroy();
            //header ("location: error.php");
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
                        <a class="collapse-item" href="agenda.php">Agenda</a>
                        
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
                        <a class="collapse-item active" href="consolidado.php">Consolidado</a>

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
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                        
                    </div>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Relatório Consolidado de visitantes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mx-auto" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Ano</th>
                                            <th>Janeiro</th>
                                            <th>Fevereiro</th>
                                            <th>Março</th>
                                            <th>Abril</th>
                                            <th>Maio</th>
                                            <th>Junho</th>
                                            <th>Julho</th>
                                            <th>Agosto</th>
                                            <th>Setembro</th>
                                            <th>Outubro</th>
                                            <th>Novembro</th>
                                            <th>Dezembro</th>
                                            <th>Total Ano</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Ano</th>
                                            <th>Janeiro</th>
                                            <th>Fevereiro</th>
                                            <th>Março</th>
                                            <th>Abril</th>
                                            <th>Maio</th>
                                            <th>Junho</th>
                                            <th>Julho</th>
                                            <th>Agosto</th>
                                            <th>Setembro</th>
                                            <th>Outubro</th>
                                            <th>Novembro</th>
                                            <th>Dezembro</th>
                                            <th>Total Ano</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    
                                <?php
                                include_once("conexao.php");
                                    $sql = $conn->query("SELECT DISTINCT EXTRACT(YEAR FROM dt_visita) as datas from agendamento WHERE dt_visita <> '' ");
                                    $row = $sql->fetch_assoc();
                                    
                                    $r_ano = $row["datas"];
                                    $sql = $conn->query("SELECT COUNT(DISTINCT EXTRACT(YEAR FROM dt_visita)) as datac from agendamento WHERE dt_visita <> '' ");
                                    $row = $sql->fetch_assoc();
                                    $contador = $row["datac"];
                                    
                                    $c = 1;
                                do{
                                    
                                    
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano FROM agendamento WHERE YEAR(dt_visita) = $r_ano ");
                                    if($sql != null){
                                    $row = $sql->fetch_assoc();
                                    $total_ano = $row["total_ano"];
                                    }else {
                                       $total_ano = 0; 
                                    }
                                    

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano ");
                                    if($sql != null){
                                    $row = $sql->fetch_assoc();
                                    $total_ano2 = $row["total_ano2"];
                                    }else {
                                        $total_ano2 = 0;
                                    }
                                    

                                    
                                    $totalano = $total_ano + $total_ano2;

                                    //*******DADOS GRAFICOS */

                                    
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_jan1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '01' ");
                                    
                                    if ($sql == null){
                                        $n_jan1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                        $n_jan1 = $row["total_ano_jan1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_jan2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '01' ");
                                    
                                    if ($sql == null){
                                        $n_jan2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                        $n_jan2 = $row["total_ano_jan2"];
                                    }
                                    $n_jan =  $n_jan1 +  $n_jan2;
                                    /******FEVEREIRO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_fev1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '02' ");
                                    
                                    if ($sql == null){
                                        $n_Fevereiro1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Fevereiro1 = $row["total_ano_fev1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_fev2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '02' ");
                                    
                                    if ($sql == null){
                                        $n_Fevereiro2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Fevereiro2 = $row["total_ano_fev2"];
                                    }
                                    $n_Fevereiro = $n_Fevereiro1 + $n_Fevereiro2;
                                    /******MARÇO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_mar1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '03' ");
                                    
                                    if ($sql == null){
                                        $n_Marco1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Marco1 = $row["total_ano_mar1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_mar2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '03' ");
                                    
                                    if ($sql == null){
                                        $n_Marco2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Marco2 = $row["total_ano_mar2"];
                                    }
                                    $n_Marco = $n_Marco1 + $n_Marco2;
                                    /******ABRIL */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_abr1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '04' ");
                                    
                                    if ($sql == null){
                                        $n_Abril1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Abril1 = $row["total_ano_abr1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_abr2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '04' ");
                                    
                                    if ($sql == null){
                                        $n_Abril2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Abril2 = $row["total_ano_abr2"];
                                    }
                                    $n_Abril = $n_Abril1 + $n_Abril2;
                                    /******MAIO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_mai1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '05' ");
                                    
                                    if ($sql == null){
                                        $n_Maio1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Maio1 = $row["total_ano_mai1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_mai2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '05' ");
                                    
                                    if ($sql == null){
                                        $n_Maio2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Maio2 = $row["total_ano_mai2"];
                                    }
                                    $n_Maio = $n_Maio1 + $n_Maio2;
                                    /******JUNHO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_jun FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '06' AND estatus = 'Compareceu' ");
                                    
                                    if ($sql == null){
                                        $n_Junho1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Junho1 = $row["total_ano_jun"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_jun2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '06' AND estatus2 = 'Compareceu' ");
                                    
                                    if ($sql == null){
                                        $n_Junho2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Junho2 = $row["total_ano_jun2"];
                                    }

                                    $n_Junho = $n_Junho1 + $n_Junho2;

                                    /******JULHO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_jul1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '07' ");
                                    
                                    if ($sql == null){
                                        $n_Julho1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Julho1 = $row["total_ano_jul1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_jul2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '07' ");
                                    
                                    if ($sql == null){
                                        $n_Julho2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Julho2 = $row["total_ano_jul2"];
                                    }
                                    $n_Julho = $n_Julho1 + $n_Julho2;
                                    /******AGOSTO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_ago1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '08' ");
                                    
                                    if ($sql == null){
                                        $n_Agosto1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Agosto1 = $row["total_ano_ago1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_ago2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '08' ");
                                    
                                    if ($sql == null){
                                        $n_Agosto2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Agosto2 = $row["total_ano_ago2"];
                                    }
                                    $n_Agosto = $n_Agosto1 + $n_Agosto2;
                                    /******SETEMBRO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_set1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '09' ");
                                    
                                    if ($sql == null){
                                        $n_Setembro1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Setembro1 = $row["total_ano_set1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_set2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '09' ");
                                    
                                    if ($sql == null){
                                        $n_Setembro2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Setembro2 = $row["total_ano_set2"];
                                    }
                                    $n_Setembro = $n_Setembro1 + $n_Setembro2;
                                    /******OUTUBRO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_out1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '10' ");
                                    
                                    if ($sql == null){
                                        $n_Outubro1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Outubro1 = $row["total_ano_out1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_out2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '10' ");
                                    
                                    if ($sql == null){
                                        $n_Outubro2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Outubro2 = $row["total_ano_out2"];
                                    }
                                    $n_Outubro = $n_Outubro1 + $n_Outubro2;
                                    /******NOVEMBRO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_nov1 FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '11' ");
                                    
                                    if ($sql == null){
                                        $n_Novembro1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Novembro1 = $row["total_ano_nov1"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_nov2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '11' ");
                                    
                                    if ($sql == null){
                                        $n_Novembro2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Novembro2 = $row["total_ano_nov2"];
                                    }
                                    $n_Novembro = $n_Novembro1 + $n_Novembro2;
                                    /******DEZEMBRO */
                                    $sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_dez FROM agendamento WHERE YEAR(dt_visita) = $r_ano AND MONTH(dt_visita) = '12' ");
                                    
                                    if ($sql == null){
                                        $n_Dezembro1 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Dezembro1 = $row["total_ano_dez"];
                                    }

                                    $sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_dez2 FROM agendamento WHERE YEAR(dt_visita2) = $r_ano AND MONTH(dt_visita2) = '12' ");
                                    
                                    if ($sql == null){
                                        $n_Dezembro2 = 0;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $n_Dezembro2 = $row["total_ano_dez2"];
                                    }
                                    $n_Dezembro = $n_Dezembro1 + $n_Dezembro2;


                                
                                echo "<tr><td>" . $r_ano . "</td><td>" . $n_jan . "</td><td>" . $n_Fevereiro . "</td><td>" . $n_Marco . "</td><td> " . $n_Abril . "</td><td>" . $n_Maio . "</td><td>" . $n_Junho . "</td><td>" . $n_Julho . "</td><td>" . $n_Agosto . "</td><td>" . $n_Setembro . "</td><td>" . $n_Outubro . "</td><td>" . $n_Novembro . "</td><td>" . $n_Dezembro . "</td><td>" . $totalano . "</td></tr>";  


                                    $sql = $conn->query("SELECT DISTINCT EXTRACT(YEAR FROM dt_visita) as datas from agendamento WHERE dt_visita <> '' AND YEAR(dt_visita) > $r_ano");
                                    
                                    if ($sql == null){
                                        break;
                                    }else{
                                        $row = $sql->fetch_assoc();
                                    $r_ano = $row["datas"];
                                        
                                    }
                                    
                                    $c++;

                                    }while ($c <= (int)$contador);

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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
</body>

</html>