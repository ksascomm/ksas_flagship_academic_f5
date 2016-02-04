<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>		
		<main class="content" role="main">
		<?php if(is_tax('bbtype', 'jobs-bb')){ ?>
			<h2>Jobs Opportunities</h2>
		<?php } elseif(is_tax('bbtype', 'internships-bb')){ ?>
			<h2>Internships Opportunities</h2>
		<?php } elseif(is_tax('bbtype', 'volunteering-bb')){ ?>
			<h2>Volunteering Opportunities</h2>
		<?php } else { ?>
		<h2>Bulletin Board</h2>
		<?php } ?>
		<?php while ( have_posts()) : the_post(); ?>
			<div class="small-12 columns"> 
			<a href="<?php the_permalink(); ?>">	
				<h6><?php the_date(); ?></h6>
				<h5><?php the_title();?></h5>
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
					<?php } ?>
				<?php the_excerpt(); ?>
			</a>
				<hr>
				</div>	
			<?php endwhile; ?>

		<div class="row">
			<?php flagship_pagination($wp_query->max_num_pages); ?>		
		</div>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>