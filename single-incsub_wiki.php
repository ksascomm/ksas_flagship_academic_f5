<?php get_header(); ?>
<style>
.incsub_wiki_tabs, .incsub_wiki-subscribe {display: none; }
</style>
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns radius-left offset-topgutter">	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="content news">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #page -->
<?php get_footer(); ?>