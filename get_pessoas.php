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

            echo '<a href="#" class="list-group-item"';
              echo '<p><font style="font-weight: bolder">'.$registro['usuario'].' </font> <small>'.$registro['email'].'</small><p>';
            echo '</a>';
        }
    }else{
        echo 'Erro na consulta das pessoas!';
    }

?>