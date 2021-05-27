<?php

    require_once('db.class.php');


    $login = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    //verificar se o usuario já existe
    $sql = " select * from usuarios where usuario = '$login' ";

    if( $resultado_id = mysqli_query($link, $sql)) {

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['usuario'])){
            $usuario_existe = true;
        }
    }else{
        echo 'Erro ao tentar localizar o registro do usuario';
    }

    //verificar se a senha já existe
    
    $sql = " select * from usuarios where email = '$email' ";

    if( $resultado_id = mysqli_query($link, $sql)) {

        $dados_email = mysqli_fetch_array($resultado_id);

        if(isset($dados_email['email'])){
            $email_existe = true;
        }
    }else{
        echo 'Erro ao tentar localizar o registro de email';
    }

   if($usuario_existe || $email_existe){

        $retorno_get = '';

        if($usuario_existe){
            $retorno_get.= "erro_usuario=1&";     
        }

        if($email_existe){
            echo'dentro do if';
            $retorno_get.= "erro_email=1&";  
        }
        
        header('Location: inscrevase.php?'.$retorno_get);
        die();
    }

    $sql = " insert into usuarios(usuario, email, senha) values ('$login', '$email', '$senha') ";

    //exercutar a query
    if(mysqli_query($link, $sql)){
        echo'Usuário registrado com sucesso!';
        
        header('Location: index.php?erro=1');
        
    }else{
        echo 'Erro ao registrar usuário!';
    }
    
?>