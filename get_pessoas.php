<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php');

    }

    require_once('db.class.php');

    $nome_pessoa = $_POST['nome_pessoa'];
    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " SELECT * FROM usuarios WHERE usuario LIKE '%$nome_pessoa%' AND id <> $id_usuario  ";
 
    $resultado_id = mysqli_query($link, $sql);
  
    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

            echo '<div href="#" class="list-group-item centraliz"> ';
                echo '<p class="texto">'.$registro['usuario'].'<span> - '.$registro['email'].'</span></p>';
                echo '<p  class="list-group-item-text pull-right">';
                    echo '<button type="button" class="btn btn-default btn_seguir" data-id_usuario="'.$registro['id'].'">Seguir</button>';
                    echo '<button type="button" class="btn btn-primary btn_deixar_seguir" data-id_usuario="'.$registro['id'].'">Deixar de Seguir</button>';
                echo '</p>';
            echo '</div>';
        }
    }else{
        echo 'Erro na consulta das pessoas!';
    }

?>