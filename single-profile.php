<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section class="content news">
				<h1><?php the_title(); ?></h1>
				<p class="lead"><?php if( get_post_meta($post->ID, 'ecpt_pull_quote', true)) { echo get_post_meta($post->ID, 'ecpt_pull_quote', true); } ?></p>
				<?php if ( has_post_thumbnail()) { ?> 
					<?php the_post_thumbnail('full', array('class'	=> "floatleft")); ?>
				<?php } ?>
				<?php the_content(); endwhile; endif;?>
			</section>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>