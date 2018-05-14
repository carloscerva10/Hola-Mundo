<?php
	get_header();

	//Start the loop o buble //have_posts(): verdad cuando hay contenido
	while (have_posts()) : the_post(); 
		//echo "<br>get_titulo: " .get_the_title();
	if (get_the_title() ==='Home') {?>
		<article <?php post_class();?>><!--comunicara a wp donde ha aplicado un articulo, y le aplicara una serie de estilos.-->
			<div class="container">
				<div class="row">
					<div class="col-md-12"><h1><?php the_title();?></h1></div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</article>
<?php
	}
	endwhile;
	
	get_footer();
?>