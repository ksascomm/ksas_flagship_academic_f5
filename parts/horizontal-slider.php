<summary class="small-12 columns horizontal black_bg caption">
	<h3 class="white no-margin" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h3>
	<h5 class="white italic floatleft no-margin"><?php echo get_the_content(); ?></h5>
   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
		<p class="gold floatleft no-margin">
			<a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')">
				Find Out More <span class="icon-arrow-right-2"></span>
			</a>
		</p>
	<?php endif;?>
</summary>
