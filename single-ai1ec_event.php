<?php get_header(); ?>
<main class="row wrapper radius10" id="page">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="content news">
			<h3><?php the_date(); ?></h3>
			<h2><?php the_title();?></h2>
			<?php the_content(); ?>
		</article>
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</main> <!-- End #page -->
<?php get_footer(); ?>