<?php
/*
Template Name: Full Width - No Sidebar
*/
?>
<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="large-12 columns">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<main class="content main-content" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title" itemprop="headline"><?php the_title();?></h1>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="photo-page-left floatleft seven columns">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
						</div>
					<?php } ?>
					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
			<?php endwhile; endif; ?>	
		</main>
	</div>
</div> 
<?php get_footer(); ?>