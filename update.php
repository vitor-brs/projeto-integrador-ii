<?php 
    include("conexao.php");
    $visitante = $_POST["Nome"];
    $selectgrupos = $_POST["selectgrupos"];
    $tel = $_POST["Telefone"];
    $email = $_POST["email"];
    $qtdVisitante = $_POST["qtdVisitante"];
    $qtdVisitante2 = $_POST["qtdVisitante2"];
    $p_inicial = $_POST["campo_p_inicial"];
    $p_final = $_POST["campo_p_final"];
    $p_inicial_opt = $_POST["campo_p_inicial_opt"];
    $p_final_opt = $_POST["campo_p_final_opt"];
    $status = $_POST["selectstatus"];
    $status2 = $_POST["selectstatus2"];
    
    $dataVisitacao = $_POST["data_visitacao"];
    $dataVisitacao2 = $_POST["data_visitacao2"];
    

    $necessidade = $_POST["necessidade"];

    if (isset($_POST["flexRadioDefault"]) == "on"){
      $especial = "Sim";
    }else {
      $especial = "Não";
    }

    
      $v = $_POST["idCadastro"];

      
      
      $sql = $conn->query("UPDATE cad_visitante INNER JOIN agendamento ON cad_visitante.id = agendamento.id_visitante SET visitante = '$visitante', telefone = '$tel', email = '$email', tipo = '$selectgrupos', especial = '$especial', necessidade = '$necessidade', periodo_inicial = '$p_inicial', periodo_final = '$p_final', periodo_inicial_opt = '$p_inicial_opt', periodo_final_opt = '$p_final_opt', dt_visita = '$dataVisitacao', dt_visita2 = '$dataVisitacao2', qtd_visitante = '$qtdVisitante', qtd_visitante2 = '$qtdVisitante2', estatus = '$status', estatus2 = '$status2' WHERE cad_visitante.id='$v'");
      
      //header ("location: agenda.php"); 
      echo "<script>window.location.href='agenda.php'</script>";

    


    $conn->close();
?>