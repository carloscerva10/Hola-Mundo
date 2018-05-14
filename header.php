<?php
/*
The template for displaying the header
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" crossorigin="anonymous">
      <!-- Font Awesome CDN -->
    <script src="https://use.fontawesome.com/025d1f53df.js"></script>

<?php
    require_once 'class-i77-services-client.php';
    
    wp_head();
?>
</head>
<body <?php body_class();?>>
<header>
      <div class="container">
          <div class="row">
              <div class="col-md-3"><img src="<?php bloginfo('template_url');?>/logo_i77.png"></div>
              <div class="col-md-6">
                  <ul class="social-header2 list-inline text-center text-md-center"><li><h4>R A T E S&nbsp;&nbsp;&nbsp;&nbsp;S Y S T E M</h4></li></ul>
              </div>
              <div class="col-md-3">
                  <ul class="social-header list-inline text-center text-md-right">
                    <li class="list-inline-item">
                    <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-youtube fa-stack-1x fa-inverse"></i></span></a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></span></a>
                    </li>
                  </ul>
              </div>
          </div>
      </div>

      <div class="menu-bar text-xs-left">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'top',
              'container' => 'nav',
              'container_class' => 'container',
              'menu_class' => 'list-inline'
            ));
          ?>
      </div>
</header>
