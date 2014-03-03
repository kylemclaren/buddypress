<?php
/**
 * Cepheus Theme Customizer
 *
 * @package Chum
 */

function bn_custom_theme_register($wp_customize) {

	/**
	 * Textarea form for customizer
	 */
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}

	//Site Contact Info
	$wp_customize->add_setting('bn_theme_blogtitle',array(
		'default' => ''
	));
	$wp_customize->add_setting('bn_theme_blogdesc',array(
		'default' => ''
	));
	
	$wp_customize->add_section('bn_fp_blog',array(
		'title'		=> 'Blog Title and Description',
		'priority'	=> 30
	));
	
	$wp_customize->add_control('bn_fp_control_blogtitle',array(
		'label'		=> 'Blog Title',
		'section'	=> 'bn_fp_blog',
		'settings'	=> 'bn_theme_blogtitle'
	));
	
	$wp_customize->add_control('bn_fp_control_blogdesc',array(
		'label'		=> 'Blog Description',
		'section'	=> 'bn_fp_blog',
		'settings'	=> 'bn_theme_blogdesc'
	));

	//Site Contact Info
	$wp_customize->add_setting('bn_theme_email',array(
		'default' => ''
	));
	$wp_customize->add_setting('bn_theme_tel',array(
		'default' => ''
	));
	
	$wp_customize->add_section('bn_fp_contact',array(
		'title'		=> 'Site Contact Information Details',
		'priority'	=> 30
	));
	
	$wp_customize->add_control('bn_fp_control_email',array(
		'label'		=> 'Site Contact Email',
		'section'	=> 'bn_fp_contact',
		'settings'	=> 'bn_theme_email'
	));
	
	$wp_customize->add_control('bn_fp_control_tel',array(
		'label'		=> 'Site Contact Telephone',
		'section'	=> 'bn_fp_contact',
		'settings'	=> 'bn_theme_tel'
	));
	
	//Social Networking Links
	$wp_customize->add_section('bn_sns',array(
		'title'			=> __('Social Networking Sites'),
		'description'	=> __('Set your social networking links here.'),
		'priority'		=> 30
	));

	$wp_customize->add_setting('bn_theme_fb',array(
		'default' => 'http://facebook.com'
	));
	$wp_customize->add_control('bn_theme_fb_control',array(
		'label'		=> 'Facebook',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_fb'
	));

	$wp_customize->add_setting('bn_theme_twitter',array(
		'default' => 'http://twitter.com'
	));
	$wp_customize->add_control('bn_theme_twitter_control',array(
		'label'		=> 'Twitter',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_twitter'
	));

	$wp_customize->add_setting('bn_theme_dribbble',array(
		'default' => 'http://dribbble.com'
	));
	$wp_customize->add_control('bn_theme_dribbble_control',array(
		'label'		=> 'Dribbble',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_dribbble'
	));

	$wp_customize->add_setting('bn_theme_gplus',array(
		'default' => 'http://plus.google.com'
	));
	$wp_customize->add_control('bn_theme_gplus_control',array(
		'label'		=> 'Google+',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_gplus'
	));

	$wp_customize->add_setting('bn_theme_linkedin',array(
		'default' => 'http://linkedin.com'
	));
	$wp_customize->add_control('bn_theme_linkedin_control',array(
		'label'		=> 'LinkedIn',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_linkedin'
	));

	$wp_customize->add_setting('bn_theme_pinterest',array(
		'default' => 'http://pinterest.com'
	));
	$wp_customize->add_control('bn_theme_pinterest_control',array(
		'label'		=> 'Pinterest',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_pinterest'
	));

	$wp_customize->add_setting('bn_theme_vimeo',array(
		'default' => 'http://vimeo.com'
	));
	$wp_customize->add_control('bn_theme_vimeo_control',array(
		'label'		=> 'Vimeo',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_vimeo'
	));

	$wp_customize->add_setting('bn_theme_youtube',array(
		'default' => 'http://youtube.com'
	));
	$wp_customize->add_control('bn_theme_youtube_control',array(
		'label'		=> 'Youtube',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_youtube'
	));

	$wp_customize->add_setting('bn_theme_instagram',array(
		'default' => 'http://instagram.com'
	));
	$wp_customize->add_control('bn_theme_instagram_control',array(
		'label'		=> 'Instagram',
		'section'	=> 'bn_sns',
		'settings'	=> 'bn_theme_instagram'
	));
}
add_action('customize_register','bn_custom_theme_register');

