	<?php if ( has_post_thumbnail()) { ?> 
		<?php the_post_thumbnail('medium', array('class'	=> "floatleft")); ?>
	<?php } ?>

	<?php $faculty_post_id = get_post_meta($post->ID, 'ecpt_pub_author', true);
		  $faculty_post_id2 = get_post_meta($post->ID, 'ecpt_pub_author2', true); ?>
	
	<h1 class="page-title"><?php the_title();?></h1>

	<h2>
		<?php if ( get_post_meta($post->ID, 'ecpt_pub_date', true) ) : echo get_post_meta($post->ID, 'ecpt_pub_date', true);  endif; ?>
		<?php if ( get_post_meta($post->ID, 'ecpt_publisher', true) ) :?>, <?php echo get_post_meta($post->ID, 'ecpt_publisher', true);  endif; ?>
	</h2>
	<p><strong><a href="<?php echo get_permalink($faculty_post_id); ?>"><?php echo get_the_title($faculty_post_id); ?> 
	<?php if ( get_post_meta($post->ID, 'ecpt_pub_role', true)) :?>, <?php echo get_post_meta($post->ID, 'ecpt_pub_role', true); endif; ?></a></strong>
	<br><?php if ( get_post_meta($post->ID, 'ecpt_pub_link', true) ) :?> 
							<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_pub_link', true); ?>">
								Purchase on Amazon <span class="fa fa-amazon"></span>
							</a>
						<?php endif; ?>
	<?php if (get_post_meta($post->ID, 'ecpt_author_cond', true) == 'on') { ?><br></strong>
		<a href="<?php echo get_permalink($faculty_post_id2); ?>"><?php echo get_the_title($faculty_post_id2); ?>,&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_pub_role2', true); ?>
		</a></a>
	<?php } ?>
	</p>
	
	<?php the_content(); ?>		