<?php get_header(); ?>
	<div class="row wrapper radius10" id="page" role="main">
		<div class="small-12 columns radius-left offset-topgutter">	
			<?php 
				$home_url = home_url();
				$theme_option = flagship_sub_get_global_options();	
				
					if ( is_single()) { 
						global $post;
						$article_title = $post->post_title;
						$article_link = $post->guid;
					}
					?>
			<nav role="navigation">
				<ul id="menu-main-menu-2" class="breadcrumbs">
					<li><a href="<?php echo $home_url; ?>">Home</a></li>
					<li><a href="<?php echo $home_url; ?>/exhibitions">Exhibitions</a></li>
					<li><a href="<?php echo $article_link; ?>"><?php echo $article_title; ?></a></li>
				</ul>
			</nav> 

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<main class="content">
				<h1 class="page-title"><?php the_title(); ?></h1>

					<div class="small-12 columns">
						<div id="featured">
								<?php $args = array( 
							        'post_type' => 'attachment', 
							        'orderby' => 'menu_order', 
							        'order' => 'ASC', 
							        'post_mime_type' => 'image',
							        'post_status' => null, 
							        'numberposts' => null, 
							        'post_parent' => $post->ID 
							    );

							    $attachments = get_posts( $args );
							    if( ! empty( $attachments ) ) :
							?>
							<ul id="slider" data-orbit data-options="animation: fade; animation_speed:2000; timer:true; advance_speed:700; navigation_arrows:false; bullets:false; slide_number:false;" class="exhibit-slide">
							  <?php foreach ( $attachments as $attachment ) {
						            $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
						            $image_title = $attachment->post_title;
						            $caption = $attachment->post_excerpt;
						            $description = $attachment->post_content;
					        	?>  
									 <li>
						                <div class="exhibit">
						                    <img src="<?php echo wp_get_attachment_url($attachment->ID); ?>" alt="<?php echo $alt; ?>">
						                </div>
						            </li>

						        <?php } ?>
						    </ul>
						<?php endif; ?>
						</div>	
					</div>
				<div class="small-12 columns">
					<div class="exhibit-body">
							<?php if (get_post_meta($post->ID, 'ecpt_location', true)) : ?>
										<p><strong>Location:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></p>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
										<p><strong>Dates:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></p>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_description_full', true)) : ?>
										<p><strong>Description:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_description_full', true); ?></p>
									<?php endif; ?>
					</div>
				</div>
			</main>
			<?php endwhile; endif; ?>
		</div>	<!-- End main content (left) section -->
	</div> <!-- End #page -->

<?php get_footer(); ?>