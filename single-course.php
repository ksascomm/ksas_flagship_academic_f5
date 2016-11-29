<?php get_header(); ?>
<main class="row wrapper radius10" id="page" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="content news" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<header class="article-header">		
					<h1 itemprop="headline"><?php the_title();?></h1>
				</header> <!-- end article header -->
				<section class="entry-content" itemprop="articleBody">
					<?php if ( get_post_meta($post->ID, 'ecpt_credit', true) ) : ?>
						&nbsp;(<?php echo get_post_meta($post->ID, 'ecpt_credit', true); ?> Credits)
					<?php endif; ?></h5>
					<?php the_content()?>
					<?php if ( get_post_meta($post->ID, 'ecpt_prereqs', true) ) : ?>
						<p><strong>Prerequisites:</strong> 
						<?php echo get_post_meta($post->ID, 'ecpt_prereqs', true); ?></p>
					<?php endif; ?>
					<p>
					<?php if ( get_post_meta($post->ID, 'ecpt_instructor', true) ) : ?>
						<strong>Instructor:</strong> 
						<?php echo get_post_meta($post->ID, 'ecpt_instructor', true); ?><br>
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_course_times', true) ) : ?>
						<strong>Course Times:</strong> 
						<?php echo get_post_meta($post->ID, 'ecpt_course_times', true); ?><br>
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_course_limit', true) ) : ?>
						<strong>Course Limit:</strong> 
						<?php echo get_post_meta($post->ID, 'ecpt_course_limit', true); ?><br>
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_course_website', true) ) : ?>
						<a href="<?php echo get_post_meta($post->ID, 'ecpt_course_website', true); ?>" target="_blank">View course website/syllabus</a>
					<?php endif; ?>
					</p>
				</section> <!-- end article section -->
			</article> <!-- end article -->
		<?php endwhile; endif;?>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</main> <!-- End #landing -->
<?php get_footer(); ?>