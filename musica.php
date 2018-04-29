<?php
	$musica=simplexml_load_file("http://localhost/wp495/musica.xml");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<script type="text/javascript"></script>

		<style>
			#playlist, #playlist img, #playlist audio{
				width: 300px;
			}

			#playlist ul
			{
				list-style: none;
				background-color: black;
				color: white;
				padding-top: 10px;
				padding-bottom: 10px;
			}

			#playlist ul li
			{
				cursor: pointer;
			}
			.active{color: orange}
		</style>

	</head>
	<body>
		<h1>Musica Infantil para Alondra</h1>
		<!--Iniciamos la primera cancion por defecto-->
		<div id="playlist">
			<img id="portada" src="<?php echo $musica->cancion[0]->portada ?>">
			<audio controls id="audio">
			<source id="source" src="<?php echo $musica->cancion[0]->audio ?>" type="audio/mpeg">
				Tu navegador no soporta el audio
			</audio>

			<ul id="lista">
				<?php for($x=0; $x < count($musica->cancion); $x++): ?>
				<li audio="<?php echo $musica->cancion[$x]->audio ?>" portada="<?php echo $musica->cancion[$x]->portada ?>"> <?php echo $musica->cancion[$x]->artista . " - " . $musica->cancion[$x]->titulo ?>
				</li>
			<?php endfor ?>
			</ul>
		</div>
	</body>
</html>