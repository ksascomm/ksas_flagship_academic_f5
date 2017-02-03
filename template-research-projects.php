<?php
/*
Template Name: Research Projects
*/
?>
<?php get_header();
	//Set Research Projects Query Parameters
				$flagship_researchprojects_query = new WP_Query(array(
					'post_type' => 'ksasresearchprojects',
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => '-1'
					));
					 ?>

<div class="row wrapper radius10">
	<div class="small-12 columns">
		<section class="row">
			
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<p><?php the_content(); ?></p>
			<?php endwhile; endif; ?>
	

			<div id="fields_search" role="search">
				<form action="#">
					<fieldset class="radius10"> 
						<?php $projects = get_terms('project_type', array(
							'orderby' 		=> 'ID',
							'order'			=> 'ASC',
							'hide_empty'	=> true,
							));
						
						$count_projects = count($projects);
						if ($count_projects > 0) { ?>
						<div class="small-12 medium-7 columns">
							<h6>Filter by Project Type:</h6>
							<div class="filter option-set" data-filter-group="project_type">
								<div class="button radio"><a href="#" data-filter="" class="selected">View All</a></div>
								<?php foreach ( $projects as $project ) { ?>
									<div class="button radio <?php echo $project->slug; ?>"><a href="#" data-filter=".<?php echo $project->slug; ?>"><?php echo $project->name; ?></a></div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<div class="small-12 medium-5 columns">
						<h5>Search:</h5>	
							<div class="directory-search">
								<span class="fa fa-search fa-2x" aria-hidden="true"></span>
							</div>								
							<input type="text" name="search" id="id_search" placeholder="Search by name, title, or research area"  /> 
							<label for="id_search" class="screen-reader-text">
								Search by name, title, or research area
							</label>
					</div>
					</fieldset>
				</form>
			</div>
		</section>

		<section class="row" id="fields_container" role="main">
			<?php while ($flagship_researchprojects_query->have_posts()) : $flagship_researchprojects_query->the_post(); 
				//Pull discipline array (humanities, natural, social)
				$program_types = get_the_terms( $post->ID, 'project_type' );
					if ( $program_types && ! is_wp_error( $program_types ) ) : 
						$program_type_names = array();
						$degree_types = array();
							foreach ( $program_types as $program_type ) {
								$program_type_names[] = $program_type->slug;
								$project_types[] = $program_type->name;
							}
						$program_type_name = join( " ", $program_type_names );
						$project_type = join( ", ", $project_types );

					endif; ?>
				
				<!-- Set classes for isotype.js filter buttons -->
				<div class="small-12 medium-4 columns end mobile-field  <?php echo $program_type_name; ?>">
					
					<div class="small-12 columns field radius10" id="<?php echo $program_type->slug ?>">
						
							<?php if ( has_post_thumbnail()) { ?> 
								<?php the_post_thumbnail('exhibits'); ?>
							<?php } ?>			    
							<h5><a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>" class="field"><?php the_title(); ?></a></h5>
						

						<div class="row">
							<div class="small-12 columns fields ">
								<p>
									<?php if (get_post_meta($post->ID, 'ecpt_associate_name', true)) : ?>
												<strong><?php echo get_post_meta($post->ID, 'ecpt_associate_name', true); ?></strong><br>
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
				<div class="medium-5 columns centered">
					<h3> No matching results</h3>
				</div>
		</div>
		</section>
		
	</div>
</div>
 <!-- End content wrapper -->

		<?php get_footer(); ?>