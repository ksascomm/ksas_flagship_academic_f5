<?php get_header(); ?>
<main class="row wrapper radius10" id="page" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="content news" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">	
			<h1 itemprop="headline"><?php the_title();?></h1>
			<div class="entry-content" itemprop="articleBody">
			<?php if ( has_post_thumbnail()) { ?> 
				<?php the_post_thumbnail('full', array('class'	=> "floatleft")); ?>
			<?php } ?>
			<?php the_content(); ?>
			</div>
		</article>
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</main> <!-- End #page -->
<?php get_footer(); ?>