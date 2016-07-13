<?php
/*
Template Name: Bulletin Board - Funding Opportunites
*/
?>

<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section class="content">
 			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
 				<!--Start the loop -->
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content() ?>
			<?php endwhile; endif ?>
			
			<article class="bulletinboard">
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
							
					        <h3><?php echo $term->name ;?></h3> 
					   
					        <?php while( $bulletins->have_posts() ) : $bulletins->the_post(); 
					         //Do you general query loop here  ?>				   
							<article class="bulletin small-12 columns">
								<a href="<?php the_permalink(); ?>">	
										<h1 class="page-title"><?php the_title();?></h1>
											<?php if ( has_post_thumbnail()) { ?> 
												<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
											<?php } ?>
										<?php the_excerpt(); ?>
									</a>
							<hr>		
							 </article>		
		
					        <?php endwhile; ?>	
							

				<?php endif; endforeach; endforeach; ?>

			</article>
		</section>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>