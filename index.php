<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">
		<?php locate_template('parts/nav-breadcrumbs.php', true, false);
		$theme_option = flagship_sub_get_global_options(); $news_query_cond = $theme_option['flagship_sub_news_query_cond']; ?>	
		<main class="content post-archive" itemprop="mainEntity" itemscope itemtype="http://schema.org/Blog">
		<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
		<div class="small-12 large-11 columns">
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
			<link itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" />
				<h3 class="uppercase black" itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></h3>
				<h2 itemprop="headline">
					<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">	
						<?php the_title();?>
					</a>
				  <span class="hide" itemprop="author" itemscope itemtype="https://schema.org/Person">
				    By <span itemprop="name">Krieger School of Arts & Sciences</span>
				  </span>
					<meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />
				</h2>
			<div class="entry-content" itemprop="text">
					<?php if ( has_post_thumbnail()) { ?>
						<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
							<meta itemprop="url" content="<?php the_post_thumbnail_url();?>">
	      					<meta itemprop="width" content="361">
	     					<meta itemprop="height" content="150">
     					</div>
					<?php } ?>

		<span class="hide" itemscope itemprop="publisher" itemtype="http://schema.org/Organization">
            <a itemprop="url" href="https://krieger.jhu.edu">
                <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                   <img itemprop="url" content="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="JHU Logo">
                   <meta itemprop="width" content="600">
                   <meta itemprop="height" content="60">
                </span>   
                <span itemprop="name">Krieger School of Arts & Sciences</span>
            </a>
	     </span>	
				 <span itemprop="description"><?php the_excerpt(); ?></span>
				<hr>
			</div>	
		</article>		
			<?php endwhile; ?>
		</div>	
		<div class="row">
			<?php flagship_pagination($news_archive_query->max_num_pages); ?>		
		</div>	
		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>