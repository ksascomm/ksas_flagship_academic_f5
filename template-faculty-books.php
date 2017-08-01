<?php
/*
Template Name: Faculty Books
*/
?>	
<?php get_header(); ?>
<div class="row wrapper radius10" id="page">
	<div class="small-10 columns">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<main class="content post-archive" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php 
				$faculty_book_query = new WP_Query(array(
					'nopaging' => true,
					'post_type' => 'post',
					'category_name' => 'books',
					)); 
			 if ( $faculty_book_query->have_posts() ) : while ($faculty_book_query->have_posts()) : $faculty_book_query->the_post(); ?>
			<article aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('medium', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
					<?php } ?>
					<?php $faculty_post_id = get_post_meta($post->ID, 'ecpt_pub_author', true);
						  $faculty_post_id2 = get_post_meta($post->ID, 'ecpt_pub_author2', true); ?>
			
				<ul class="no-bullet">
					<li>
						<h2 itemprop="headline" id="post-<?php the_ID(); ?>">
							<?php the_title(); ?>
						</h2>
					</li>
					<li>
					<?php if ( get_post_meta($post->ID, 'ecpt_pub_date', true) ) :?> 
						<?php echo get_post_meta($post->ID, 'ecpt_pub_date', true);  ?>,
					<?php endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_publisher', true) ) :?>
						<?php echo get_post_meta($post->ID, 'ecpt_publisher', true); ?> 
					<?php endif; ?>	
					</li>
					<li>
						<a href="<?php echo get_permalink($faculty_post_id); ?>">
							<?php echo get_the_title($faculty_post_id); ?>, 
								<?php if ( get_post_meta($post->ID, 'ecpt_pub_role', true)) :?> 
									<?php echo get_post_meta($post->ID, 'ecpt_pub_role', true);?>
								<?php endif; ?>
						</a>
					</li>
					<li><?php if (get_post_meta($post->ID, 'ecpt_author_cond', true) == 'on') { ?><br>
							<a href="<?php echo get_permalink($faculty_post_id2); ?>">
							<?php echo get_the_title($faculty_post_id2); ?>,&nbsp;
								<?php echo get_post_meta($post->ID, 'ecpt_pub_role2', true); ?>
							</a>
						<?php } ?>
					</li>
					<li><?php if ( get_post_meta($post->ID, 'ecpt_pub_link', true) ) :?> 
							<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_pub_link', true); ?>">
								Purchase Online <span class="fa fa-external-link-square"></span>
							</a>
						<?php endif; ?>
					</li>
				</ul>

				<?php the_content(); ?>
				<hr>
			</article>	
			<?php endwhile; endif; ?>
		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>