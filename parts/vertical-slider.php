<summary class="small-4 small-offset-8 columns black_bg vertical radius-topright caption">
	<div class="middle">
		<h1 class="white" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
		<?php $slidercontent = get_the_content(); if($slidercontent != '') { ?>
			<p class="white"><?php echo get_the_content(); ?></p>
		<?php } ?>
	   	<?php if ( get_post_meta($post->ID, 'ecpt_urldestination', true) ) : ?>				
			<p class="gold">
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')" aria-label="<?php the_title(); ?>">
					Find Out More <span class="icon-arrow-right-2"></span>
				</a>
			</p>
		<?php endif;?>
	</div>
</summary>