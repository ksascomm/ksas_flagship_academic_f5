<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">
		<?php locate_template('parts/nav-breadcrumbs.php', true, false);
		$theme_option = flagship_sub_get_global_options(); ?>	
		<main class="content post-archive" itemprop="mainEntity" itemscope itemtype="http://schema.org/Blog">
			<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
			
			<div class="small-12 large-11 columns">
			<?php 

			if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<article aria-labelledby="post-<?php the_ID(); ?>">
						<h3 class="uppercase black" itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></h3>
						<h2 itemprop="headline">
							<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">	
								<?php the_title();?>
							</a>
						</h2>
					<div class="entry-content" itemprop="text">
							<?php if ( has_post_thumbnail()) { ?>
								<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
							<?php } ?>
						 <?php the_excerpt(); ?>
						<hr>
					</div>	
				</article>		
				<?php endwhile; ?>
					<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
				<?php endif; ?>

			</div>	
		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>