<?php
	include "include/banco.php";
    
    $login = htmlspecialchars($_POST['login']);
    $senha = htmlspecialchars($_POST['senha']);
    $senha = md5($senha);

    $query = "select setor from usuario where login = '$login' and senha = '$senha' and dados_status = 'ativo' limit 1";
	$cons = mysqli_query($con, $query);
	$total = mysqli_num_rows($cons);
    
    if($usuario = mysqli_fetch_assoc($cons)){
        $setor = $usuario['setor'];
    }
    if($total > 0){
        // esse helpdesk criei para ter a pagina do tecnico, felipe fez de um jeito que perdi a logica.
        if($setor == "administrativo"){
            setcookie ("admin", $login, (time() + (24 * 3600)));
            $fix = date('Ymd');
            $options = [
                'salt' => base64_encode("raiosystems01/2016$fix")
            ];
            $secret_cookie = password_hash($login, PASSWORD_DEFAULT, $options);
            setcookie ("verify", $secret_cookie, (time() + (24 * 3600)));
            session_start();
            
            $_SESSION['login_ok'] = true;
            $_SESSION['nome'] = $login;
            header("Location: panel/homeadmin.php?inicio=");
        }else if($setor == "tecnico"){
            setcookie ("tecnico", "$login", (time() +(24 * 3600)));
            $options = [
                'salt' => base64_encode("raiosystems01/2016")
            ];
            $secret_cookie = password_hash($login, PASSWORD_DEFAULT, $options);
            setcookie ("verify", $secret_cookie, (time() + (24 * 3600)));
            session_start();
            
            $_SESSION['login_ok'] = true;
            $_SESSION['nome'] = $login;
            header("Location: panel/hometech.php?inicio=");
        }else{
            setcookie ("usuario", "$login", (time() + (24 * 3600)));
            $options = [
                'salt' => base64_encode("raiosystems01/2016")
            ];
            $secret_cookie = password_hash($login, PASSWORD_DEFAULT, $options);
            setcookie ("verify", $secret_cookie, (time() + (24 * 3600)));
            session_start();
            
            $_SESSION['login_ok'] = true;
            $_SESSION['nome'] = $login;
            header("Location: panel/homeusuario.php?inicio=");
        }
    }else{
        //mensagem de erro que vai para o script no index
        header("Location:index.php");
    }
 ?>