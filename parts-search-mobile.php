<div class="search-bar small-12 columns">
	<div class="row">
		<div class="small-12 columns">
		<?php $theme_option = flagship_sub_get_global_options(); 
				$collection_name = $theme_option['flagship_sub_search_collection'];
		?>
			<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
				<input type="hidden" name="site" value="<?php echo $collection_name; ?>" aria-label="<?php echo $collection_name; ?>"/>
				<button type="submit" aria-label="submit"/>
					<span class="fa fa-search"></span>
				</button>
				<label for="search-mobile" class="screen-reader-text">
					Search This Website
				</label>
				<input type="text" id="search-mobile" name="q" placeholder="Search this site" aria-label="search"/>	
			</form>
		</div>
	</div>	
</div>	<!-- End #search-bar	 -->