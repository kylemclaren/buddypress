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