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
    


<!------------------------------------------------------------------------------------------->
<?php
include_once("conexao.php");


//ANO
$ano = new DateTime('NOW');
$result_ano = $ano->format('Y');


$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano FROM agendamento WHERE YEAR(dt_visita) = '$result_ano'");
$row = $sql->fetch_assoc();
$total_ano = $row["total_ano"];

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano'");
$row = $sql->fetch_assoc();


$total_ano2 = $row["total_ano2"];
$totalano = $total_ano + $total_ano2;

//MÊS
$result_mes = $ano->format('m');
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_mes FROM agendamento WHERE MONTH(dt_visita) = '$result_mes' ");
$row = $sql->fetch_assoc();
// echo "visitou no mes";
// echo $row["total_mes"];
$total_mes = $row["total_mes"];

$sql = $conn->query("SELECT SUM(qtd_visitante) as total_mes2 FROM agendamento WHERE MONTH(dt_visita2) = '$result_mes' ");
$row = $sql->fetch_assoc();
$total_mes2 = $row["total_mes2"];

$totalmes = $total_mes + $total_mes2;
//DIA
$result_dia = $ano->format('d');
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_dia FROM agendamento WHERE DAY(dt_visita) = '$result_dia' ");
$row = $sql->fetch_assoc();
// echo "visitou:";
// echo $row["total_dia"];


//AGENDADOS
$result_dia = $ano->format('Y-m-d');
$sql = $conn->query("SELECT COUNT(agendamento.estatus) as total_dia_agendado FROM agendamento INNER JOIN cad_visitante ON cad_visitante.id = agendamento.id_visitante WHERE agendamento.estatus = 'Agendado' AND '$result_dia' BETWEEN agendamento.periodo_inicial AND agendamento.periodo_final ");
$row = $sql->fetch_assoc();

$total_dia_agendado1 = $row["total_dia_agendado"];


$sql = $conn->query("SELECT COUNT(agendamento.estatus2) as total_dia_agendado2 FROM agendamento INNER JOIN cad_visitante ON cad_visitante.id = agendamento.id_visitante WHERE agendamento.estatus2 = 'Agendado' AND '$result_dia' BETWEEN agendamento.periodo_inicial_opt AND agendamento.periodo_final_opt ");
$row = $sql->fetch_assoc();
$total_dia_agendado2 = $row["total_dia_agendado2"];

$total_dia_agendado = $total_dia_agendado1 + $total_dia_agendado2;
//MÊS CANCELADOS OU AUSENTES
$result_mes = $ano->format('m');
$sql = $conn->query("SELECT DISTINCT COUNT(DISTINCT(agendamento.estatus = 'Cancelado')) as total_cancelados1 FROM agendamento WHERE MONTH(agendamento.periodo_inicial) AND MONTH(agendamento.periodo_final) BETWEEN '$result_mes' AND '$result_mes' ");
$row = $sql->fetch_assoc();

$total_cancelados1 = $row["total_cancelados1"];

$sql = $conn->query("SELECT SUM(agendamento.estatus2 = 'Cancelado') as total_cancelados2 FROM agendamento WHERE MONTH(periodo_inicial_opt) AND MONTH(periodo_final_opt) BETWEEN '$result_mes' AND '$result_mes' ");
$row = $sql->fetch_assoc();

$total_cancelados2 = $row["total_cancelados2"];



$result_mes = $ano->format('m');
$sql = $conn->query("SELECT SUM(agendamento.estatus = 'Ausente') as total_ausentes1 FROM agendamento WHERE MONTH(periodo_inicial) AND MONTH(periodo_final) BETWEEN '$result_mes' AND '$result_mes' ");
$row = $sql->fetch_assoc();

$total_ausentes1 = $row["total_ausentes1"];

$sql = $conn->query("SELECT SUM(agendamento.estatus = 'Ausente') as total_ausentes2 FROM agendamento WHERE MONTH(periodo_inicial_opt) AND MONTH(periodo_final_opt) BETWEEN '$result_mes' AND '$result_mes' ");
$row = $sql->fetch_assoc();

$total_ausentes2 = $row["total_ausentes2"];

$int_cast1 = (int)$total_cancelados1;
$int_cast2 = (int)$total_cancelados2;

