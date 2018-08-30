<?php

//Add Theme Options Page
if ( !function_exists( 'create_theme_options' ) ) {    
    function create_theme_options() {
        require_once('assets/functions/theme-options-init.php');    
    }
	if(is_admin()){	
		create_theme_options();
	}
}	
	//Collect current theme option values
		function flagship_sub_get_global_options(){
			$flagship_sub_option = array();
			$flagship_sub_option 	= get_option('flagship_sub_options');
		return $flagship_sub_option;
		}
	
	//Function to call theme options in theme files 
		$flagship_sub_option = flagship_sub_get_global_options();

//Add custom background option
	
function academic_flagship_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 125, 125, true );   // default thumb size
	add_image_size( 'rss', 300, 150, true );
	add_image_size( 'directory', 90, 130, true );
	add_image_size( 'exhibits', 253, 150, true );
	add_theme_support( 'automatic-feed-links' ); // rss thingy
	$bg_args = array(
		'default-color'          => '#000000',
		'default-image'          => get_template_directory_uri() . '/assets/images/bg-default.jpg',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $bg_args  );
	add_theme_support( 'menus' );            
	register_nav_menus(                      
		array( 
			'main_nav' => 'The Main Menu', 
			'search_bar' => 'Search Bar Links',
			'quick_links' => 'Quick Links',
			'footer_links' => 'Footer Links'
		)
	);	
}

// Initiate Theme Support
add_action('after_setup_theme','academic_flagship_theme_support');

//Register Sidebars
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Default Sidebar',
			'id'            => 'page-sb',
			'description'   => 'This is the default sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Graduate Sidebar',
			'id'            => 'graduate-sb',
			'description'   => 'This sidebar will appear on pages under Graduate',
			'before_widget' => '<div id="%1$s" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Undergraduate Sidebar',
			'id'            => 'undergrad-sb',
			'description'   => 'This sidebar will appear on pages under Undergraduate',
			'before_widget' => '<div id="%1$s" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Research Sidebar',
			'id'            => 'research-sb',
			'description'   => 'This sidebar will appear on pages under Research',
			'before_widget' => '<div id="%1$s" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Homepage Sidebar',
			'id'            => 'homepage-sb',
			'description'   => 'This sidebar will only appear on the homepage',
			'before_widget' => '<div id="%1$s" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'News Archive Sidebar',
			'id'            => 'archive-sb',
			'description'   => 'This sidebar will only appear on the news archive page',
			'before_widget' => '<div id="%1$s" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));

	include_once (TEMPLATEPATH . '/assets/functions/page_metabox.php'); 

function get_the_directory_filters($post) {
	$directory_filters = get_the_terms( $post->ID, 'filter' );
					if ( $directory_filters && ! is_wp_error( $directory_filters ) ) : 
						$directory_filter_names = array();
							foreach ( $directory_filters as $directory_filter ) {
								$directory_filter_names[] = $directory_filter->slug;
							}
						$directory_filter_name = join( " ", $directory_filter_names );
						
					endif;
					return $directory_filter_name;
}

function get_the_roles($post) {
	$roles = get_the_terms( $post->ID, 'role' );
					if ( $roles && ! is_wp_error( $roles ) ) : 
						$role_names = array();
							foreach ( $roles as $role ) {
								$role_names[] = $role->slug;
							}
						$role_name = join( " ", $role_names );
						
					endif;
					return $role_name;
}

add_action( 'template_redirect', 'redirect_empty_bios' );
function redirect_empty_bios() {
	if(is_singular('people') ) {
		global $post;
		$bio = get_post_meta($post->ID, 'ecpt_bio', true);
		$link = get_post_meta($post->ID, 'ecpt_website', true);
		if (has_term(array('faculty', 'tenured-and-tenure-track-faculty'), 'role')) {
			if(empty($bio) && isset($link)) {
			    wp_redirect(esc_url($link), 301);
			    exit;
			}
		}
	}
}

/**********DELETE TRANSIENTS******************/

