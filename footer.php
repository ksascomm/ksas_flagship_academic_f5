  <footer>
  	<div class="row hide-for-print">
  		<?php //Check Theme Options for Quicklinks setting 
	  		$theme_option = flagship_sub_get_global_options(); 
	  		if ( $theme_option['flagship_sub_quicklinks']  == '1' ) {
	  				global $switched;
	  				$quicklinks_id = $theme_option['flagship_sub_quicklinks_id'];
	  				switch_to_blog($quicklinks_id); }  
	  		
	  		//Quicklinks Menu
	  		wp_nav_menu( array( 
				'theme_location' => 'quick_links', 
				'menu_class' => 'nav-bar', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav', 
				'container_id' => 'quicklinks',
				'container_class' => 'small-3 columns hide-for-small-only', 
				'walker' => new foundation_navigation() ) ); 
			
			//Return to current site
			if ( $theme_option['flagship_sub_quicklinks']  == '1' ) { restore_current_blog(); }
			
			//Footer Links
			 wp_nav_menu( array( 
				'theme_location' => 'footer_links', 
				'menu_class' => 'inline-list hide-for-small-only', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav', 
				'container_class' => 'medium-7 columns', 
				'walker' => new foundation_navigation() ) ); 
		 ?>
		<!-- Social Media -->
		<nav class="small-12 medium-2 columns iconfont hide-for-small-only" id="social-media">
			<a href="http://facebook.com/jhuksas" title="Facebook"><span class="icon-facebook"></span></a>
			<a href="http://vimeo.com/channels/jhuksas" title="Vimeo"><span class="icon-vimeo"></span></a>
		</nav>
		
		<!-- Copyright and Address -->
		<div class="row" id="copyright" role="content-info">
  			<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
  		</div>
  		<div class="row">
	  		<div class="small-12 medium-4 medium-centered columns">
  				<a href="http://www.jhu.edu"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" /></a>
  			</div>
  		</div>

  	</div>
  </footer>
  
  <?php //Call all the javascript
  		get_template_part('parts', 'script-initiators'); 
  		wp_footer(); ?>
	</body>
</html>