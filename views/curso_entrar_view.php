<!DOCTYPE html>
<html>
<head>
	<title>GV_EAD</title>
	<meta charset="utf-8">
</head>
<body id="back-black"> 
	<div class="container-fluid mt-3"> 
		<div class="row justify-content-center">
			<div class="col-sm-12" id="back-black">
				<h1 class="w-100" style="font-size:60px;word-wrap:break-word;"><?php echo utf8_encode($curso->getNome())?></h1>
				<hr style="background-color:white;">
				<p style="font-size:35px;word-wrap:break-word;"><?php echo utf8_encode($curso->getDescricao())?></p>
			</div>


			<div class="col-sm-9 mt-5">
				<img class="w-100" height="600" src="<?php echo BASE;?>assets/imagens/cursos/<?php echo $curso->getImagem()?>" border="0" >
			</div>
			<div class="col-sm-9 mt-5 mb-5">
				<div id="accordion">
					<div class="card" id="back-black">
						<div class="card-header" style="background-color:black;">
							<button align="center" class="btn btn-lg w-100" data-toggle="collapse" data-target="#area" aria-controls="area" style="color:white;">Modulos</button>
						</div> 
						<div id="area" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<div class="card" style="background-color:#1C1C1C;">
									<?php foreach($modulos as $modulo):?>
										<div class="card-header">
											<button style="color:white;" class="btn w-100" data-toggle="collapse" data-target="#area<?php echo $modulo['id']?>"><?php echo utf8_encode($modulo['nome'])?></button>
										</div>
										
										<div id="area<?php echo $modulo['id']?>" class="collapse">
											<?php foreach($modulo['aulas'] as $aula):?>
												<?php if($modulo['id']===$aula['id_modulo']):?>
													<div class="card-body" id="dark-blue" style="color:white;">
														<?php echo utf8_decode($aula['nome'])?>
													</div>
												<?php endif;?>
											<?php endforeach;?>
										</div>
									<?php endforeach;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
			<div class="col-sm-9">
				
				<?php if(isset($_SESSION['aluno']) && !empty($_SESSION['aluno'])):?>
					<div class="add_curso mb-3">
						<h1>Adicione para ver as aulas</h1>
						<button data-id-aluno="<?php echo $_SESSION['aluno']?>" data-id-curso="<?php echo $curso->getIdCurso()?>" class="btn btn-lg adicionar_curso" style="color:white;background-color:black;height:80px;font-size:25px;">Clique aqui</button>
					</div>
				<?php endif;?>

				<?php if($curso->getClassificacao()!=0):?>
					<h1 class="mb-3">Classificação:<?php echo $curso->getClassificacao()?></h1>
				<?php else:?>
					<h1 class="mb-3">Ainda não foi classificado</h1>
				<?php endif;?>
				<div class="jubotron w-100" style="border:3px solid black;color:white;background-color:#1C1C1C;">
					<h1 class="display-4">Descrição do Professor</h1>
					<?php foreach($professor as $prof):?>
						<div class="media mb-3">
							<?php if(!empty($prof['foto'])):?>
								<img src="<?php echo BASE?>painel/assets/imagens/professores/<?php echo $prof['foto']?>" class="img-fluid avatar mr-3" style="width: 60px;height: 60px;border-radius: 30px;">
							<?php else:?>
								<img class="img-fluid avatar mr-3" src="<?php echo BASE?>assets/imagens/usuario.png" style="width: 40px;height: 40px;border-radius: 20px;">
							<?php endif;?>
							<div class="media-body">
								<h3><?php echo $prof['nome']?></h3>
								<p><?php echo $prof['descricao']?></p>
								<h3 style="margin-top:-10px;"> <small><?php echo $prof['nome']?> tem <?php echo count(array_unique($qtAlunos))?> Alunos</small></h3>
							</div>
						</div>
					<?php endforeach;?>

				</div>
				<div class="card w-100 mt-3" style="border:none;">
					<div class="card-header" id="dark-blue">
						<h1 align="center" class="mt-3"><?php echo $prof['qtCursos']?> Cursos</h1>
					</div>
					<div class="card-body d-flex justify-content-center" id="back-black">
						<div  class="slide carousel w-100" data-ride="carousel" data-interval="2000" id="cursos_professor">
						<div class="carousel-inner">
							<?php foreach($cursos_relacionados as $key=>$cursos):?>
								<?php if($key==0):?>
								<div class="carousel-item active">
									<a href="<?php echo BASE;?><?php
										if(isset($_SESSION['aluno'])){
											echo "cursos/entrar/";
										}else{
											echo "principal_curso/entrar_view/";
										}
									?><?php echo $cursos['id']?>">
										<div class="card" id="dark-blue">
											<img  style="height:600px;" id="relacionado-img" class="card-img-top img-fluid" src="<?php echo BASE;?>assets/imagens/cursos/<?php echo $cursos['imagem']?>">
											<div class="card-body">
												<h5 class="card-title" align="center"><?php echo utf8_encode($cursos['nome'])?></h3>
											</div>
										</div>
									</a>
								</div>
								<?php else:?>
									<div class="carousel-item">
										<a href="<?php echo BASE;?><?php
											if(isset($_SESSION['aluno'])){
												echo "cursos/entrar/";
											}else{
												echo "principal_curso/entrar_view/";
											}
										?><?php echo $cursos['id']?>">
											<div class="card" id="dark-blue">
												<img   style="height:600px;" id="relacionado-img" class="card-img-top img-fluid" src="<?php echo BASE;?>assets/imagens/cursos/<?php echo $cursos['imagem']?>">
												<div class="card-body">
													<h5 class="card-title" align="center"><?php echo utf8_encode($cursos['nome'])?></h3>
												</div>
											</div>
										</a>
									</div>
								<?php endif;?>
							<?php endforeach;?>
						</div>
						<a href="#cursos_professor" class="carousel-control-prev" data-slide="prev" >
							<span class="carousel-control-prev-icon"></span>
						</a>
						<a href="#cursos_professor" class="carousel-control-next" data-slide="next">
							<span class="carousel-control-next-icon"></span>
						</a>
					</div>
				</div>
			</div>
			
			<?php if(count($comentarios_curso)>0):?>
				<h1 class="mt-5">Comentarios</h1>
				<?php foreach($comentarios_curso as $comentario):?>
					<div class="media" style="margin-top:10px;">
						<?php if(!empty($comentario['foto'])):?>

						<img class="avatar img-fluid mr-3" src="<?php echo BASE?>assets/imagens/usuarios/<?php echo $comentario['foto']?>" style="width: 30px;height: 30px;border-radius: 15px;">

						<?php else:?>

						<img src="<?php echo BASE?>assets/imagens/usuario.png" class="avatar img-fluid mr-3" style="width: 50px;height: 50px;border-radius: 15px;">

						<?php endif;?>
						<div class="media-body" style="color:white;">
							<h3><?php echo $comentario['nome']?></h3>
							<p><?php echo utf8_encode($comentario['comentario'])?>
							</p>
							<small><?php echo $comentario['data']?></small>
						</div>
					</div>
					<hr style="background-color:white;">
				
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</body>
</html>