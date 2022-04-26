<?php 
    include("conexao.php");

    if($_POST["rm"] != null){
      $v = $_POST["rm"];
    
      $sql = $conn->query("DELETE cad_visitante FROM cad_visitante INNER JOIN agendamento ON agendamento.id_visitante = cad_visitante.id WHERE cad_visitante.id=$v");
      //header ("location: agenda.php"); 
      echo "<script>window.location.href='agenda.php'</script>";

     
     }

     
     
      

    


    $conn->close();
?>