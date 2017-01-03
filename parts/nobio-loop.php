<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
	<div class="row">	
		<?php if ( has_post_thumbnail()) { ?> 
			<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>			
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" title="<?php the_title(); ?> 's webpage">
					<?php $title=get_the_title();
					the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small', 'alt' => $title)); ?>
				</a>
			<?php else : ?>
				<?php $title=get_the_title();
				the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small', 'alt' => $title)); ?>
			<?php endif; ?>
		<?php } ?>
		
		<h4 class="no-margin">
			<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" title="<?php the_title(); ?>'s webpage" target="_blank">
					<?php the_title(); ?>
				</a>
			<?php else : ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h4>

	<?php if (get_post_meta($post->ID, 'ecpt_position', true)) : ?>	
		<h5 class="subheader">
			<?php  if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<?php  echo get_post_meta($post->ID, 'ecpt_position', true); ?>
			<?php  endif; ?>
			<?php  if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
				<?php  echo '<br>' . get_post_meta($post->ID, 'ecpt_degrees', true); ?>
			<?php  endif; ?>
		</h5>
	<?php endif;?>	
		
		<p class="contact no-margin">
			<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
				<span class="icon-phone"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
				<span class="icon-printer"><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span>
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
				<span class="icon-mail"><a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>">
				
				<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?> </a></span>
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
				<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span>
			<?php endif; ?>
		</p>
		<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
			<p><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></p>
		<?php endif; ?>
	
	</div>
</li>		
