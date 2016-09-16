<?php get_header(); ?>
<main class="row wrapper radius10" id="page">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="content news" itemscope itemtype="http://schema.org/BlogPosting">
			<?php if (in_category('books')) {
					locate_template('single-category-books.php', true, false);
			} else { ?>
			<header class="article-header">		
				<h2><?php the_date(); ?></h2>
				<h1><?php the_title();?></h1>
			</header> <!-- end article header -->
			<section class="entry-content" itemprop="articleBody">
			<?php if ( has_post_thumbnail()) { ?> 
				<?php the_post_thumbnail('full', array('class'	=> "floatleft")); ?>
			<?php } ?>
			<?php the_content(); }?>
			</section> <!-- end article section -->
		</article> <!-- end article -->
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</main> <!-- End #page -->
<?php get_footer(); ?>