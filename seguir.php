<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php');

    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $seguir_id_usuario = $_POST['seguir_id_usuario'];

    if($seguir_id_usuario != '' && $id_usuario != ''){

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario)values($id_usuario, $seguir_id_usuario) ";
        
        mysqli_query($link, $sql);
    }

?>