$int_cast3 = (int)$total_ausentes1;
$int_cast4 = (int)$total_ausentes2;
$somaCancelados = $int_cast1 + $int_cast2 + $int_cast3 + $int_cast4;



//*******DADOS GRAFICOS */

$result_ano = $ano->format('Y');
$result_mes = $ano->format('m');
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_jan1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '01' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_jan1"] == null){
    $n_jan1 = 0;
}else{
    $n_jan1 = $row["total_ano_jan1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_jan2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '01' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_jan2"] == null){
    $n_jan2 = 0;
}else{
    $n_jan2 = $row["total_ano_jan2"];
}
$n_jan =  $n_jan1 +  $n_jan2;
/******FEVEREIRO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_fev1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '02' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_fev1"] == null){
    $n_Fevereiro1 = 0;
}else{
$n_Fevereiro1 = $row["total_ano_fev1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_fev2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '02' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_fev2"] == null){
    $n_Fevereiro2 = 0;
}else{
$n_Fevereiro2 = $row["total_ano_fev2"];
}
$n_Fevereiro = $n_Fevereiro1 + $n_Fevereiro2;
/******MARÇO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_mar1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '03' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_mar1"] == null){
    $n_Marco1 = 0;
}else{
$n_Marco1 = $row["total_ano_mar1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_mar2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '03' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_mar2"] == null){
    $n_Marco2 = 0;
}else{
$n_Marco2 = $row["total_ano_mar2"];
}
$n_Marco = $n_Marco1 + $n_Marco2;
/******ABRIL */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_abr1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '04' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_abr1"] == null){
    $n_Abril1 = 0;
}else{
$n_Abril1 = $row["total_ano_abr1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_abr2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '04' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_abr2"] == null){
    $n_Abril2 = 0;
}else{
$n_Abril2 = $row["total_ano_abr2"];
}
$n_Abril = $n_Abril1 + $n_Abril2;
/******MAIO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_mai1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '05' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_mai1"] == null){
    $n_Maio1 = 0;
}else{
$n_Maio1 = $row["total_ano_mai1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_mai2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '05' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_mai2"] == null){
    $n_Maio2 = 0;
}else{
$n_Maio2 = $row["total_ano_mai2"];
}
$n_Maio = $n_Maio1 + $n_Maio2;
/******JUNHO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_jun FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '06' AND estatus = 'Compareceu' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_jun"] == null){
    $n_Junho1 = 0;
}else{
$n_Junho1 = $row["total_ano_jun"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_jun2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '06' AND estatus2 = 'Compareceu' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_jun2"] == null){
    $n_Junho2 = 0;
}else{
$n_Junho2 = $row["total_ano_jun2"];
}

$n_Junho = $n_Junho1 + $n_Junho2;

/******JULHO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_jul1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '07' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_jul1"] == null){
    $n_Julho1 = 0;
}else{
$n_Julho1 = $row["total_ano_jul1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_jul2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '07' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_jul2"] == null){
    $n_Julho2 = 0;
}else{
$n_Julho2 = $row["total_ano_jul2"];
}
$n_Julho = $n_Julho1 + $n_Julho2;
/******AGOSTO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_ago1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '08' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_ago1"] == null){
    $n_Agosto1 = 0;
}else{
$n_Agosto1 = $row["total_ano_ago"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_ago2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '08' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_ago2"] == null){
    $n_Agosto2 = 0;
}else{
$n_Agosto2 = $row["total_ano_ago2"];
}
$n_Agosto = $n_Agosto1 + $n_Agosto2;
/******SETEMBRO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_set1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '09' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_set1"] == null){
    $n_Setembro1 = 0;
}else{
$n_Setembro1 = $row["total_ano_set1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_set2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '09' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_set2"] == null){
    $n_Setembro2 = 0;
}else{
$n_Setembro2 = $row["total_ano_set2"];
}
$n_Setembro = $n_Setembro1 + $n_Setembro2;
/******OUTUBRO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_out1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '10' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_out1"] == null){
    $n_Outubro1 = 0;
}else{
$n_Outubro1 = $row["total_ano_out1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_out2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '10' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_out2"] == null){
    $n_Outubro2 = 0;
}else{
$n_Outubro2 = $row["total_ano_out2"];
}
$n_Outubro = $n_Outubro1 + $n_Outubro2;
/******NOVEMBRO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_nov1 FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '11' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_nov1"] == null){
    $n_Novembro1 = 0;
}else{
$n_Novembro1 = $row["total_ano_nov1"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_nov2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '11' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_nov2"] == null){
    $n_Novembro2 = 0;
}else{
$n_Novembro2 = $row["total_ano_nov2"];
}
$n_Novembro = $n_Novembro1 + $n_Novembro2;
/******DEZEMBRO */
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_ano_dez FROM agendamento WHERE YEAR(dt_visita) = '$result_ano' AND MONTH(dt_visita) = '12' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_dez"] == null){
    $n_Dezembro1 = 0;
}else{
$n_Dezembro1 = $row["total_ano_dez"];
}

