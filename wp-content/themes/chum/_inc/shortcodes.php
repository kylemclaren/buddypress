<?php

/* ************************************************************************************** 
     Disable automatic <p> amd <br> before and after shortcodes
************************************************************************************** */
function shortcode_empty_paragraph_fix($content){   
	$array = array (
		'<p>[' => '[',
		']</p>' => ']',
		']<br />' => ']',
		'<p style="text-align: center;">[parallax_container]' => '[parallax_container]',
		'<p>[parallax_container]' => '[parallax_container]',
		'[/parallax_container]</p>' => '[/parallax_container]'
	);
	$content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

/* ************************************************************************************** 
    Button
************************************************************************************** */
function bn_button_green( $atts, $content = null  ) {
	extract( shortcode_atts( array (
		'link' => '#',
		'target' => '_self'
	), $atts ) );
	if ( $size != '' ) { 
		$target = 'target="'.$target.'"';
	}
	return '<a href="'.$link.'" class="button button-green" '.$target.'>' . do_shortcode($content) . '</a>';
}
add_shortcode( 'button_green', 'bn_button_green' );

function bn_button_red( $atts, $content = null  ) {
	extract( shortcode_atts( array (
		'link' => '#',
		'target' => '_self'
	), $atts ) );
	if ( $size != '' ) { 
		$target = 'target="'.$target.'"';
	}
	return '<a href="'.$link.'" class="button button-red" '.$target.'>' . do_shortcode($content) . '</a>';
}
add_shortcode( 'button_red', 'bn_button_red' );

function bn_button_gray( $atts, $content = null  ) {
	extract( shortcode_atts( array (
		'link' => '#',
		'target' => '_self'
	), $atts ) );
	if ( $size != '' ) { 
		$target = 'target="'.$target.'"';
	}
	return '<a href="'.$link.'" class="button button-gray" '.$target.'>' . do_shortcode($content) . '</a>';
}
add_shortcode( 'button_gray', 'bn_button_gray' );

/* ************************************************************************************** 
    Icon
************************************************************************************** */
function bn_icon( $atts ) {
	extract( shortcode_atts( array (
		'name' => ''
	), $atts ) );
	return '<span class="fa '.$name.'"></span>';
}
add_shortcode( 'icon', 'bn_icon' );

/* ************************************************************************************** 
    Social Links
************************************************************************************** */
function bn_social_links() { 
	extract( shortcode_atts( array (
		'size' => 'small'
	), $atts ) );

	switch ( $size ) {
		case 'big':
			$class = 'social-links-big';
			break;
		case 'medium':
			$class = 'social-links-med';
			break;
		case 'small':
			$class = 'social-links-small';
			break;
		default:
			$class = 'social-links-big';
			break;
	}

	$html = '<div class="social-links '.$class.'">';
	if ( get_theme_mod('bn_theme_fb') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_fb') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-facebook"></i></a>';
	}
	if ( get_theme_mod('bn_theme_twitter') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_twitter') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-twitter"></i></a>';
	}
	if ( get_theme_mod('bn_theme_dribbble') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_dribbble') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-dribbble"></i></a>';
	}
	if ( get_theme_mod('bn_theme_gplus') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_gplus') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-google-plus"></i></a>';
	}
	if ( get_theme_mod('bn_theme_linkedin') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_linkedin') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-linkedin"></i></a>';
	}
	if ( get_theme_mod('bn_theme_pinterest') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_pinterest') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-pinterest"></i></a>';
	}
	if ( get_theme_mod('bn_thebn_theme_vimeoe_fb') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_vimeo') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-vimeo"></i></a>';
	}
	if ( get_theme_mod('bn_theme_youtube') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_youtube') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-youtube"></i></a>';
	}
	if ( get_theme_mod('bn_theme_instagram') ) { 
		$html .= '<a href="' . get_theme_mod('bn_theme_instagram') .'" title="Like us on Facebook!" class="fb" target="_blank"><i class="fa fa-instagram"></i></a>';
	}
	$html .= '</div>';

	return $html;

}
add_shortcode('social_links','bn_social_links');


/* ************************************************************************************** 
    Contact Info
************************************************************************************** */
function bn_contact_info() { 

	$html = '<div class="contact-info">';
	if ( get_theme_mod('bn_theme_fb') ) { 
		$html .= '<p><i class="fa fa-envelope"></i><a href="mailto:' . get_theme_mod('bn_theme_email') .'" title="Email Us!">'. get_theme_mod('bn_theme_email') .'</a></p>';
	}
	if ( get_theme_mod('bn_theme_twitter') ) { 
		$html .= '<p><i class="fa fa-phone-square"></i>'. get_theme_mod('bn_theme_tel') .'</p>';
	}
	$html .= '</div>';

	return $html;

}
add_shortcode('contact_info','bn_contact_info');

/* ************************************************************************************** 
    Contact Form Template
************************************************************************************** */
add_shortcode('contactForm','bn_contact_form');
function bn_contact_form() {
	get_template_part( 'template', 'contactform' );
}

/* ************************************************************************************** 
    Contact Address
************************************************************************************** */
add_shortcode('address','bn_contact_address');
function bn_contact_address($atts) {
	$valid_atts = is_array( $atts );
	if( $valid_atts ) {
		extract( $atts );
	}
	ob_start();

	$address_details .= '<div class="address-location">';
		if( isset( $title ) ) {
			$address_details .= '<h3>'. $title .'</h3>';
		}
		if( isset( $address ) ) {
			$address_details .= '<p class="location">'. $address .'</p>';
		}

		if ( get_theme_mod('bn_theme_fb') ) { 
			$address_details  .= '<p>Email: <a href="mailto:' . get_theme_mod('bn_theme_email') .'" title="Email Us!">'. get_theme_mod('bn_theme_email') .'</a></p>';
		}

		if ( get_theme_mod('bn_theme_twitter') ) { 
			$address_details .= '<p>Phone: '. get_theme_mod('bn_theme_tel') .'</p>';
		}

		if( isset( $fax ) ) {
			$address_details .= '<p>Fax: '. $fax .'</p>';
		}

	$address_details .= '</div>';

	ob_end_clean();
	
	return $address_details;
}

/* ************************************************************************************** 
    Google Map
************************************************************************************** */
add_shortcode('googleMapStatic','bn_google_map');
function bn_google_map($atts) {
	$valid_atts = is_array( $atts );
	if( $valid_atts ) {
		extract( $atts );
	}
	ob_start();
?>
	<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function($) {

			//------- Google Maps ---------//

			// Creating a LatLng object containing the coordinate for the center of the map
			var latlng = new google.maps.LatLng(<?php echo $coords ?>);

			// Creating an object literal containing the properties we want to pass to the map
			var options = {
				scrollwheel: true,
				zoom: <?php echo $zoom ?>,
				center: latlng,
				disableDefaultUI: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
			};

			// Calling the constructor, thereby initializing the map
			var map = new google.maps.Map(document.getElementById('map-location'), options);

			// Define Marker properties
			var image = new google.maps.MarkerImage('/buddypress/wp-content/themes/chum/_inc/images/map_marker.png',
				// This marker is 47 pixels wide by 58 pixels tall.
				new google.maps.Size(47, 58),
				// The origin for this image is 0,0.
				new google.maps.Point(0,0),
				// The anchor for this image is the base of the flagpole at 18,42.
				new google.maps.Point(18, 42)
			);

			// Add Marker
			var marker1 = new google.maps.Marker({
				position: latlng,
				map: map,
				icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
			});

			// Add listener for a click on the pin
			google.maps.event.addListener(marker1, 'click', function() {
				infowindow.open(map, marker1);
			});
			
			// Auto center on browser resize
			var centerMap;
			function calculateCenter() {
				centerMap = latlng;
			}
			google.maps.event.addDomListener(map, 'idle', function() {
				calculateCenter();
			});
			google.maps.event.addDomListener(window, 'resize', function() {
				map.setCenter(latlng);
			});

		});
	</script>
	<div id="map-location" class="gmap"></div>
<?php
	return ob_get_clean();
}