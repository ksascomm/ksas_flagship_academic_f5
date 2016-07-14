<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>		
		<main class="content">
		<?php if(is_tax('bbtype', 'jobs-bb')){ ?>
			<h1 class="page-title">Job Opportunities</h1>
		<?php } elseif(is_tax('bbtype', 'research-bb')){ ?>
			<h1 class="page-title">Research Opportunities</h1>
		<?php } elseif(is_tax('bbtype', 'internships-bb')){ ?>
			<h1 class="page-title">Internship Opportunities</h1>
		<?php } elseif(is_tax('bbtype', 'volunteering-bb')){ ?>
			<h1 class="page-title">Volunteering Opportunities</h1>
		<?php } elseif(is_tax('bbtype', 'research-internships')){ ?>
			<h1 class="page-title">Funding for Research & Internships</h1>
		<?php } elseif(is_tax('bbtype', 'international-programs')){ ?>
			<h1 class="page-title">International Programs</h1>
		<?php } elseif(is_tax('bbtype', 'language-grants')){ ?>
			<h1 class="page-title">Language Learning Grants</h1>
		<?php } else { ?>
			<h1 class="page-title">Bulletin Board</h1>
		<?php } ?>

		<?php if(is_tax('bbtype', 'research-internships') || is_tax('bbtype', 'international-programs') || is_tax('bbtype', 'language-grants') ){ ?>	

			<?php $posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1'); ?>

			<?php while ( have_posts()) : the_post(); ?>
				<div class="small-12 columns"> 
					<a href="<?php the_permalink(); ?>">	
						<h2><?php the_title();?></h2>
							<?php if ( has_post_thumbnail()) { ?> 
								<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
							<?php } ?>
						<?php the_excerpt(); ?>
					</a>
					<hr>
				</div>	
			<?php endwhile; ?>

		<?php } else { ?>

			<?php while ( have_posts()) : the_post(); ?>
				<div class="small-12 columns"> 
					<a href="<?php the_permalink(); ?>">	
						<h2><?php the_title();?></h2>
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

		<?php } ?>


		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>