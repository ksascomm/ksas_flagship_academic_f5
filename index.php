<?php get_header(); 
	$theme_option = flagship_sub_get_global_options(); 
	$collection_name = $theme_option['flagship_sub_search_collection']; ?>	
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">
		<?php locate_template('parts/nav-breadcrumbs.php', true, false);?>

		<main class="content post-archive" itemprop="mainEntity" itemscope itemtype="http://schema.org/Blog">
			<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
				<div class="row panel">
					<h3>Search Our Archives</h3>
					<div class="small-12 medium-6 columns">
						<form method="GET" action="<?php echo site_url('/search'); ?>" class="archive">
					      <div class="row collapse prefix-round">
					        <div class="small-2 columns">
					          <input type="submit" class="button prefix" aria-label="submit" />
					        </div>
					        <div class="small-10 columns">
								<label for="news-search" class="screen-reader-text">Search</label>
								<input type="text" id="news-search" name="q" placeholder="Search our News Archives" aria-label="search"/>
								<input type="hidden" aria-label="site" name="site" value="<?php echo $collection_name; ?>" />
					        </div>
					      </div>
				        </form>
					</div>
				</div>
			<div class="small-12 large-11 columns">
			<?php 

			if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<article aria-labelledby="post-<?php the_ID(); ?>">
						<h2 itemprop="headline">
							<?php if ( get_post_meta($post->ID, 'ecpt_external_link', true) ) : ?>
								<a href="<?php echo get_post_meta($post->ID, 'ecpt_external_link', true); ?>" target="_blank" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?> <span class="icon-new-tab-2" aria-hidden="true"></span>
								</a>
							<?php else : ?>
								<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
							<?php endif; ?>
						</h2>
						<h3 class="black" itemprop="datePublished">Date: <?php the_time( get_option( 'date_format' ) ); ?> <br> Category: <?php echo get_the_category( $id )[0]->name; ?></h3>
					<div class="entry-content" itemprop="text">
							<?php if ( has_post_thumbnail()) { ?>
								<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
							<?php } ?>
						 <?php the_excerpt(); ?>
						<hr>
					</div>	
				</article>		
				<?php endwhile; endif ?>
			</div>
			<div class="row">
				<?php flagship_pagination(); ?>		
			</div>		
		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>