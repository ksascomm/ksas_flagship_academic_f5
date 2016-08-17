<?php
/*
Template Name: Exhibitions & Programs
*/
?>
<?php get_header();
	//Set Exhibitions & Programs Query Parameters
				$flagship_exhibitions_query = new WP_Query(array(
					'post_type' => 'ksasexhibits',
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => '-1'
					));
					 ?>

<div class="row wrapper radius10">
	<div class="small-12 columns">
		<div class="row">
			
			<div class="small-12 large-7 columns content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<p><?php the_content(); ?></p>
			<?php endwhile; endif; ?>
			</div>

			<div class="small-12 large-5 columns panel radius10" id="fields_search" role="search">

						<?php $exhibits = get_terms('exhibition_type', array(
							'orderby' 		=> 'ID',
							'order'			=> 'ASC',
							'hide_empty'	=> true,
							));
						
						$count_exhibits = count($exhibits);
						if ($count_exhibits > 0) { ?>
						<div class="row">
							<h6>Filter by Exhibit Type:</h6>
						</div>
						
						<div class="row filter option-set" data-filter-group="exhibition_type">
							<div class="button radio"><a href="#" data-filter="" class="selected">View All</a></div>
							<?php foreach ( $exhibits as $exhibit ) { ?>
								<div class="button radio"><a href="#" data-filter=".<?php echo $exhibit->slug; ?>"><?php echo $exhibit->name; ?></a></div>
							<?php } ?>
						</div>
					<?php } ?>
					<div class="row">
						<h5>Search by keyword:</h5>		
						<div class="directory-search">
							<span class="fa fa-search fa-2x" aria-hidden="true"></span>
						</div>
						<input type="text" name="search" value="" id="id_search" aria-label="Search"  /> 
						<label for="id_search" class="screen-reader-text">
							Search by keyword
						</label>
					</div>

			</div>
		</div>

		<main class="row" id="fields_container">
			<?php while ($flagship_exhibitions_query->have_posts()) : $flagship_exhibitions_query->the_post(); 
		//Pull discipline array (humanities, natural, social)
		$program_types = get_the_terms( $post->ID, 'exhibition_type' );
			if ( $program_types && ! is_wp_error( $program_types ) ) : 
				$program_type_names = array();
				$degree_types = array();
					foreach ( $program_types as $program_type ) {
						$program_type_names[] = $program_type->slug;
						$exhibition_types[] = $program_type->name;
					}
				$program_type_name = join( " ", $program_type_names );
				$exhibition_type = join( ", ", $exhibition_types );

			endif; ?>
		
		<!-- Set classes for isotype.js filter buttons -->
		<div class="medium-4 small-12 columns mobile-field  <?php echo $program_type_name . ' ' . $school_name; ?>">
			
			<div class="small-12 columns field radius10" id="<?php echo $program_name; ?>">
				<a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>" class="field">
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('exhibits'); ?>
					<?php } ?>			    
					<h4 class="white"><?php the_title(); ?></h4>
				</a>

				<div class="row">
					<div class="small-12 columns fields ">
						<p>
							<?php if (get_post_meta($post->ID, 'ecpt_location', true)) : ?>
										<strong><?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></strong><br>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
										<strong><?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></strong><br>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_description_short', true)) : ?>
										<?php echo get_post_meta($post->ID, 'ecpt_description_short', true); ?><br>
									<?php endif; ?>
						</p>

					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	<div class="row" id="noresults">
			<div class="medium-4 columns centered">
				<h3> No matching results</h3>
			</div>
	</div>
		</main>
		
	</div>
</div>
 <!-- End content wrapper -->
	
		<?php get_footer(); ?>
		