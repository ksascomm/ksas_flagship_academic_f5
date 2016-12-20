<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">
	<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<main class="content bulletin-archive" itemprop="mainEntity" itemscope itemtype="http://schema.org/Blog">
			<?php if(is_tax('profiletype', 'spotlight')){ ?>
				<h1 class="page-title">Spotlights</h1>
			<?php } elseif(is_tax('profiletype', 'undergraduate-profile')){ ?>
				<h1 class="page-title">Undergraduate Profiles</h1>
			<?php } elseif(is_tax('profiletype', 'graduate-profile')){ ?>
				<h1 class="page-title">Graduate Profiles</h1>
			<?php } ?>
			<?php while ( have_posts()) : the_post(); ?>
				<h2 class="profile-title" itemprop="headline">
					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
				</h2>
				<?php if ( has_post_thumbnail()) : ?> 
					<?php if ( has_post_thumbnail()) { ?> 
						 <?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
							<meta itemprop="url" content="<?php the_post_thumbnail_url();?>">
	      					<meta itemprop="width" content="361">
	     					<meta itemprop="height" content="150">
					<?php } ?>
				<?php endif; ?>
				<p itemprop="description"><?php the_excerpt(); ?></p>
					<hr>
				<?php endwhile; ?>
			<div class="row">
				<?php flagship_pagination(); ?>		
			</div>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts/sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>