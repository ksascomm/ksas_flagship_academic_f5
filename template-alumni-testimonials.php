<?php
/*
Template Name: Testimonial Listing (Alumni)
*/
?>	

<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="large-12 columns">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<div class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<?php $ksas_internship_testimonial_query = new WP_Query(array(
					'post-type' => 'testimonial',
					'testimonialtype' => 'alumni-testimonial',
					'meta_key' => 'ecpt_testimonial_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC', 
					'posts_per_page' => -1));
			?>
		<?php if($ksas_internship_testimonial_query->have_posts()) : ?>
			<dl class="accordion testimonial" data-accordion>
		<?php while ($ksas_internship_testimonial_query->have_posts()) : $ksas_internship_testimonial_query->the_post(); ?>
			<dd class="accordion-navigation">
				<a href="#post<?php the_ID(); ?>" title="<?php the_title(); ?>">
					<h3><?php the_title(); ?>
						<?php if ( has_post_thumbnail()) {  the_post_thumbnail('thumbnail', array('class'	=> "floatleft circle"));  } ?>
						<span class="fa fa-caret-down"></span><span class="fa fa-caret-up"></span>
					</h3>
				<ul class="no-bullet">
					<?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
						<li><strong>Current Position:</strong> <?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></li>
					<?php endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
						<li><strong>Class of:</strong> <?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></li>
					<?php endif; ?>
				</ul>
				</a>
				<div id="post<?php the_ID(); ?>" class="content testimonial">
					<p><?php the_content()?></p>
				</div>
			<div class="clearfix"></div>
		</dd>
		<?php endwhile; ?>
			</dl>
		<?php endif; ?>
		</div>
	</div>
</div> 
<?php get_footer(); ?>