function delete_academic_transients($post_id) {
	global $post;
	if (isset($_GET['post_type'])) {		
		$post_type = $_GET['post_type'];
	}
	else {
		$post_type = $post->post_type;
	}
	switch($post_type) {
		case 'people' :
			$roles = get_terms('role', array(
						'orderby' 		=> 'id',
						'hide_empty'    => true,
						)); 
			foreach($roles as $role) {
			$role_slug = $role->slug;
				delete_transient('people_query_' . $role_slug);
				delete_transient('job_market_query');
				delete_transient('research_staff_query');
				delete_transient('graduate_student_query');
			}
		break;
		
		case 'post' :
			for ($i=1; $i < 5; $i++)
			    { delete_transient('faculty_books_query_' . $i);
			      delete_transient('news_archive_query_' . $i); }
			   
			delete_transient('news_query');
			delete_transient('news_mainpage_query');
		break;
		
		case 'slider' :
			delete_transient('slider_query');
		break;
		case 'course' :
			delete_transient('ksas_course_grad_query');
			delete_transient('ksas_course_undergrad_query');
		break;
		case 'bulletinboard' :
			delete_transient('ksas_bb_undergrad_query');
			delete_transient('ksas_bb_grad_query');
		break;
		case 'profile' :
			delete_transient('ksas_profile_undergrad_query');
			delete_transient('ksas_profile_grad_query');
			delete_transient('ksas_profile_spotlight_query');
	}
}
	add_action('save_post','delete_academic_transients');

/**********ADD PEOPLE TO SITEMAPS******************/
function my_sitemap_replacement ($content) {
	//return $content . '<empty>Nothing here</empty>';
	$totalposts = apply_filters('simple_sitemaps-totals_soft_limit', (defined('SIMPLE_SITEMAPS_POST_SOFT_LIMIT') ? SIMPLE_SITEMAPS_POST_SOFT_LIMIT : 50));
	$latestposts = $totalposts ? get_posts( 'post_type=people&numberposts=' . $totalposts . '&orderby=date&order=DESC' ) : array();
	foreach ( $latestposts as $post ) {
		$content .= "	<url>\n";
		$content .= '		<loc>' . get_permalink( $post->ID ) . "</loc>\n";
		$content .= '		<lastmod>' . mysql2date( 'Y-m-d\TH:i:s', $post->post_modified_gmt ) . "+00:00</lastmod>\n";
		$content .= '		<priority>' . number_format( 1, 1 ) . "</priority>\n";
		$content .= "	</url>\n";
	}
	return $content;
}
add_filter('simple_sitemaps-generated_urlset', 'my_sitemap_replacement');


add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

/**********CUSTOM OPEN GRAPH TAGS******************/
//Add Open Graph Meta Info from the actual article data, or customize as necessary
	function facebook_open_graph() {
	    global $post;
	    if ( !is_singular()) //if it is not a post or a page
	        return;
		if($excerpt = $post->post_content) 
	        {
 				$uglyexcerpt = strip_tags($post->post_content);
				$uglyexcerpt = str_replace("", "'", $uglyexcerpt);
				$excerpt = wp_trim_words($uglyexcerpt, 25, '...');
        	} 
        	elseif (is_singular('people')) {
        		$longexcerpt = strip_tags(get_post_meta($post->ID, 'ecpt_bio', true));
        		$longexcerpt = str_replace("", "'", $longexcerpt);
        		$excerpt = wp_trim_words($longexcerpt, 15, '...');
        	}
        	elseif (is_page_template( 'template-people-directory.php' )) {
        		$excerpt = get_the_title();
        	}
        	else
        	{
            	$excerpt = get_bloginfo('title');
			}

	        echo '<meta property="og:title" content="' . get_the_title() ." | " . get_bloginfo('title')  . '"/>';
			echo '<meta property="og:description" content="' . $excerpt . '"/>';
	        echo '<meta property="og:type" content="article"/>';
	        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	        echo '<meta name="twitter:card" content="summary" />';
			echo '<meta name="twitter:site" content="@JHUArtsSciences" />';
	        
	    // Customize the below with the name of your site
	        echo '<meta property="og:site_name" content="'. get_bloginfo( 'title' ) .'"/>';
	        if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
	    //Create a default image on your server or an image in your media library, and insert it's URL here
	        $default_image=  get_template_directory_uri() . '/assets/images/gilman.jpg';
	        echo '<meta property="og:image" content="' . $default_image . '"/>';
	    }
	    else{
	        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	    }

	    echo "
	";
	}
add_action( 'wp_head', 'facebook_open_graph', 5 );

/**********INCREASE POST META OPTIONS******************/
add_filter( 'postmeta_form_limit', 'meta_limit_increase' );
function meta_limit_increase( $limit ) {
    return 100;
}

/*****FORMIDABLE UPLOADS ***/
add_filter( 'frm_load_dropzone', '__return_false' );

/*****BLOCK COMMENTS & TRACKBACKS ***/
require_once(get_template_directory() . '/assets/functions/block-comments.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

?>