<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<main class="content page-content" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost" aria-label="<?php the_title();?>">
					<h1 class="page-title" itemprop="headline"><?php the_title();?></h1>
					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
				</article>

			<?php endwhile; endif; ?>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>