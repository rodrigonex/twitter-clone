<?php

	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0; 
?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="./style/style.css">
	
		<script>
			// código javascript	
			$(document).ready(function () {

				//verificar se os campos login e senha foram devidamente preenchidos
				$('#btn_login').click(function() {

					var campo_vazio = false;

					if($('#campo_usuario').val() == ''){
						$('#campo_usuario').css({'border-color': '#a94442'});
						campo_vazio = true;	
					}else{
						$('#campo_usuario').css({'border-color': '#ccc'});	
					}

					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color': '#a94442'});
						campo_vazio = true;	
					}else{
						$('#campo_senha').css({'border-color': '#ccc'});	
					}	
					
					if(campo_vazio) return false;
				});

			})					
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="logo">               
			<span><img src="./imagens/icone_twitter.png" /> </span>
	    </nav>


	    <div class="containerflex">
			<form method="post" action="validar_acesso.php" id="formLogin">
				<h1>Entrar no Twitter</h1>
				<div class="form-group">
					<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Nome de Usuário" />
				</div>
								
				<div class="form-group">
					<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
				</div>
								
				<button type="buttom" class="btn btn-primary" id="btn_login" style="width: 100%;">Entrar</button>

		
				<div class="outros">
					<a href="#">Esqueceu sua senha?</a> -
					<a href="inscrevase.php">Inscrever-se no Twitter</a>
				</div>
				<?php
				if($erro == 1) echo '<font color-"#ff0000" Usuário e ou senha inválido(s).</font>';
				?>
			</form>
	      <!-- Main component for a primary marketing message or call to action -->
		</div>

		</div>
	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>