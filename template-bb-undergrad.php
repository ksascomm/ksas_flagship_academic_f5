<?php
/*
Template Name: Bulletin Board - Undergrad
*/
?>

<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section class="content news">
 			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
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

					        $bulletins = new WP_Query( "taxonomy=$taxonomy&term=$term->slug&posts_per_page=2" );

					        if( $bulletins->have_posts() ): ?>
							
					        <h2>Latest <?php echo $term->name ;?></h2> 
					   
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
							 </article>		
		
					        <?php endwhile; ?>
					        <div class="small-12 columns">
								<h3 class="floatright"><a href="<?php echo home_url('/bbtype/'); echo $term->slug?>">View all <?php echo $term->name ;?></a></h3>
							</div>	
							<hr>

				<?php endif; endforeach; endforeach; ?>

			</article>
		</section>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>