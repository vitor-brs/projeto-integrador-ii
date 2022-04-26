<?php
include_once("conexao.php");


//ANO
$ano = new DateTime('NOW');
$result_ano = $ano->format('Y');
echo $result_ano;

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
$sql = $conn->query("SELECT SUM(qtd_visitante) as total_dia_agendado FROM agendamento WHERE estatus = 'Agendado' AND periodo_inicial = '$result_dia' AND '$result_dia' <= periodo_final ");
$row = $sql->fetch_assoc();


$total_dia_agendado1 = $row["total_dia_agendado"];

$sql = $conn->query("SELECT SUM(qtd_visitante) as total_dia_agendado2 FROM agendamento WHERE estatus = 'Agendado' AND periodo_inicial_opt = '$result_dia' AND '$result_dia' <= periodo_final_opt ");
$row = $sql->fetch_assoc();
$total_dia_agendado2 = $row["total_dia_agendado2"];

$total_dia_agendado = $total_dia_agendado1 + $total_dia_agendado2;
//MÊS CANCELADOS OU AUSENTES
$result_mes = $ano->format('m');
$sql = $conn->query("SELECT COUNT(*) as total_cancelados1 FROM agendamento WHERE estatus = 'Cancelado' AND MONTH(periodo_inicial) = '$result_mes' AND '$result_mes' <= MONTH(periodo_final) ");
$row = $sql->fetch_assoc();

$total_cancelados1 = $row["total_cancelados1"];

$sql = $conn->query("SELECT COUNT(*) as total_cancelados2 FROM agendamento WHERE estatus = 'Cancelado' AND MONTH(periodo_inicial_opt) = '$result_mes' AND '$result_mes' <= MONTH(periodo_final_opt) ");
$row = $sql->fetch_assoc();

$total_cancelados2 = $row["total_cancelados2"];



$result_mes = $ano->format('m');
$sql = $conn->query("SELECT COUNT(*) as total_ausentes1 FROM agendamento WHERE estatus = 'Ausente' AND MONTH(periodo_inicial) = '$result_mes' AND '$result_mes' <= MONTH(periodo_final) ");
$row = $sql->fetch_assoc();

$total_ausentes1 = $row["total_ausentes1"];

$sql = $conn->query("SELECT COUNT(*) as total_ausentes2 FROM agendamento WHERE estatus = 'Ausente' AND MONTH(periodo_inicial_opt) = '$result_mes' AND '$result_mes' <= MONTH(periodo_final_opt) ");
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
$sql = $conn->query("SELECT COUNT(agendamento.estatus = 'Agendado') as total_especial1 FROM agendamento INNER JOIN cad_visitante ON cad_visitante.id = agendamento.id_visitante WHERE cad_visitante.especial = 'Sim' AND agendamento.periodo_inicial = '$result_dia_e' AND '$result_dia_e' <= agendamento.periodo_final ");
$row = $sql->fetch_assoc();
if ($row["total_especial1"] == null){
    $total_especial1 = 0;
}else{
$total_especial1 = $row["total_especial1"];
}
$sql = $conn->query("SELECT COUNT(agendamento.estatus2 = 'Agendado') as total_especial2 FROM agendamento INNER JOIN cad_visitante ON cad_visitante.id = agendamento.id_visitante WHERE cad_visitante.especial = 'Sim' AND agendamento.periodo_inicial_opt = '$result_dia_e' AND '$result_dia_e' <= agendamento.periodo_final_opt ");
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