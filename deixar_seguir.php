<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php');

    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

    if($deixar_seguir_id_usuario != '' && $id_usuario != ''){

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = " DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $deixar_seguir_id_usuario ";
        
        mysqli_query($link, $sql);
    }

?>