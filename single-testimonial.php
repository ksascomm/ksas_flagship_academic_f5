<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns radius-left offset-topgutter">	
		<section class="content">
		<div class="row">
				<div class="small-5 small-offset-7 columns">
				<h6>View Other Testimonials</h6>
				<form name="jump">
					<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<option>---<?php the_title(); ?></option> 
						<?php endwhile; endif; ?>
						<?php $jump_menu_query = new WP_Query(array(
							'post-type' => 'testimonial',
							'testimonialtype' => 'internship-testimonial',
							'orderby' => 'title',
							'order' => 'ASC',
							'posts_per_page' => '-1')); ?>
						<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
							<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
						<?php endwhile; ?>
					</select>
				</form>
				</div>
			</div>
			<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
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
		</section>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>