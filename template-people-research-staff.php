<?php
/*
Template Name: Research Staff
*/
?>	

<?php get_header(); 
if ( false === ( $research_staff_query = get_transient( 'research_staff_query' ) ) ) :
       // It wasn't there, so regenerate the data and save the transient
	$research_staff_query = new WP_Query(array(
		'post_type' => 'people',
		'role' => 'research',
		'meta_key' => 'ecpt_people_alpha',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'posts_per_page' => '-1'));        	
	set_transient( 'research_staff_query', $research_staff_query, 2592000 );
endif;  ?>

<main class="row wrapper radius10" id="page" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php locate_template('parts/nav-breadcrumbs.php', true, false); ?>	
	<div class="content row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 class="page-title"><?php the_title();?></h1>
		<?php endwhile; endif; ?>
		<div id="fields_search" class="small-12 large-10 columns panel radius10">

			<div class="row">		
				<div class="directory-search">
					<span class="fa fa-search fa-2x" aria-hidden="true"></span>
				</div>
				<input type="text" name="search" id="id_search" placeholder="Search by name, title, and research interests"  /> 
					<label for="id_search" class="screen-reader-text">
						Search by name, title, and research interests
					</label>
			</div>

		</div>
	</div>



	<div class="row" id="fields_container">
		<ul class="large-12 columns" id="directory">
		<!-- Staff Query -->
		<?php if($research_staff_query->have_posts()) : ?>
		<a name="staff" id="staff"></a>
		<?php while ($research_staff_query->have_posts()) : $research_staff_query->the_post(); ?>
				<li class="person <?php echo get_the_roles($post); ?>-staff">
					<div class="row">	
						<?php if ( has_post_thumbnail()) : ?> 
							<?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small')); ?>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?> 
							<h4 class="no-margin">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
						<?php else : ?>	    
							<h4 class="no-margin"><?php the_title(); ?></h4>
						<?php endif; ?>
						<?php if ( array(get_post_meta($post->ID, 'ecpt_position', true) || get_post_meta($post->ID, 'ecpt_degrees', true )) ) : ?>
							<h5 class="subheader no-margin">
							
								<?php echo get_post_meta($post->ID, 'ecpt_position', true); ?>
							
								<br>
							
								<?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?>
							
							</h5>
						<?php endif; ?>	
						<p class="contact no-margin">
							<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
								<span class="icon-phone"> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
								<span class="icon-printer"> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
								<span class="icon-mail"> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"><?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></span>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
								<span class="icon-location"> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
	    						<span class="icon-globe">
									<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank">Personal Website</a>
								</span>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
				    		<span class="icon-globe">
				    			<a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" onclick="ga('send', 'event', 'People Directory', 'Group/Lab Website', '<?php the_title(); ?> | <?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>')" target="_blank">Group/Lab Website</a>
				    		</span>
			    		<?php endif; ?>

						</p>
						<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
							<p class="expertise">
								<strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?>
							</p>
						<?php endif; ?>
					</div>
				</li>			
			<?php endwhile; endif;?>	
		</ul>
	</div>
</main> <!-- End content wrapper -->
<?php get_footer(); ?>