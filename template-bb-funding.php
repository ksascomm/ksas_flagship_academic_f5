<?php
/*
Template Name: Bulletin Board - Funding Opportunites
*/
?>

<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="small-12 columns">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<div class="content">
 			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
 				<!--Start the loop -->
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content() ?>
			<?php endwhile; endif ?>
			
			<div class="bulletinboard">
				<?php $bulletin_type = 'bulletinboard';
					// Get all the taxonomies for this post type
					$taxonomies = get_object_taxonomies( (object) array( 'post_type' => $bulletin_type ) );

					foreach( $taxonomies as $taxonomy ) : 

					    // Gets every "category" (term) in this taxonomy to get the respective posts
					    $terms = get_terms( $taxonomy );

					    foreach( $terms as $term ) : 

					        $bulletins = new WP_Query(array(
					        	'taxonomy' => $taxonomy,
					        	'term' => $term->slug,
					        	'orderby' => 'title',
					        	'order' => 'ASC',
					        	'posts_per_page' => -1 ));

					        if( $bulletins->have_posts() ): ?>
							
					        <h2><?php echo $term->name ;?></h2> 
					   
					        <?php while( $bulletins->have_posts() ) : $bulletins->the_post(); 
					         //Do your general query loop here  ?>				   
							<article class="bulletin small-12 columns" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
								<link itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" />
								<header class="article-header">	
									<h1 class="page-title" itemprop="headline">
										<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
									</h1>
									<h3 class="black" itemprop="datePublished">
										Posted: <?php the_date(); ?>
									</h3>
									<span class="hide" itemprop="author" itemscope itemtype="https://schema.org/Person">
										By <span itemprop="name">Krieger School of Arts & Sciences
										</span>
									</span>
									<meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />
								</header>
								<div class="entry-content" itemprop="text">
									<?php if ( has_post_thumbnail()) { ?> 
									 <?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
									<?php } ?>
									 <span itemprop="description"><?php the_excerpt(); ?></span>
								</div>	
							</article>	
					        <?php endwhile; ?>	
							

				<?php endif; endforeach; endforeach; ?>

			</div>
		</div>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>