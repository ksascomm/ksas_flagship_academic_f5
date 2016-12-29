<?php get_header(); ?>
<?php
	$theme_option = flagship_sub_get_global_options(); 
	if ( false === ( $slider_query = get_transient( 'slider_query' ) ) ) {
		$slider_query = new WP_Query(array(
			'post_type' => 'slider',
			'posts_per_page' => '-1',
			'orderby' => 'rand', 
			'order' => 'ASC'));
		set_transient( 'slider_query', $slider_query, 86400 );
	} 	
	if ( $slider_query->have_posts() ) :
?>
<div class="row hide-for-small-only" role="marquee">
	<div class="slideshow-wrapper">
	  <div class="preloader"></div>
			<?php if ($slider_query->post_count == 1) : ?>
				<ul id="slider" data-orbit data-options="navigation_arrows:false; bullets:false; slide_number:false;">
			<?php else :?> 
				<ul id="slider" data-orbit data-options="animation: fade; animation_speed:2000; timer:true; timer_speed:4000; navigation_arrows:true; bullets:false; slide_number:false;">
			<?php endif; ?>
			<?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
					<li>
						<a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')" id="post-<?php the_ID(); ?>">
							<article class="slide" aria-labelledby="post-<?php the_ID(); ?>">
								<img src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" alt="<?php the_title(); ?>" class="radius-top" />
									<div class="orbit-caption">
										<?php if($theme_option['flagship_sub_slider_style'] == "vertical") { 
											 	locate_template('parts/vertical-slider.php', true, false); 	
											 	}
										 elseif($theme_option['flagship_sub_slider_style'] == "horizontal") { 
										 		locate_template('parts/horizontal-slider.php', true, false); 
										  } ?>
									</div>
							</article>
						</a>
					</li>
				<?php endwhile; ?>	
			</ul>
	</div>
</div>

<?php endif; ?>

<div class="row sidebar_bg radius10 <?php if($theme_option['flagship_sub_slider_style'] == "vertical") { ?> <?php } ?>">
	<main class="small-12 large-8 columns wrapper <?php if($theme_option['flagship_sub_slider_style'] == "vertical") { ?>offset-top <?php } ?>toplayer" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php $frontpagecontent = the_content(); if($frontpagecontent != '') { ?>
				<?php the_content(); ?>	
			<?php } ?>
			
		<?php endwhile; endif; ?>	

		<?php //$count_posts = wp_count_posts(); echo $count_posts->publish; ?><br>
		<?php //$count_pages = wp_count_posts('page'); echo $count_pages->publish;?>

		<?php 
			/********NEWS QUERY**************/		
			$news_query_cond = $theme_option['flagship_sub_news_query_cond'];
			$news_quantity = $theme_option['flagship_sub_news_quantity']; 
				if ( false === ( $news_query = get_transient( 'news_mainpage_query' ) ) ) {
					if ($news_query_cond === 1) {
						$news_query = new WP_Query(array(
							'post_type' => 'post',
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => array( 'books' ),
									'operator' => 'NOT IN'
								)
							),
							'posts_per_page' => $news_quantity)); 
					} else {
						$news_query = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => $news_quantity)); 
					}
				set_transient( 'news_mainpage_query', $news_query, 2592000 );
				} 	
				if ( $news_query->have_posts() ) :
		?>

		<h3><?php echo $theme_option['flagship_sub_feed_name']; ?></h3>

		<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
		
		<article class="small-12 columns news-item <?php if(is_sticky()) :?>sticky<?php endif;?>" aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
			
			<?php if( is_sticky() ) :?>
				<h3 class="sticky-title">Featured Article</h3>
			<?php endif;?>
			<?php if (!is_sticky()) :?>
				<h2 class="uppercase black" itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></h2>
			<?php endif; ?>

			<h1 itemprop="headline">
				<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title();?></a>
			</h1>

			<div class="entry-content" itemprop="text">	
				<?php if ( has_post_thumbnail()) : ?> 
					<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
						<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
					</div>
				<?php endif; ?>

				<?php the_excerpt(); ?>
				
				<?php if (!is_sticky()) :?>
	    			<hr>
	  			<?php endif;?>
			</div>	

		</article>
		
		
		<?php endwhile; ?>
		<div class="archive-link row">
			<h4>
				<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</a>
			</h4>
		</div>
		<?php endif; ?>
		
	</main>	<!-- End main content (left) section -->
<?php locate_template('/parts/sidebar.php', true, false); ?>	
</div> <!-- End #landing -->
<?php get_footer(); ?>