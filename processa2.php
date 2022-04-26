<?php 
    include("conexao.php");

include("processa.php");

      

        $sql = $conn->query("SELECT LAST_INSERT_ID()");
        $row = $sql->fetch_assoc();
        $res = implode(" ",$row);
        $r = intval($res);
        
        echo $r;
        

        
        $sql = $conn->query("INSERT INTO agendamento VALUES ('', $r', '$p_inicial', '$p_final', '$p_inicial_opt', '$p_final_opt', '', '', '$qtdVisitante', '$qtdVisitante2', '$status', '$status2')");

       
        


    



?>