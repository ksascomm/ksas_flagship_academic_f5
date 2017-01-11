<?php get_header(); ?>
<div class="row wrapper radius10" id="page">
	<div class="large-12 columns radius-left offset-topgutter">	
			<main class="content page-content" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<div class="row">
					<div class="large-8 columns">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
					<div class="large-4 columns">
						<label for="jump">
							<h5>View Other Testimonials</h5>
						</label>
						<select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<option>---<?php the_title(); ?></option> 
								<?php endwhile; endif; ?>
								<?php $jump_menu_query = new WP_Query(array(
									'post-type' => 'testimonial',
									'testimonialtype' => array('internship-testimonial', 'alumni-testimonial'),
									'orderby' => 'title',
									'order' => 'ASC',
									'posts_per_page' => '-1')); ?>
								<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
									<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
								<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="row">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php if ( has_post_thumbnail()) {  the_post_thumbnail('thumbnail', array('class'	=> "floatleft circle"));  } ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
							<p><strong>Class of: <?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></strong></p>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_internship', true) ) : ?>
							<p><strong>Internship:</strong> <?php echo get_post_meta($post->ID, 'ecpt_internship', true); ?></p>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
							<p><strong>Current Job:</strong> <?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></p>
						<?php endif; ?>
						<p><?php the_content()?></p>
					<?php endwhile; endif;?>
				</div>
			</main>
		</div>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>