	<aside class="small-12 large-4 columns hide-for-print" id="sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar"> 
		<!-- Start Featured Image -->

		<?php 
		if ( is_page() && has_post_thumbnail()  ) {  
			wp_reset_query();
				the_post_thumbnail('full', array('class'	=> "offset-gutter radius-topright featured show-for-large-up")); 
			 } 
		 ?>

		<!-- END Featured Image --> 

		<!-- Start Navigation for Sibling Pages -->		

			<?php 
			
				if( is_page() ) { 
					global $post;
				        $ancestors = get_post_ancestors( $post->ID ); // Get the array of ancestors
				        //If there are more than one display a menu of siblings
							if (count($ancestors) > 1 ) {
								$parent_page = get_post($post->post_parent);
								$parent_name = $parent_page->post_title;
							?>
							<div class="offset-gutter radius-topright" id="sidebar_header">
								<h5 class="white">Also in <?php echo $parent_name ?></h5>
							</div>
							<?php
								wp_nav_menu( array( 
									'theme_location' => 'main_nav', 
									'menu_class' => 'nav', 
									'container_class' => 'offset-gutter',
									'items_wrap' => '<ul id="%1$s" class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',
									'submenu' => $parent_name,				
								));
							}
						//If there is only one ancestor display a menu of children
							elseif (count($ancestors) == 1 ) {
								$page_name = $post->post_title;
								$test_menu = wp_nav_menu( array( 
									'theme_location' => 'main_nav', 
									'menu_class' => 'nav',
									'fallback_cb' => 'false', 
									'container_class' => 'offset-gutter',
									'items_wrap' =>  '<div class="radius-topright" id="sidebar_header"><h5 class="white">Also in ' . $page_name . '</h5></div><ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',				
									'submenu' => $page_name,
									'echo' => FALSE,
								));
								$tester = 'menu-item';
								$result = strpos($test_menu, $tester);
									if ($result === false) {
									} else {
									echo $test_menu;
									}
						}
						//Get the top-level page slug for sidebar/widget content conditionals
							$ancestor_id = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
					        $the_ancestor = get_page( $ancestor_id );
					        $ancestor_slug = $the_ancestor->post_name;
					    
			} 
			?> 
		<!-- End Navigation for Sibling Pages -->

		<!-- Page Specific Sidebar -->
		<?php if ( have_posts() && get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) : while ( have_posts() ) : the_post();?> 
			<div class="ecpt-page-sidebar">
				<?php echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true)); ?>
			</div>
		<?php endwhile; endif; ?>
		<!-- END Page Specific Sidebar -->
		
		<!-- Start Widget Content -->
			<?php
			if ( is_front_page() ) {    
				dynamic_sidebar( 'homepage-sb' );
							
			} elseif ( have_posts() && get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) {
			
			} elseif ( is_page( 'graduate' ) || $ancestor_slug == 'graduate' ) {    
				dynamic_sidebar( 'graduate-sb' );
			
			} elseif ( is_page( 'research' ) || $ancestor_slug == 'research' ) {    
				dynamic_sidebar( 'research-sb' );
			
			} elseif ( is_page( 'undergraduate' ) || $ancestor_slug == 'undergraduate' ) {    
				dynamic_sidebar( 'undergrad-sb' ); 
			
			} else { 
				dynamic_sidebar( 'page-sb' );
			}	
			?>
			
		<!-- End Widget Content -->
	</aside>
