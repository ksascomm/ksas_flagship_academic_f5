<summary class="small-4 small-offset-8 columns black_bg vertical radius-topright" id="caption">
		<div class="middle">
			<h3 class="white"><?php the_title(); ?></h3>
			<h5 class="white"><?php echo get_the_content(); ?></h5>
		   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
				<h6 class="yellow">Find Out More <span class="icon-arrow-right-2"></span></h6>
			<?php endif;?>
		</div>
</summary>
