<?php

//essa pagina é somente do admin.
    include "../include/banco.php";
    
    if (password_verify($_COOKIE['tecnico'], $_COOKIE['verify'])){
      #echo 'Password is valid!';
      } else {
        header("Location:sair.php");
        echo 'Invalid password.';
    }


?>


<?php
  if(isset($_GET['resolvtask']) == 1){
      $busca = "UPDATE `chamados` SET `status` = 'Resolvido' WHERE `chamados`.`idchamado` = ". $_GET['resolvtask'] ."";
      $result = mysqli_query($con, $busca);
      $row = mysqli_fetch_array($result);
      header("Refresh:0.1, ../panel/?");
      //print "Veja:". $row[0] ."";
      }
  if(isset($_GET['returntask']) == 1){
      $busca = "UPDATE `chamados` SET `status` = 'Pendente' WHERE `chamados`.`idchamado` = ". $_GET['returntask'] ."";
      $result = mysqli_query($con, $busca);
      $row = mysqli_fetch_array($result);
      header("Refresh:0.1, ../panel/?");
      //print "Veja:". $row[0] ."";
      }
      if(isset($_GET['enviar']) == 1){
        $numaquina = htmlspecialchars($_POST['numaquina']);
        $problema = htmlspecialchars($_POST['problema']);
        $solicitacao = htmlspecialchars($_POST['solicitacao']);
        $descricao = htmlspecialchars($_POST['descricao']); 
        $data = date('y/m/d');
    
        $setor = "SELECT `setor` FROM `usuario` WHERE `nome` = '". $solicitacao ."'";
        $setorcal = mysqli_query($con, $setor);
        $setorcall = mysqli_fetch_array($setorcal);
  
        $buscaid = "SELECT `idusuario` FROM `usuario` WHERE `login` = '". $solicitacao ."'";
        $iduser = mysqli_query($con, $buscaid);
        $idusuario = mysqli_fetch_array($iduser);
        
    
        $insert = "INSERT INTO `chamados` (`idchamado`, `idusuario`, `data`, `setorcall`, `solicitacao`, `descricao`, `problema`, `numaquina`, `status`, `data_resolvido`) VALUES (NULL, '". $idusuario[0] ."', '". $data ."', '". $setorcall[0] ."', '". $solicitacao ."', '". $descricao ."', '". $problema ."', '". $numaquina ."', 'Pendente', '2021-08-08')";
        $result = mysqli_query($con, $insert);
        $row = mysqli_fetch_array($result);
        header("Refresh:0.1, ../panel/?");
        }
    
?>


<html>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/material.min.css">
<script src="../css/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../css/color.css" />
<script src="../css/jquery.min.js"></script>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
<body class="body">
<!-- The drawer is always open in large screens. The header is always shown,
  even in small screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      
    <div class="mdl-layout-spacer">
          <img class=logo src="../img/logo.png">
          <a class=logo-title>ECT - SISTEMA INTEGRADO DE CHAMADOS</a>
        </div>
      
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
      </div>
    </div>
  </header>
  
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title"></span>
    <nav class="mdl-navigation">

    <a class="mdl-navigation__link"><i class="material-icons">account_circle</i><?php echo " - Olá: <b>". $_COOKIE['tecnico'] ."</b>";?></a>

<a class="mdl-navigation__link" href="?inicio="><i class="material-icons">home</i> - Página Inicial</a>
<a class="mdl-navigation__link" href="?abertura="><i class="material-icons">open_in_new</i> - Abertura</a>
<a class="mdl-navigation__link" href="sair.php"><i class="material-icons">logout</i> - Deslogar</a>
<a id="tt1" class="mdl-navigation__link"></a>
      <div class="mdl-tooltip mdl-tooltip--large" data-mdl-for="tt1">
      ramalho.sit@gmail.com
      </div>
    </nav>
  </div>
  <main class="mdl-layout__content">
      <br><p></p></b>
      
    <div class="page-content"><!-- Your content goes here --><center>
    
<br><p></p></b>
      
<?php
        if(isset($_GET['inicio']) == 1){
          include "listagem.php";
          }
        if(isset($_GET['abertura']) == 1){
            include "abertura.php";
            }
        if(isset($_GET['gerenciar']) == 1){
              include "gerenciar.php";
              }
      ?>
        
    </center>   
    </div>

  </main>
</div>
</body>

<style>
  .footer{
    z-index: 1;
  }
</style>
<footer class="footer mdl-mini-footer"></footer>
</html>