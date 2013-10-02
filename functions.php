<?php

function woo_add_gathering_times() {
		
	$woo_options = get_option( 'woo_options' );
	echo '<div id="gathering-times">';
	echo $woo_options['woo_custom_option_gathering_times'];
	echo '</div>';	
}
//add_action( 'woo_header_after', 'woo_add_gathering_times' );

function my_register_sidebars () {
	register_sidebar(array(
	    'name' => __( 'Alert Bar' ),
	    'id' => 'alert_bar',
	    'description' => __( "Widgets in this area will be shown above the page content." ),
	    'before_title' => '<h3>',
	    'after_title' => '</h3>'
	));
	register_sidebar(array(
	    'name' => __( 'Bottom Footer Left' ),
	    'id' => 'bottom-footer-widget-left',
	    'description' => __( "Widgets in this area will be shown below the content area, above the footers, left side." ),
	    'before_title' => '<h3>',
	    'after_title' => '</h3>'
	));
	register_sidebar(array(
	 	'name' => __( 'Bottom Footer Right' ),
		 'id' => 'bottom-footer-widget-right',
		 'description' => __( "Widgets in this area will be shown below the content area, above the footers, right side." ),
		 'before_title' => '<h3>',
		 'after_title' => '</h3>'
	));
	register_sidebar(array(
	    'name' => __( 'Home Page LEFT' ),
	    'id' => 'home_page_left',
	    'description' => __( "Widgets in this area will be shown in the content area on the home page on the left side." ),
	    'before_title' => '<h3>',
	    'after_title' => '</h3>'
	));
	register_sidebar(array(
	    'name' => __( 'Home Page CENTER' ),
	    'id' => 'home_page_center',
	    'description' => __( "Widgets in this area will be shown in the content area on the home page in the middle." ),
	    'before_title' => '<h3>',
	    'after_title' => '</h3>'
	));
	register_sidebar(array(
	 	'name' => __( 'Home Page RIGHT' ),
		 'id' => 'home_page_right',
		 'description' => __( "Widgets in this area will be shown in the content area on the home page on the right side." ),
		 'before_title' => '<h3>',
		 'after_title' => '</h3>'
	));
    /* Repeat register_sidebar() code for additional sidebars. */
}
//add_action( 'widgets_init', 'my_register_sidebars' );
 
function alert_widget () { ?>
    <div id="alert_bar_widget" class="col-full">
       	<?php dynamic_sidebar( 'alert_bar' ); ?>
    </div>
<?php }
add_action( 'woo_header_before', 'alert_widget');
 
function bottom_footer_widgets () { ?>
	<div id="my_big_fat_footer">
		<div id="footer_wrapper">
			<div id="footer_inner_wrapper" class="col-full col-2">
				<div id="fat_footer_left" class="block fl">
					<?php dynamic_sidebar( 'bottom-footer-widget-left' ); ?>
				</div>
				<div id="fat_footer_right" class="block fr">
					<?php dynamic_sidebar( 'bottom-footer-widget-right' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php }
//add_action( 'wp_footer', 'bottom_footer_widgets');


// Add more options to theme options panel
function woo_options_add($options) {
 $shortname = "woo_custom_option";
 
 	// This is a option heading
	$options[] = array( "name" => __( 'CUSTOM Settings', 'woothemes' ),
					"icon" => "general",
                    "type" => "heading");
                        
   	$options[] = array( 'name' => __( 'Header Options', 'woothemes' ),
   					'type' => 'subheading' );  
   					
   	$options[] = array( "name" => __( 'Gathering Times', 'woothemes' ),
   						"desc" => __( 'Sunday Gathering Text', 'woothemes' ),
   						"id" => $shortname."_gathering_times",
   						"std" => "",
   						"type" => "text" );	
    
    //ONE                   
	$options[] = array( 'name' => __( 'MegaSlider ONE', 'woothemes' ),
						'type' => 'subheading' );                   
 
    $options[] = array( "name" => "TEXT Front Page Slider ONE",
                       "desc" => "Text For Front Page Slider ONE",
                       "id" => $shortname."_slider_one_text",
                       "std" => "BRINGING<br />THE <strong>KINGDOM</strong><br />TO THE CITY",
                       "type" => "textarea");

	$options[] = array( "name" => __( 'IMAGE Front Page Slider ONE', 'woothemes' ),
						"desc" => __( 'Upload an image, or specify an image URL directly.', 'woothemes' ),
						"id" => $shortname."_slider_one_image",
						"std" => "http://gfc.gs/charismatic/wp-content/themes/charismatic/images/1.jpg",
						"type" => "upload");
						
	$options[] = array( "name" => __( 'LINK TEXT Front Page Slider ONE', 'woothemes' ),
						"desc" => __( 'Specify the link text for the more info text', 'woothemes' ),
						"id" => $shortname."_slider_one_link_text",
						"std" => "For More Info",
						"type" => "text" );
						
	$options[] = array( "name" => __( 'LINK URL Front Page Slider ONE', 'woothemes' ),
						"desc" => __( 'Specify the URL link for the more text', 'woothemes' ),
						"id" => $shortname."_slider_one_link_url",
						"std" => "",
						"type" => "text" );
						
   // Return new options
   return $options;
}

 
function woo_add_featured_image () {
 if ( has_post_thumbnail() ) 
 {
 	// the current post has a thumbnail
 	echo ('<div id="featured_image">');
 	the_post_thumbnail($page->ID,"full");
 	echo ("</div>");
 } 
 else 
 {
 	// the current post lacks a thumbnail
 	echo ("<!-- No Featured Image -->");
 }
  
} // End woo_add_featured_image() 

add_action( 'loop_start', 'woo_add_featured_image' );

?>