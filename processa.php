<?php 
    include("conexao.php");

      //$dt_cad = $_POST["data_cadastro"];
      $objDateTime = new DateTime('NOW');
      $result = $objDateTime->format('Y-m-d H:i:s');
      $dt_cad = $result;
      $visitante = htmlspecialchars($_POST["Nome"], ENT_QUOTES, 'UTF-8');
      $selectgrupos = htmlspecialchars($_POST["selectgrupos"], ENT_QUOTES, 'UTF-8');
      $tel = htmlspecialchars($_POST["Telefone"], ENT_QUOTES, 'UTF-8');
      $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
      $qtdVisitante = htmlspecialchars($_POST["qtdVisitante"], ENT_QUOTES, 'UTF-8');
      $qtdVisitante2 = htmlspecialchars($_POST["qtdVisitante2"], ENT_QUOTES, 'UTF-8');
      $p_inicial = htmlspecialchars($_POST["campo_p_inicial"], ENT_QUOTES, 'UTF-8');
      $p_final = htmlspecialchars($_POST["campo_p_final"], ENT_QUOTES, 'UTF-8');
      $p_inicial_opt = htmlspecialchars($_POST["campo_p_inicial_opt"], ENT_QUOTES, 'UTF-8');
      $p_final_opt = htmlspecialchars($_POST["campo_p_final_opt"], ENT_QUOTES, 'UTF-8');
      $status = htmlspecialchars($_POST["status"], ENT_QUOTES, 'UTF-8');
      $status2 = htmlspecialchars($_POST["status2"], ENT_QUOTES, 'UTF-8');
      // $especial = $_POST["especial"];
      $necessidade = htmlspecialchars($_POST["necessidade"], ENT_QUOTES, 'UTF-8');

      if ($_POST["flexRadioDefault2"] == "on"){
        $especial = "Não";
      }else {
        $especial = "Sim";
      }

      
      
      if ($visitante == null || $selectgrupos == "Selecione o tipo de organização" || $email == null || $qtdVisitante == null || $p_inicial == null || $p_final == null){
       header ("location: index.php");
        
       
      }else {
               
        $sql = $conn->query("INSERT INTO cad_visitante (dt_cadastro, visitante, telefone, email, tipo, especial, necessidade) VALUES ('$dt_cad', '$visitante', '$tel', '$email', '$selectgrupos', '$especial', '$necessidade')");
        
        // $sql = $conn->query("SELECT id FROM cad_visitante WHERE dt_cadastro = '$dt_cad' AND visitante = '$visitante'");
        $sql = $conn->query("SELECT LAST_INSERT_ID()");
        $row = $sql->fetch_assoc();
        $res = implode(" ",$row);
        $r = intval($res);
        
        //$sql = $conn->query("INSERT INTO agendamento (id_visitante, periodo_inicial, periodo_final, periodo_inicial_opt, periodo_final_opt, dt_visita, dt_visita2, qtd_visitante, qtd_visitante2, estatus, estatus2) VALUES ('$r', '$p_inicial', '$p_final', '$p_inicial_opt', '$p_final_opt', '', '', '$qtdVisitante', '$qtdVisitante2', '$status', '$status2')");
        //
        
        $sql = $conn->query("INSERT INTO agendamento (id_visitante, periodo_inicial, periodo_final, periodo_inicial_opt, periodo_final_opt, dt_visita, dt_visita2, qtd_visitante, qtd_visitante2, estatus, estatus2) VALUES ('$r', '$p_inicial', '$p_final', '$p_inicial_opt', '$p_final_opt', '', '', '$qtdVisitante', '$qtdVisitante2', '$status', '$status2')");
       

        
        echo "<script>window.location.href='aviso.php'</script>";
      }

    


    $conn->close();
?>