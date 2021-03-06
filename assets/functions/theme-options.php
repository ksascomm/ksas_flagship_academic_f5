<?php
/**
 * Define our settings sections
 *
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page );
 * @return array
 */
function flagship_sub_options_page_sections() {
	
	$sections = array();
	// $sections[$id] 				= __($title, 'flagship_sub_textdomain');
	$sections['homepage_section'] 	= __('Homepage Options', 'flagship_sub_textdomain');
	$sections['select_section'] 	= __('Content Options', 'flagship_sub_textdomain');
	$sections['footer_section'] 	= __('Footer Options', 'flagship_sub_textdomain');
	$sections['technical_section'] 	= __('Technical Options', 'flagship_sub_textdomain');
	$sections['directory_section']  = __('Directory Search Options', 'flagship_sub_textdomain');
	return $sections;	
}

/**
 * Define our form fields (settings) 
 *
 * @return array
 */
function flagship_sub_options_page_fields() {
	// Text Form Fields section
	// Select Form Fields section
	$options[0] =
	array (		
		"section" => "homepage_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_feed_name",
		"title"   => __( 'Homepage Sub-head', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the headline for the news feed on the homepage', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "nohtml",
		"std"    => "");
	$options[1] =
	array (		
		"section" => "homepage_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_news_quantity",
		"title"   => __( 'Homepage Posts', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the number of posts you would like displayed on the homepage', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "numeric",
		"std"    => "");
	$options[2] =
	array (		
		"section" => "homepage_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_slider_style",
		"title"   => __( 'Homepage slider style', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Choose to have a horizontal or vertical caption on your slider', 'flagship_sub_textdomain' ),
		"type"    => "select",
		"choices" => array("horizontal", "vertical"),
		"std"    => "vertical");
	$options[3] =
	array (		
		"section" => "select_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_breadcrumbs",
		"title"   => __( 'Breadcrumbs', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Do you want breadcrumb navigation on your subpages?', 'flagship_sub_textdomain' ),
		"type"    => "checkbox",
		"std"    => "1");
	$options[4] =
	array (		
		"section" => "directory_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_directory_search",
		"title"   => __( 'Directory Search', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Do you want a search box for your people directory?', 'flagship_sub_textdomain' ),
		"type"    => "checkbox",
		"std"    => "1");	
	$options[5] =
	array (		
		"section" => "select_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_breadcrumb_home",
		"title"   => __( 'Breadcrumb Name', 'flagship_sub_textdomain' ),
		"desc"    => __( 'What do you want Home to be called in your breadcrumb navigation?', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "nohtml",
		"std"    => "Home");
	$options[6] =
	array (		
		"section" => "technical_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_google_analytics",
		"title"   => __( 'Google Analytics ID', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter your Google Analytics ID ie. UA-2497774-9', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "nohtml",
		"std"    => "UA-40512757-1");
	$options[7] =
	array (		
		"section" => "technical_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_search_collection",
		"title"   => __( 'GSA Collection', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the name of the google search appliance collection', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "nohtml",
		"std"    => "krieger_collection");
	$options[8] =
	array (		
		"section" => "select_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_calendar_address",
		"title"   => __( 'Calendar URL', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the URL of your Site Executive calendar instance', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "nohtml",
		"std"    => "");		
	$options[9] =
	array (		
		"section" => "footer_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_quicklinks",
		"title"   => __( 'Quicklinks', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Do you want to use quicklinks from another site?', 'flagship_sub_textdomain' ),
		"type"    => "checkbox",
		"std"    => "1");		
	$options[10] =
	array (		
		"section" => "footer_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_quicklinks_id",
		"title"   => __( 'Quicklinks Site ID', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the site ID for the quicklinks you would like to use. krieger.jhu.edu is 1', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "numeric",
		"std"    => "1");
	$options[11] =
	array (		
		"section" => "footer_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_copyright",
		"title"   => __( 'Department Address', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the department address', 'flagship_sub_textdomain' ),
		"type"    => "textarea",
		"std"    => "Zanvyl Krieger School of Arts & Sciences");
	$options[12] =
	array (		
		"section" => "directory_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_role_search",
		"title"   => __( 'Filter by Role', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Do you want to be able to filter by role (faculty, research staff, emertiti)?', 'flagship_sub_textdomain' ),
		"type"    => "checkbox",
		"std"    => "0");		
	$options[13] =
	array (		
		"section" => "directory_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_research_search",
		"title"   => __( 'Filter by Expertise', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Do you want to be able to filter by expertise/research area?', 'flagship_sub_textdomain' ),
		"type"    => "checkbox",
		"std"    => "0");	
	$options[14] =
	array (		
		"section" => "homepage_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_news_query_cond",
		"title"   => __( 'News Feed Option', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Do you want to exclude faculty books from your news feeds?', 'flagship_sub_textdomain' ),
		"type"    => "checkbox",
		"std"    => "0");
	$options[15] =
	array (		
		"section" => "technical_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_isis_name",
		"title"   => __( 'ISIS Department Name', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Enter the ISIS department name', 'flagship_sub_textdomain' ),
		"type"    => "text",
		"class"   => "nohtml",
		"std"    => "");
	$options[16] =
	array (		
		"section" => "select_section",
		"id"      => FLAGSHIP_SUB_SHORTNAME . "_color_scheme",
		"title"   => __( 'Color Scheme', 'flagship_sub_textdomain' ),
		"desc"    => __( 'Choose your theme color scheme', 'flagship_sub_textdomain' ),
		"type"    => "select",
		"choices" => array('blue','black','yellow','green','purple','red','aqua'),
		"std"    => "blue");

	$options[17] =
	array(		
		'section' => 'homepage_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_hub_cond',
		'title'   => __( 'Hub Feed Option', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Do you want to display articles from The Hub?', 'flagship_sub_textdomain' ),
		'type'    => 'checkbox',
		'std'    => 0,
);	
	$options[18] =
	array(		
		'section' => 'homepage_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_hub_keywords',
		'title'   => __( 'Hub Keywords', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Enter keywords. Use hyphens instead of spaces (comma separated, no spaces) ie. physics,arts-and-sciences.', 'flagship_sub_textdomain' ),
		'type'    => 'text',
		'class'   => 'nohtml',
		'std'    => '',
);
	$options[19] =
	array(
		'section' => 'technical_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_siteimprove_analytics',
		'title'   => __( 'Siteimprove Analytics', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Do you want to display the Siteimprove Analytics script?', 'flagship_sub_textdomain'  ),
		'type'    => 'checkbox',
		'std'    => '0',
);
	return $options;	
}

?>