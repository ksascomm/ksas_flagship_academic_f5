<?php
/*
Template Name: Job Market Candidate
*/
?>	

<?php get_header(); 
if ( false === ( $job_market_query = get_transient( 'job_market_query' ) ) ) {
       // It wasn't there, so regenerate the data and save the transient
	$job_market_query = new WP_Query(array(
		'post_type' => 'people',
		'role' => 'job-market-candidate',
		'meta_key' => 'ecpt_people_alpha',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'posts_per_page' => '-1'));        	
	set_transient( 'job_market_query', $job_market_query, 2592000 );
} 
?>
<div class="row wrapper radius10">
<div class="small-12 columns">		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
	<section class="content row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 class="page-title"><?php the_title();?></h1>
		<?php endwhile; endif; ?>	
	</section>
	<section class="row" id="fields_container">
		<ul class="small-12 columns" id="directory">
		<?php if($job_market_query->have_posts()) : ?>
		<a name="research" id="research"></a>
		<?php while ($job_market_query->have_posts()) : $job_market_query->the_post(); ?>
				<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
					<div class="row">
						<div class="small-11 columns">
							<div class="row">
									<?php if ( has_post_thumbnail()) { ?> 
										<?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small-only')); ?>
									<?php } ?>			    
									<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) { ?> 
										<h4 class="no-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php } else { ?>
										<h4 class="no-margin"><?php the_title(); ?></h4>
									<?php } ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?><h5><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h5><?php endif; ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?><h5><?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?></h5><?php endif; ?>
									<p class="contact no-margin">
										<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
											<span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
											<span class="icon-printer"><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
											<span class="icon-mail"><a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"><?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></span>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
											<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span>
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
</section>
</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>		

