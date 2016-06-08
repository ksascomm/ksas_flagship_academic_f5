<summary class="small-4 small-offset-8 columns black_bg vertical radius-topright caption">
		<div class="middle">
			<h1 class="white"><?php the_title(); ?></h1>
			<?php $slidercontent = get_the_content(); if($slidercontent != '') { ?>
				<p class="white"><?php echo get_the_content(); ?></p>
			<?php } ?>
		   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
				<p class="yellow">Find Out More <span class="icon-arrow-right-2"></span></p>
			<?php endif;?>
		</div>
</summary>
