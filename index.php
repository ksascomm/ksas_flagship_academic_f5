<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false);
		$theme_option = flagship_sub_get_global_options(); $news_query_cond = $theme_option['flagship_sub_news_query_cond']; ?>	
		<main class="content post-archive" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
		<?php 
			$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
			if ( false === ( $news_archive_query = get_transient( 'news_archive_query_' . $paged ) ) ) {
				if ($news_query_cond === 1) {
					$news_archive_query = new WP_Query(array(
						'post_type' => 'post',
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => array( 'books' ),
								'operator' => 'NOT IN'
							)
						),
						'posts_per_page' => 10,
						'paged' => $paged)); 
				} else {
					$news_archive_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'paged' => $paged
						)); 
				}
					set_transient( 'news_archive_query_' . $paged, $news_archive_query, 2592000 );
			} 	

		while ($news_archive_query->have_posts()) : $news_archive_query->the_post(); ?>

		<article role="article" aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
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
		
		<div class="row">
			<?php flagship_pagination($news_archive_query->max_num_pages); ?>		
		</div>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>