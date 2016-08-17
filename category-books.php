<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false);
		$theme_option = flagship_sub_get_global_options(); $news_query_cond = $theme_option['flagship_sub_news_query_cond']; ?>	
		<main class="content archive">
		<h1 class="page-title">Faculty Books Archive</h1>
			<?php
			 if ( have_posts() ) : while (have_posts()) : the_post(); ?>
			 <article>
					<?php if ( has_post_thumbnail()) { ?>
						<?php the_post_thumbnail('medium', array('class'	=> "floatleft")); ?>
					<?php } ?>
					<?php $faculty_post_id = get_post_meta($post->ID, 'ecpt_pub_author', true);
						  $faculty_post_id2 = get_post_meta($post->ID, 'ecpt_pub_author2', true); ?>
				
					<h2>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						
					</h2>
				
				<h3>
					<?php if ( get_post_meta($post->ID, 'ecpt_pub_date', true) ) : echo get_post_meta($post->ID, 'ecpt_pub_date', true);  endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_publisher', true) ) :?>, <?php echo get_post_meta($post->ID, 'ecpt_publisher', true);  endif; ?>
				</h3>
				<p><strong><a href="<?php echo get_permalink($faculty_post_id); ?>"><?php echo get_the_title($faculty_post_id); ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_pub_role', true)) :?>, <?php echo get_post_meta($post->ID, 'ecpt_pub_role', true); endif; ?>
				</a></strong>
				<br><?php if ( get_post_meta($post->ID, 'ecpt_pub_link', true) ) :?> 
							<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_pub_link', true); ?>">
								Purchase on Amazon <span class="fa fa-amazon"></span>
							</a>
						<?php endif; ?>
				<?php if (get_post_meta($post->ID, 'ecpt_author_cond', true) == 'on') { ?><br>
					<strong><a href="<?php echo get_permalink($faculty_post_id2); ?>"><?php echo get_the_title($faculty_post_id2); ?>,&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_pub_role2', true); ?>
					</a></strong>
				<?php } ?>
				</p>
				<?php the_content(); ?>
			</article>
				<hr>
			<?php endwhile; endif; ?>
		<div class="row">
			<?php flagship_pagination(); ?>
		</div>
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>