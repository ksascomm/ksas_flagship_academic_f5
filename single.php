<?php get_header(); ?>
<main class="row wrapper radius10" id="page" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="large-12 columns radius-left offset-topgutter">	
		<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="content news" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
			<link itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" />
			<?php if (in_category('books')) {
					locate_template('single-category-books.php', true, false);
			} else { ?>
			<header class="article-header">		
				<h2 itemprop="datePublished"><?php the_date(); ?></h2>
				<h1 itemprop="headline"><?php the_title();?></h1>
				<span class="hide" itemprop="author" itemscope itemtype="https://schema.org/Person">
				    By <span itemprop="name">Krieger School of Arts & Sciences</span>
				 </span>
				<meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />
			</header> <!-- end article header -->
			<div class="entry-content" itemprop="articleBody">
			<?php if ( has_post_thumbnail()) { ?> 
				<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
					<meta itemprop="url" content="<?php the_post_thumbnail_url();?>">
  					<meta itemprop="width" content="361">
 					<meta itemprop="height" content="150">
				</div>
			<?php } ?>
			<span class="hide" itemscope itemprop="publisher" itemtype="http://schema.org/Organization">
				<a itemprop="url" href="https://krieger.jhu.edu">
				    <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				       <img itemprop="url" content="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="JHU Logo">
				       <meta itemprop="width" content="600">
				       <meta itemprop="height" content="60">
				    </span>   
				    <span itemprop="name">Krieger School of Arts & Sciences</span>
		        </a>
		    </span>
			<span itemprop="description">
				<?php the_content(); }?>
			</span>
			</div> <!-- end article section -->
		</article> <!-- end article -->
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</main> <!-- End #page -->
<?php get_footer(); ?>