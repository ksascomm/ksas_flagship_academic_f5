<?php
/*
Template Name: Testimonial Listing (Internship)
*/
?>	

<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="large-12 columns">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<div class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<?php $ksas_internship_testimonial_query = new WP_Query(array(
					'post-type' => 'testimonial',
					'testimonialtype' => 'internship-testimonial',
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
						<h4><?php the_title(); ?>
							<?php if ( has_post_thumbnail()) {  the_post_thumbnail('thumbnail', array('class'	=> "floatleft circle"));  } ?>
							<span class="fa fa-caret-down"></span><span class="fa fa-caret-up"></span>
						</h4>
						<ul class="no-bullet">
							<?php if ( get_post_meta($post->ID, 'ecpt_internship', true) ) : ?>
							<li><strong>Internship:</strong> <?php echo get_post_meta($post->ID, 'ecpt_internship', true); ?></li>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
							<li><strong>Class of:</strong> <?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></li>
							<?php endif; ?>
						</ul>
					</a>
					<div id="post<?php the_ID(); ?>" class="content testimonial">
						<?php if ( get_post_meta($post->ID, 'ecpt_quote', true) ) : ?>
							<p class="pullquote"><?php echo get_post_meta($post->ID, 'ecpt_quote', true); ?></p>
						<?php endif; ?>
						<p><a href="<?php echo get_permalink();?>">View <?php echo the_title(); ?>'s Full Statement</a></p>
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