<?php 
    include("conexao.php");

    $u = htmlspecialchars($_POST["usuario"], ENT_QUOTES, 'UTF-8');
    $s = sha1($_POST["pwd"]);


      $sql = $conn->query("SELECT * FROM login WHERE login = '$u' AND senha = '$s'");
      $row = $sql->fetch_assoc();
      $user = $row["login"];
      $pwd = $row["senha"];

      if ($user == $u && $pwd == $s){
          session_start();
          $_SESSION["autenticado"] = "logado";
          $_SESSION['sessao'] = md5('seg' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
          
          header ("location: /index_dashboard.php");
      }else {
        
        header ("location: /error_login.php");
      }

    


    $conn->close();
?>