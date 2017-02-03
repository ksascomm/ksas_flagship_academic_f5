<?php get_header(); ?>
	<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns radius-left offset-topgutter">	
		<?php 
			$home_url = home_url();
			$theme_option = flagship_sub_get_global_options();	
			
				if ( is_single()) { 
					global $post;
					$article_title = $post->post_title;
					$article_link = $post->guid;
				}
				?>
	<nav role="navigation">
		<ul id="menu-main-menu-2" class="breadcrumbs">
			<li><a href="<?php echo $home_url; ?>">Home</a></li>
			<li><a href="<?php echo $home_url; ?>/research-projects/">Research Projects</a></li>
			<li><a href="<?php echo $article_link; ?>"><?php echo $article_title; ?></a></li>
		</ul>
	</nav> 

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section class="content">
		<h3><?php the_title(); ?></h3>
			<div class="project-body">
			<?php the_post_thumbnail('full'); ?>
					<?php if (get_post_meta($post->ID, 'ecpt_associate_name', true)) : ?>
								<p><strong>Associate Name:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_associate_name', true); ?></p>
							<?php endif; ?>
					<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
								<p><strong>Funding Source/Period of the Grant:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></p>
							<?php endif; ?>
					<?php if (get_post_meta($post->ID, 'ecpt_description_full', true)) : ?>
								<p><strong>Description:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_description_full', true); ?></p>
							<?php endif; ?>
			</div>
	</section>
	<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
	</div> <!-- End #page -->

<?php get_footer(); ?>