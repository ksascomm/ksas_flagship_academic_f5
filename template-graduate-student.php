<?php
/*
Template Name: Graduate Student Listing
*/
?>	

<?php get_header(); ?>
<div class="row wrapper radius10" role="main">
	<div class="small-12 columns">		
	<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<div class="content row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
			<?php endwhile; endif; ?>	
		</div>
		<div class="row" id="fields_container">
			<ul class="small-12 columns" id="directory">
			<a name="research" id="research"></a>
			<?php 
			if ( false === ( $graduate_student_query = get_transient( 'graduate_student_query' ) ) ) {
	       // It wasn't there, so regenerate the data and save the transient
		$graduate_student_query = new WP_Query(array(
			'post_type' => 'people',
			'role' => array('graduate-student', 'ma-student'),
			'meta_key' => 'ecpt_people_alpha',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'posts_per_page' => '-1'
			));        	
		set_transient( 'graduate_student_query', $graduate_student_query, 2592000 );
				}  
			
		 if ( $graduate_student_query->have_posts() ) : while ($graduate_student_query->have_posts()) : $graduate_student_query->the_post(); ?>
					<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
						<div class="row">
							<div class="small-11 columns">
								<div class="row">
								<?php if ( has_post_thumbnail()) { ?> 
									<?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small-only')); ?>
								<?php } ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) { ?> 
										<h4 class="no-margin">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>
									<?php } else { ?>	    
										<h4 class="no-margin"><?php the_title(); ?></h4>
									<?php } ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?><h6><?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?></h6><?php endif; ?>
										<p class="contact no-margin">
											<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
												<span class="icon-mobile"> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
											<?php endif; ?>
											<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
												<span class="icon-printer"> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span>
											<?php endif; ?>
											<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
												<span class="icon-mail"> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"><?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></span>
											<?php endif; ?>
											<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
												<span class="icon-location"> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span>
											<?php endif; ?>
											<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
					    						<span class="icon-globe">
													<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank">Personal Website</a>
												</span>
											<?php endif; ?>
										</p>
							<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?><p><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_advisor', true) ) : ?><br><strong>Advisor:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_advisor', true); endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?></p><?php endif; ?>
							</div>
						</div>
					</li>
		<?php endwhile; endif;?>
				</ul>
		</div>
	</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>		

