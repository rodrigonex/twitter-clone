<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php');

    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS padrao_data_inclusao, t.tweet, u.usuario"; 
    $sql.= " FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id)";
    $sql.= " WHERE id_usuario = $id_usuario ";
    $sql.= " OR id_usuario IN (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario )";
    $sql.= " ORDER BY data_inclusao DESC";
    
    $resultado_id = mysqli_query($link, $sql);
  
    if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

            echo '<a href="#" class="list-group-item"';
                echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' - <small>'.$registro['padrao_data_inclusao'].'</small></h4>';
                echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
            echo '</a>';
        }
    }else{
        echo 'Erro na consulta do tweets no banco de dados!';
    }

?>