<!DOCTYPE html>
<html>
<head>
	<title>GV_EAD</title>
</head>
<body id="back-black">
<div class="direita">
	<h3>Questionário</h3>
	<h1><?php echo $aula_info['pergunta']?></h1>
	
	<form method="POST">
		<input type="radio" name="opcao" value="1" id="opcao1">
		<label class="num" for="opcao1"><?php echo $aula_info['opcao1']?></label><br><br>

		<input type="radio" name="opcao" value="2" id="opcao2">
		<label class="num" for="opcao2"><?php echo $aula_info['opcao2']?></label><br><br>

		<input type="radio" name="opcao" value="3" id="opcao3">
		<label class="num" for="opcao3"><?php echo $aula_info['opcao3']?></label><br><br>

		<input type="radio" name="opcao" value="4" id="opcao4">
		<label class="num" for="opcao4"><?php echo $aula_info['opcao4']?></label><br><br>

		<input type="submit" value="enviar">
	</form>

	<?php if(isset($resposta)):?>
		<?php if($resposta):?>
			<?php header("Location:".BASE."cursos/entrar/".$curso->getIdCurso())?>
		<?php else:?>
			<script>
				alert("Vixe tu errou feio tente de novo")
				window.location.href=window.location.href
			</script>
		<?php endif;?>
	<?php endif;?>
</div> 
</body>
</html>
