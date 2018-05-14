<?php
/*
* Fassfood functions and definitions
*/
// Enable support for Post thumbnails on post and pages
add_theme_support('post-thumbnails');
// para imagen destacada ancho=2000 alto=1200 y true para recortar
add_image_size('wpi77-featured-image',2000,1200,true);
add_image_size('wpi77-thumbnail-avatar',100,100,true);

//Enable menu dinamic
// The theme uses wp_nav_menu() in two locations.
// nombre de los menus seran (top y footer) una descripcion 1º param,2ºparam es el nombre de la plantilla
register_nav_menus( array(
	'top' 		=> __('Top menu','wpi77'),
	'footer'	=> __('Footer menu','wpi77'),
));
//clases, el objeto actual y los argumentos q definen el menu
// si los argumentos q incluyen con el theme_location es igual a top
function wpi77_menu_classes($classes, $item, $args){
  if($args->theme_location == 'top' || $args->theme_location == 'footer') {
		$classes[] = 'list-inline-item'; // el arreglo contendra 3 clases
	}
	return $classes;
}
//ahora para que esta funcion tenga efecto hay q añadirlo como un filtro
//av_menu_css_class: a que categoria hara efecto, 1 es la prioridad, 3 es el numero de parametros de la funcion.
add_filter('nav_menu_css_class','wpi77_menu_classes',1,3);
