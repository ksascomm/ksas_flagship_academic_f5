<?php get_header(); ?>
<div class="row wrapper radius10" id="page">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<main class="content page-content" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
				<h5 class="black" itemprop="datePublished"><?php the_date(); ?></h5>
				<p class="lead"><?php if( get_post_meta($post->ID, 'ecpt_pull_quote', true)) { echo get_post_meta($post->ID, 'ecpt_pull_quote', true); } ?></p>
				<?php if ( has_post_thumbnail()) { ?> 
					<?php the_post_thumbnail('full', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
				<?php } ?>
				<div class="entry-content" itemprop="articleBody">
					<?php the_content();?>
				</div>
			</main>
		<?php endwhile; endif;?>	
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>