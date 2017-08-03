<?php 
	$home_url = home_url();
	$theme_option = flagship_sub_get_global_options();	
	
		if ( is_single() && !is_singular(array( 'bulletinboard', 'ai1ec_event', 'profile', 'people' ))) { 
			global $post;
			$article_title = $post->post_title;
			//$article_link = $post->guid;
		?>
		<nav aria-label="breadcrumbs" class="hide-for-print">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo $home_url; ?>/about">About</a></li>
				<li><a href="<?php echo $home_url; ?>/about/archive">News Archive</a></li>
				<li><a href="<?php echo get_permalink(); ?>"><?php echo $article_title; ?></a></li>
			</ul>
		</nav>	
		<?php }
	elseif ( is_archive() ) { ?>
		<nav aria-label="breadcrumbs" class="hide-for-print">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo $home_url; ?>/about">About</a></li>
				<li><a href="<?php echo $home_url; ?>/about/archive">News Archive</a></li>
				<li class="black"><?php echo the_archive_title(); ?></li>
			</ul>
		</nav>	
		<?php }
	elseif (is_singular('ai1ec_event')) { ?>
		<nav aria-label="breadcrumbs" class="hide-for-print">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo $home_url; ?>/events">Events</a></li>
				<li><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
			</ul>
		</nav>
		<?php }
	elseif (is_singular('people')) { ?>
		<nav aria-label="breadcrumbs" class="hide-for-print">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo $home_url; ?>/people">People</a></li>
				<li><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
			</ul>
		</nav>
		<?php }	
	elseif (is_singular('profile')) { ?>
		<nav aria-label="breadcrumbs" class="hide-for-print">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<?php if(has_term('spotlight', 'profiletype')){ ?>
					<li><a href="<?php echo $home_url; ?>/profiletype/spotlight">Spotlights</a></li>
				<?php } elseif(has_term('undergraduate-profile', 'profiletype')){ ?>
					<li><a href="<?php echo $home_url; ?>/profiletype/undergraduate-profile/">Undergraduate Profiles</a></li>
				<?php } elseif(has_term('graduate-profile', 'profiletype')){ ?>
					<li><a href="<?php echo $home_url; ?>/profiletype/graduate-profile/">Graduate Profiles</a></li>
				<?php } ?>
				<li><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
			</ul>
		</nav>
		<?php }			
	elseif ( $theme_option['flagship_sub_breadcrumbs']  == '1' ) { ?>

		<nav aria-label="breadcrumbs" class="hide-for-print">

		<?php  wp_nav_menu( array( 
				'container' => 'false',
				'container_class' => 'offset-topgutter hide-for-print',
				'theme_location' => 'main_nav',
				'menu_class' => 'breadcrumbs',
				'items_wrap' => '<ul id="%1$s" class="%2$s"><li><a href="' . $home_url . '">' . $theme_option['flagship_sub_breadcrumb_home'] . '</a></li>%3$s</ul>',
				'walker'=> new flagship_bread_crumb )); 
		} ?>
		</nav>