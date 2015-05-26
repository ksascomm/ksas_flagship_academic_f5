<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
	<div class="row">
		<div class="small-12 columns">
			<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="field">
			<?php if ( has_post_thumbnail()) { ?> 
				<?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small')); ?>
			<?php } ?>			    
					<h4 class="no-margin"><?php the_title(); ?></h4></a>
					<h5 class="no-margin">
					<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
						<?php echo get_post_meta($post->ID, 'ecpt_position', true); ?>
					<?php endif; ?>
					</h5>
					<h5 class="subheader no-margin">
					<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
						<?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?>
					<?php endif; ?>
					</h5>
					<p class="contact no-margin">
						<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
							<span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
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
		<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?><p><b>Research Interests:&nbsp;</b><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></p><?php endif; ?>
	</div>
</li>		
