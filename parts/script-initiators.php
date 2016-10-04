<!***********ALL PAGES**************>  

		<script async>
			var $x = jQuery.noConflict();
				$x('#quicklinks ul.flyout li a').on('click', function() {
		  			ga('send', 'event', 'Quicklinks', 'Flyout Menu', 'Flagship Academic');
				});
		</script>

<!**********TABLET/MOBILE MENUS**************>  
<?php if(is_tablet()) {  ?>
		<script defer>
			jQuery(document).ready(function () {
			    jQuery('#main_nav').meanmenu({meanScreenWidth: "767"});
			});
		</script>
<?php } else { ?>
	<script defer>
		jQuery(document).ready(function () {
		    jQuery('#main_nav').meanmenu();
		});
	</script>
<?php } ?>

<!***********DIRECTORY**************>
<?php $theme_option = flagship_sub_get_global_options();
if ( is_page_template( 'template-people-directory.php' ) && $theme_option['flagship_sub_directory_search']  == '1' )  { ?>
  	<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.directory.min.js"></script>
  	<script defer>
	    var $j = jQuery.noConflict();
	    $j(window).load(function() {
	        var filterFromQuerystring = getParameterByName('filter');
	        $j('a[data-filter=".' + filterFromQuerystring  + '"]').click();
	    });
	</script>

	
<!***********COURSES**************>
<?php } 
if ( is_page_template( 'template-courses-undergrad.php' ) || is_page_template( 'template-courses-all.php' ) || is_page_template( 'template-courses-graduate.php' ) || is_page_template( 'template-courses-program.php' ))   { ?>
  	<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.courses.min.js"></script>


<!***********SINGLE ITEMS (NEWS & PEOPLE_**************>
<?php } if (is_page_template('template-program-people.php')) { ?>
	
  	<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.directory.min.js"></script>
<? } 
	$about_id = ksas_get_page_id('about');
	$archive_id = ksas_get_page_id('archive');
	$people_id = ksas_get_page_id('people');
	$faculty_id = ksas_get_page_id('faculty');
	$undergraduate_id = ksas_get_page_id('undergraduate');
	$testimonial_id = ksas_get_page_id('testimonial');
?>
<?php if (  is_singular('post') ) { ?>
	<script defer>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('li.page-id-<?php echo $about_id; ?>').addClass('current_page_ancestor');
			$j('li.page-id-<?php echo $archive_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<?php if ( is_singular('people') ) { ?>
	<script defer>
		var $k = jQuery.noConflict();
		$k(document).ready(function(){
			$k('li.page-id-<?php echo $people_id; ?>').addClass('current_page_ancestor');
			$k('li.page-id-<?php echo $faculty_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?> 

<?php if ( is_singular('testimonial') ) { ?>
	<script defer>
		var $y = jQuery.noConflict();
		$y(document).ready(function(){
			$y('li.page-id-<?php echo $undergraduate_id; ?>').addClass('current_page_ancestor');
			$y('li.page-id-<?php echo $testimonial_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<!***********EXHIBITS**************>

<?php if (is_page_template( 'template-exhibitions-programs.php' )) : ?>
<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.exhibits.min.js"></script> 
<?php endif; ?>
<!***********FULL WIDTH IMAGES**************>

<?php $blog_id = get_current_blog_id(); ?>

	<?php if ($blog_id == 49)  { ?>

		<?php if(is_front_page()) : ?>
			<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/jquery.backstretch.min.js"></script>
			<script>
				var $a = jQuery.noConflict();
				$a(document).ready(function() {
				  $a('.backstretch img').each(function(){
				    var $img = $a(this);
				    var filename = $img.attr('src')
				    $img.attr('alt', " ");
				  });
				});					
			</script>
		<?php endif; ?>

	<?php } ?>


<script defer>
jQuery.noConflict();
jQuery(document).foundation();
</script>