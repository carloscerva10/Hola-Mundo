    <footer>

        <div class="row menu-bar">
        	<div class="container">
        		<div class="row">
			          <div class="col-md-6">

			            <strong>fastfood</strong> &copy;2018 - Sitio diseñado por <a href="#">CCA</a>

			          </div>
			          <div class="col-md-6 text-md-right">

			            <?php
			              wp_nav_menu( array(
			                'theme_location' => 'footer',
			                'container' => 'div',
			                'menu_class' => 'list-inline'
			              ) );
			            ?>

			          </div>
        		</div>
        	</div>
        </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>