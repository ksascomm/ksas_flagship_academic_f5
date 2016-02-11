<div class="search-bar small-12 large-5 large-offset-7 columns">
	<div class="row">
		<div class="small-6 columns">
		<?php $theme_option = flagship_sub_get_global_options(); 
				$collection_name = $theme_option['flagship_sub_search_collection'];
		?>
			<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
				<input type="hidden" name="site" value="<?php echo $collection_name; ?>" aria-label="<?php echo $collection_name; ?>"/>
				<button type="submit" aria-label="submit"/>
					<span class="fa fa-search"></span>
				</button>
				<label for="search" class="screen-reader-text">
					Search
				</label>
				<input type="text" id="search" name="q" placeholder="Search this site" aria-label="search"/>
					
			</form>
		</div>
			<?php wp_nav_menu( array( 
				'theme_location' => 'search_bar', 
				'menu_class' => '', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'div',
				'container_id' => 'search_links', 
				'container_class' => 'small-6 columns links inline',
				'depth' => 1,
				'items_wrap' => '%3$s', )); ?> 
	</div>	
</div>	<!-- End #search-bar	 -->