$sql = $conn->query("SELECT SUM(qtd_visitante2) as total_ano_dez2 FROM agendamento WHERE YEAR(dt_visita2) = '$result_ano' AND MONTH(dt_visita2) = '12' ");
$row = $sql->fetch_assoc();
if ($row["total_ano_dez2"] == null){
    $n_Dezembro2 = 0;
}else{
$n_Dezembro2 = $row["total_ano_dez2"];
}
$n_Dezembro = $n_Dezembro1 + $n_Dezembro2;

/**********CHECK NECESSIDADE ESPECIAL */
$result_dia_e = $ano->format('Y-m-d');
$sql = $conn->query("SELECT COUNT(agendamento.estatus) as total_especial1 FROM agendamento INNER JOIN cad_visitante ON cad_visitante.id = agendamento.id_visitante WHERE cad_visitante.especial = 'Sim' AND agendamento.estatus = 'Agendado' AND '$result_dia_e' BETWEEN agendamento.periodo_inicial AND agendamento.periodo_final ");
$row = $sql->fetch_assoc();
if ($row["total_especial1"] == null){
    $total_especial1 = 0;
}else{
$total_especial1 = $row["total_especial1"];
}
$sql = $conn->query("SELECT COUNT(agendamento.estatus2) as total_especial2 FROM agendamento INNER JOIN cad_visitante ON cad_visitante.id = agendamento.id_visitante WHERE cad_visitante.especial = 'Sim' AND agendamento.estatus2 = 'Agendado' AND '$result_dia_e' BETWEEN agendamento.periodo_inicial_opt AND agendamento.periodo_final_opt ");
$row = $sql->fetch_assoc();
if ($row["total_especial2"] == null){
    $total_especial2 = 0;
}else{
$total_especial2 = $row["total_especial2"];
}
$total_especial = $total_especial1 + $total_especial2;


/***************TOTAL ANO */

$conn->close();
?>

<!------------------------------------------------------------------------------------------->
<?php

echo "<script>

var totalano = $totalano

var n_jan = $n_jan
var n_Fevereiro = $n_Fevereiro
var n_Marco = $n_Marco
var n_Abril = $n_Abril
var n_Maio = $n_Maio
var n_Junho = $n_Junho
var n_Julho = $n_Julho
var n_Agosto = $n_Agosto
var n_Setembro = $n_Setembro
var n_Outubro = $n_Outubro
var n_Novembro = $n_Novembro
var n_Dezembro = $n_Dezembro


</script>";

?>

<!------------------------------------------------------------------------------------------->


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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<?php
$dia_hoje = new DateTime('NOW');
$hoje = $ano->format('d-m-Y');
echo '<h4 class="h4 mb-0 text-gray-800">Data:' . $hoje . '</h4>';
?>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de Visitantes (Mensal)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalmes; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total de Visitantes (Anual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalano; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Agendados para hoje
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_dia_agendado; ?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Cancelados ou ausentes(Mensal)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $somaCancelados; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-times fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            
                        <!-- Bar Chart -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Visitas por mês no ano(<?php echo $result_ano;?>)</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    
                                </div>
                            </div>



                            <!-- Background Gradient Utilities -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Necessidades Especiais
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                        if ($total_especial > 0){
                                            echo '<div class="px-3 py-5 bg-gradient-warning text-gray-900"><STRONG>Olá! Hoje teremos ' . $total_especial . ' grupo(s) visitante(s) com necessidades especiais</STRONG></div>';
                                        }else {
                                            echo '<div class="px-3 py-5 bg-gradient-success text-white">' . $total_especial . ' Registro de grupos visitantes com necessidades especiais para hoje!</div>';
                                        }
                                    ?>
                                    
                                    
                                </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    
</body>

</html>