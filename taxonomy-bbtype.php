<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 columns wrapper radius-left offset-topgutter">	
	<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
<?php 
	$home_url = home_url();
	if(is_tax('bbtype', 'jobs-bb')) {
		$bbname = "Job Opportunities";
		$bblink = 'jobs-bb';
	}
	elseif(is_tax('bbtype', 'research-bb')) {
		$bbname = "Research Opportunities";
		$bblink = 'research-bb';
	}
	elseif(is_tax('bbtype', 'internships-bb')) {
		$bbname = "Internship Opportunities";
		$bblink = 'internships-bb';
	}
	elseif(is_tax('bbtype', 'volunteering-bb')){
		$bbname = "Volunteering Opportunities";
		$bblink = 'volunteering-bb';
	}
	elseif(is_tax('bbtype', 'research-internships')){
		$bbname ="Research & Internships";
		$bblink = 'research-internships';
	}
	elseif(is_tax('bbtype', 'international-programs')){
		$bbname = "International Travel Grants";
		$bblink = 'international-programs';
	}
	elseif(is_tax('bbtype', 'language-grants')){
		$bbname = "Language Learning Grants";
		$bblink = 'language-grants';
	} else {
		$bbname = "Bulletin Board";
	}
	?>



		<main class="content bulletin-archive" itemprop="mainEntity" itemscope itemtype="http://schema.org/Blog">

			<h1 class="page-title"> <?php echo $bbname;?> </h1>

			<?php if(is_tax('bbtype', 'research-internships') || is_tax('bbtype', 'international-programs') || is_tax('bbtype', 'language-grants') ){ ?>	

				<?php $posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1'); ?>

				<?php while ( have_posts()) : the_post(); ?>
					<div class="small-12 columns"> 
						<h2 itemprop="headline">
							<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
						</h2>
						<p itemprop="description"><?php the_excerpt(); ?></p>
						<hr>
					</div>	
				<?php endwhile; ?>

			<?php } else { ?>

				<?php while ( have_posts()) : the_post(); ?>
					<div class="small-12 columns"> 	
						<h2 itemprop="headline">
							<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
						</h2>
						<p itemprop="datePublished">
							<strong>Posted: <?php the_date(); ?></strong>
							<span class="hide" itemprop="author" itemscope itemtype="https://schema.org/Person">By <span itemprop="name">Krieger School of Arts & Sciences</span>
							</span>
							<meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />							
						</p>
						<?php if ( has_post_thumbnail()) { ?> 
							 <?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
								<meta itemprop="url" content="<?php the_post_thumbnail_url();?>">
		      					<meta itemprop="width" content="361">
		     					<meta itemprop="height" content="150">
						<?php } ?>
						<p itemprop="description"><?php the_excerpt(); ?></p>
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