<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
	<div class="row">
			
			<?php if ( has_post_thumbnail()) { ?> 
			<a href="<?php the_permalink();?>" title="<?php the_title(); ?> full profile" class="field">
				<?php $title=get_the_title();
				the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small', 'alt' => $title)); ?>
			</a>
			<?php } ?>			    
					<h4 class="no-margin"><a href="<?php the_permalink();?>" title="<?php the_title(); ?> full profile" class="field"><?php the_title(); ?></a></h4>
		
				<?php if ( array(get_post_meta($post->ID, 'ecpt_position', true) || get_post_meta($post->ID, 'ecpt_degrees', true )) ) : ?>
					<h5 class="subheader no-margin">
					
						<?php echo get_post_meta($post->ID, 'ecpt_position', true); ?>
					
						<br>
					
						<?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?>
					
					</h5>
				<?php endif; ?>	
					<p class="contact no-margin">
						<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
							<span class="icon-phone"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
							<span class="icon-printer"><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
							<span class="icon-mail">
								<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>">
									<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>
								</a>
							</span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
							<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
				    		<span class="icon-globe">
				    			<a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" onclick="ga('send', 'event', 'People Directory', 'Group/Lab Website', '<?php the_title(); ?> | <?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>')" target="_blank">Group/Lab Website</a>
				    		</span>
			    		<?php endif; ?>
					</p>
					<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
						<p><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></p>
					<?php endif; ?>
	</div>
</li>		
