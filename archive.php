<?php /**
* The template used to display archive content
*/

get_header(); 
	$theme_option = flagship_sub_get_global_options(); 
	$collection_name = $theme_option['flagship_sub_search_collection']; ?>	
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">
		<?php locate_template('parts/nav-breadcrumbs.php', true, false);?>
		<main class="content post-archive">
		<?php
		if ( have_posts() ) : ?>
			<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive: <strong><?php single_month_title(' ') ?></strong></h1>

				<div class="row panel">
					<div class="small-12 medium-6 columns">
						<form method="GET" action="<?php echo site_url('/search'); ?>" id="search-bar" class="archive">
					      <div class="row collapse prefix-round">
					        <div class="small-2 columns">
					          <input type="submit" class="button prefix" aria-label="submit" />
					        </div>
					        <div class="small-10 columns">
								<label for="search" class="screen-reader-text">Search</label>
								<input type="text" id="search" name="q" placeholder="Search our News Archives" aria-label="search"/>
								<input type="hidden" aria-label="site" name="site" value="<?php echo $collection_name; ?>" />
					        </div>
					      </div>
				        </form>
					</div>
					<div class="small-12 medium-5 columns">
						<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
						  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
						  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
						</select>
					</div>	
				</div>

				<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>	

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					 	<h1 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
					 	<h3 class="black" itemprop="datePublished">Date: <?php the_time( get_option( 'date_format' ) ); ?> <br> Category: <?php echo get_the_category( $id )[0]->name; ?></h3>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php if ( has_post_thumbnail()) { ?>
							<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
						<?php } ?>
					  <?php the_excerpt(); ?>
					</div>
					
				</article>
				<hr>
			<?php endwhile;?> 
				<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
			<?php endif; ?>
		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>