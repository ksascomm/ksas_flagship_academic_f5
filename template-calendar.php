<?php
/*
Template Name: Calendar
*/
?>
<?php get_header(); ?>
<?php $theme_option = flagship_sub_get_global_options(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="large-12 columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			
			<!-- /************Calendar display**************/ -->	
				<div class="row hide-for-small-only" id="calendar_container"></div>
				<div class="row show-for-small-only">
					<a href="<?php echo $theme_option['flagship_sub_calendar_address']; ?>">View our Events Calendar</a>
				</div>
		</section>
	</div>
</div> 
<?php get_footer(); ?>