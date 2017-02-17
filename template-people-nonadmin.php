<?php
/*
Template Name: People Directory (Non-Administration People)
*/
?>
<?php get_header();
if ( false === ( $associates_people_query = get_transient( 'associates_people_query' ) ) ) {
// It wasn't there, so regenerate the data and save the transient
	$associates_people_query = new WP_Query(array(
		'post_type' => 'people',
		'role' => 'associates',
		'meta_key' => 'ecpt_people_alpha',
		'orderby' => 'meta_value',
		'order' => 'ASC',
			'posts_per_page' => '-1'));
	set_transient( 'staff_people_query', $associates_people_query, 2592000 );
	}
	$associates_page_query = new WP_Query(array(
		'post_type' => 'page',
		'pagename' => 'associates',
	));
	$role_slug = $role->slug;
	$role_name = $role->name;
?>
<div class="row wrapper radius10" id="page">
	<?php locate_template('/parts/nav-breadcrumbs.php', true, false); ?>
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title();?></h2>
		<?php endwhile; endif; ?>
		<?php $theme_option = flagship_sub_get_global_options();
		if ( $theme_option['flagship_sub_directory_search']  == '1' ) { locate_template('/parts/directory-search.php', true); } ?>
	</div>
	<div class="row" id="fields_container">
		<ul class="large-12 columns" id="directory">
			<!-- Staff Query -->
			<?php if($associates_people_query->have_posts()) : ?>
			<a name="staff" id="staff"></a>
			<li class="person sub-head staff quicksearch-match"><h2 class="black"><?php echo $role_name; ?></h2></li>
			<?php while ($associates_people_query->have_posts()) : $associates_people_query->the_post(); ?>
			<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
				<div class="row">
					
					<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?><a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank"><?php endif; ?>
						<?php if ( has_post_thumbnail()) { ?>
						<?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small')); ?>
						<?php } ?>
						<h4 class="no-margin"><?php the_title(); ?></h4>
					<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?></a><?php endif; ?>
					<h5>
					<?php  if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
					<?php  echo get_post_meta($post->ID, 'ecpt_position', true); ?>
					<?php  endif; ?>
					</h5>
					<h5 class="subheader">
					<?php  if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
					<?php  echo get_post_meta($post->ID, 'ecpt_degrees', true); ?>
					<?php  endif; ?>
					</h5>
					<p class="contact no-margin">
						<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
						<span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
						<span class="icon-printer"><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
						<span class="icon-mail"><a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>">
							
						<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?> </a></span>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
						<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span>
						<?php endif; ?>
					</p>
					<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?><p><b>Research Interests:&nbsp;</b><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></p><?php endif; ?>
					
				</div>
			</li>
			<?php endwhile; endif;?>
			<!-- Staff Page -->
			<?php if($associates_page_query->have_posts()) : ?>
			<a name="staff" id="staff"></a>
			<?php while ($associates_page_query->have_posts()) : $associates_page_query->the_post(); the_content(); endwhile; endif;?>
			<?php if ( $theme_option['flagship_sub_directory_search']  == '1' ) { ?>
			<div class="row" id="noresults">
				<div class="small-12 large-4 columns centered">
					<h3>No matching results</h3>
				</div>
			</div>
			<?php } ?>
		</ul>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  the_content(); endwhile; endif; ?>
		</div>
	</div>
	</div> <!-- End content wrapper -->
	<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.directory.min.js"></script>
	<script>
	var $x = jQuery.noConflict();
	$x(window).load(function() {
	var filterFromQuerystring = getParameterByName('filter');
	$x('.filter a[data-filter=".' + filterFromQuerystring  + '"]').click();
	});
	</script>
	<?php get_footer(); ?>