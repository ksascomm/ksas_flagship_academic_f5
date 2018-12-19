<div class="search-bar small-12 columns" aria-hidden="true">
	<div class="row">
		<div class="small-12 columns">
		<?php $theme_option = flagship_sub_get_global_options(); 
				$collection_name = $theme_option['flagship_sub_search_collection'];
		?>
			<form method="GET" action="<?php echo home_url( '/' ); ?>">
				<button type="submit" aria-label="submit"/>
					<span class="fa fa-search"></span>
				</button>
				<label for="search-mobile" class="screen-reader-text">
					Search This Website
				</label>
				<input type="text" id="search-mobile" value="<?php echo get_search_query(); ?>" name="s" placeholder="Search this site"/>
			</form>
		</div>
	</div>	
</div>	<!-- End #search-bar-->