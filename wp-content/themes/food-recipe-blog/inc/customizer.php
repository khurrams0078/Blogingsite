<?php
/**
 * Food Recipe Blog Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Food Recipe Blog
 */

if ( ! defined( 'FOOD_RECIPE_BLOG_URL' ) ) {
define('FOOD_RECIPE_BLOG_URL',__('https://www.themagnifico.net/themes/food-recipe-wordpress-theme/','food-recipe-blog'));
}
if ( ! defined( 'FOOD_RECIPE_BLOG_TEXT' ) ) {
    define( 'FOOD_RECIPE_BLOG_TEXT', __( 'Food Recipe Pro','food-recipe-blog' ));
}
if ( ! defined( 'FOOD_RECIPE_BLOG_BUY_TEXT' ) ) {
    define( 'FOOD_RECIPE_BLOG_BUY_TEXT', __( 'Buy Food Recipe Pro','food-recipe-blog' ));
}

use WPTRT\Customize\Section\Food_Recipe_Blog_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Food_Recipe_Blog_Button::class );

    $manager->add_section(
        new Food_Recipe_Blog_Button( $manager, 'food_recipe_blog_pro', [
            'title'       => esc_html( FOOD_RECIPE_BLOG_TEXT, 'food-recipe-blog' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'food-recipe-blog' ),
            'button_url'  => esc_url( FOOD_RECIPE_BLOG_URL)
        ] )
    );
} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'food-recipe-blog-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'food-recipe-blog-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function food_recipe_blog_customize_register($wp_customize){

    // Pro Version
    class Food_Recipe_Blog_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( FOOD_RECIPE_BLOG_BUY_TEXT,'food-recipe-blog' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Food_Recipe_Blog_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('food_recipe_blog_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'food-recipe-blog' ),
        'section'        => 'title_tagline',
        'settings'       => 'food_recipe_blog_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_recipe_blog_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'food-recipe-blog' ),
        'section'        => 'title_tagline',
        'settings'       => 'food_recipe_blog_theme_description',
        'type'           => 'checkbox',
    )));

    // Header
    $wp_customize->add_section('food_recipe_blog_header',array(
        'title' => esc_html__('Top Header','food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_subscribe_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_recipe_blog_subscribe_button',array(
        'label' => esc_html__('Subscribe Button Text','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_subscribe_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_recipe_blog_subscribe_button_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_recipe_blog_subscribe_button_url',array(
        'label' => esc_html__('Subscribe Button Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_subscribe_button_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('food_recipe_blog_social_icon', array(
        'default' => 0,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_social_icon',array(
        'label'          => __( 'Social Icon On Of', 'food-recipe-blog' ),
        'section'        => 'food_recipe_blog_header',
        'settings'       => 'food_recipe_blog_social_icon',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_recipe_blog_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_recipe_blog_facebook_url',array(
        'label' => esc_html__('Facebook Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('food_recipe_blog_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_recipe_blog_twitter_url',array(
        'label' => esc_html__('Twitter Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('food_recipe_blog_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_recipe_blog_intagram_url',array(
        'label' => esc_html__('Intagram Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('food_recipe_blog_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_recipe_blog_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('food_recipe_blog_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_recipe_blog_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_header',
        'setting' => 'food_recipe_blog_pintrest_url',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Food_Recipe_Blog_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Recipe_Blog_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'food_recipe_blog_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-recipe-blog' ),
        'description' => esc_url( FOOD_RECIPE_BLOG_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('food_recipe_blog_general_settings',array(
        'title' => esc_html__('General Settings','food-recipe-blog'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('food_recipe_blog_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'food-recipe-blog' ),
        'section'        => 'food_recipe_blog_general_settings',
        'settings'       => 'food_recipe_blog_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'food_recipe_blog_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_recipe_blog_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','food-recipe-blog'),
        'section' => 'food_recipe_blog_general_settings',
        'settings' => 'food_recipe_blog_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'food_recipe_blog_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_recipe_blog_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','food-recipe-blog'),
        'section' => 'food_recipe_blog_general_settings',
        'settings' => 'food_recipe_blog_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'food_recipe_blog_preloader_dot_2_color', array(
        'default' => '#f36135',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_recipe_blog_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','food-recipe-blog'),
        'section' => 'food_recipe_blog_general_settings',
        'settings' => 'food_recipe_blog_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('food_recipe_blog_scroll_hide', array(
      'default' => false,
      'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_scroll_hide',array(
      'label'          => __( 'Show Theme Scroll To Top', 'food-recipe-blog' ),
      'section'        => 'food_recipe_blog_general_settings',
      'settings'       => 'food_recipe_blog_scroll_hide',
      'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_recipe_blog_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'food_recipe_blog_sanitize_choices'
    ));
    $wp_customize->add_control('food_recipe_blog_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'food_recipe_blog_general_settings',
        'choices' => array(
            'Right' => __('Right','food-recipe-blog'),
            'Left' => __('Left','food-recipe-blog'),
            'Center' => __('Center','food-recipe-blog')
        ),
    ) );

    $wp_customize->add_setting('food_recipe_blog_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'food-recipe-blog' ),
        'section'        => 'food_recipe_blog_general_settings',
        'settings'       => 'food_recipe_blog_sticky_header',
        'type'           => 'checkbox',
    )));

    // Product Columns
    $wp_customize->add_setting( 'food_recipe_blog_products_per_row' , array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'food_recipe_blog_sanitize_select',
    ) );

    $wp_customize->add_control('food_recipe_blog_products_per_row', array(
        'label' => __( 'Product per row', 'food-recipe-blog' ),
        'section'  => 'food_recipe_blog_general_settings',
        'type'     => 'select',
        'choices'  => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ) );

    $wp_customize->add_setting('food_recipe_blog_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'food_recipe_blog_sanitize_float'
    ));
    $wp_customize->add_control('food_recipe_blog_product_per_page',array(
        'label' => __('Product per page','food-recipe-blog'),
        'section'   => 'food_recipe_blog_general_settings',
        'type'      => 'number'
    ));

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('food_recipe_blog_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'food-recipe-blog' ),
        'section'        => 'food_recipe_blog_general_settings',
        'settings'       => 'food_recipe_blog_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('food_recipe_blog_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'food_recipe_blog_sanitize_choices'
    ));
    $wp_customize->add_control('food_recipe_blog_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','food-recipe-blog'),
        'section' => 'food_recipe_blog_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','food-recipe-blog'),
            'Right Sidebar' => __('Right Sidebar','food-recipe-blog'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('food_recipe_blog_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'food-recipe-blog' ),
        'section'        => 'food_recipe_blog_general_settings',
        'settings'       => 'food_recipe_blog_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_recipe_blog_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'food_recipe_blog_sanitize_choices'
    ));
    $wp_customize->add_control('food_recipe_blog_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','food-recipe-blog'),
        'section' => 'food_recipe_blog_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','food-recipe-blog'),
            'Right Sidebar' => __('Right Sidebar','food-recipe-blog'),
        ),
    ) );

    $wp_customize->add_setting('food_recipe_blog_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'food_recipe_blog_sanitize_choices'
    ));
    $wp_customize->add_control('food_recipe_blog_woocommerce_product_sale',array(
        'type' => 'radio',
        'section' => 'food_recipe_blog_general_settings',
        'choices' => array(
            'Right' => __('Right','food-recipe-blog'),
            'Left' => __('Left','food-recipe-blog'),
            'Center' => __('Center','food-recipe-blog')
        ),
    ) );

     // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Food_Recipe_Blog_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Recipe_Blog_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'food_recipe_blog_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-recipe-blog' ),
        'description' => esc_url( FOOD_RECIPE_BLOG_URL ),
        'priority'    => 100
    )));

     // Post Settings
     $wp_customize->add_section('food_recipe_blog_post_settings',array(
        'title' => esc_html__('Post Settings','food-recipe-blog'),
        'priority'   =>40,
    ));

     $wp_customize->add_setting('food_recipe_blog_post_page_title',array(
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_post_page_meta',array(
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_post_page_btn',array(
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_single_post_thumb',array(
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_single_post_meta',array(
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_single_post_title',array(
            'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_single_post_tags',array(
            'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('food_recipe_blog_single_post_comment_title',array(
        'label' => __('Add Comment Title','food-recipe-blog'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'food-recipe-blog' ),
        ),
        'section'=> 'food_recipe_blog_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('food_recipe_blog_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('food_recipe_blog_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','food-recipe-blog'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'food-recipe-blog' ),
        ),
        'section'=> 'food_recipe_blog_post_settings',
        'type'=> 'text'
    ));

    // Page Settings
    $wp_customize->add_section('food_recipe_blog_page_settings',array(
        'title' => esc_html__('Page Settings','food-recipe-blog'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('food_recipe_blog_single_page_title',array(
            'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_single_page_thumb',array(
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_recipe_blog_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'food-recipe-blog'),
        'section'     => 'food_recipe_blog_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'food-recipe-blog'),
    ));

    // Theme Color
    $wp_customize->add_section('food_recipe_blog_color_option',array(
        'title' => esc_html__('Theme Color','food-recipe-blog'),
    ));

    $wp_customize->add_setting( 'food_recipe_blog_theme_color', array(
        'default' => '#f36135',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_recipe_blog_theme_color', array(
        'label' => esc_html__('First Color Option','food-recipe-blog'),
        'section' => 'food_recipe_blog_color_option',
        'settings' => 'food_recipe_blog_theme_color'
    )));

    $wp_customize->add_setting( 'food_recipe_blog_theme_color_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_recipe_blog_theme_color_2', array(
        'label' => esc_html__('Second Color Option','food-recipe-blog'),
        'section' => 'food_recipe_blog_color_option',
        'settings' => 'food_recipe_blog_theme_color_2'
    )));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_color', array(
        'sanitize_callback' => 'Food_Recipe_Blog_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Recipe_Blog_Customize_Pro_Version ( $wp_customize,'pro_version_theme_color', array(
        'section'     => 'food_recipe_blog_color_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-recipe-blog' ),
        'description' => esc_url( FOOD_RECIPE_BLOG_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('food_recipe_blog_top_slider',array(
        'title' => esc_html__('Slider Option','food-recipe-blog')
    ));

    $wp_customize->add_setting('food_recipe_blog_slider_loop', array(
        'default' => 0,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_recipe_blog_slider_loop',array(
        'label'          => __( 'On Of Slider Loop', 'food-recipe-blog' ),
        'section'        => 'food_recipe_blog_top_slider',
        'settings'       => 'food_recipe_blog_slider_loop',
        'type'           => 'checkbox',
    )));

    for ( $food_recipe_blog_count = 1; $food_recipe_blog_count <= 3; $food_recipe_blog_count++ ) {
        $wp_customize->add_setting( 'food_recipe_blog_top_slider_page' . $food_recipe_blog_count, array(
            'default'           => '',
            'sanitize_callback' => 'food_recipe_blog_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'food_recipe_blog_top_slider_page' . $food_recipe_blog_count, array(
            'label'    => __( 'Select Slide Page', 'food-recipe-blog' ),
            'section'  => 'food_recipe_blog_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Opacity
    $wp_customize->add_setting('food_recipe_blog_slider_opacity_color',array(
      'default'              => '',
      'sanitize_callback' => 'food_recipe_blog_sanitize_choices'
    ));

    $wp_customize->add_control( 'food_recipe_blog_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','food-recipe-blog' ),
    'section'     => 'food_recipe_blog_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','food-recipe-blog'),
      '0.1' =>  esc_attr('0.1','food-recipe-blog'),
      '0.2' =>  esc_attr('0.2','food-recipe-blog'),
      '0.3' =>  esc_attr('0.3','food-recipe-blog'),
      '0.4' =>  esc_attr('0.4','food-recipe-blog'),
      '0.5' =>  esc_attr('0.5','food-recipe-blog'),
      '0.6' =>  esc_attr('0.6','food-recipe-blog'),
      '0.7' =>  esc_attr('0.7','food-recipe-blog'),
      '0.8' =>  esc_attr('0.8','food-recipe-blog'),
      '0.9' =>  esc_attr('0.9','food-recipe-blog')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('food_recipe_blog_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_recipe_blog_slider_img_height',array(
        'label' => __('Slider Height','food-recipe-blog'),
        'description'   => __('Add the slider height in px(eg. 500px).','food-recipe-blog'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'food-recipe-blog' ),
        ),
        'section'=> 'food_recipe_blog_top_slider',
        'type'=> 'text'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Food_Recipe_Blog_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Recipe_Blog_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'food_recipe_blog_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-recipe-blog' ),
        'description' => esc_url( FOOD_RECIPE_BLOG_URL ),
        'priority'    => 100
    )));

    //Latest Recipes
    $wp_customize->add_section('food_recipe_blog_latest_recipes',array(
        'title' => esc_html__('Latest Recipes Option','food-recipe-blog')
    ));

    $wp_customize->add_setting('food_recipe_blog_latest_recipes_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_recipe_blog_latest_recipes_title',array(
        'label' => esc_html__('Section Title','food-recipe-blog'),
        'section' => 'food_recipe_blog_latest_recipes',
        'setting' => 'food_recipe_blog_latest_recipes_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_recipe_blog_latest_recipes_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_recipe_blog_latest_recipes_button_text',array(
        'label' => esc_html__('Section Button Text','food-recipe-blog'),
        'section' => 'food_recipe_blog_latest_recipes',
        'setting' => 'food_recipe_blog_latest_recipes_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_recipe_blog_latest_recipes_button_link',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_recipe_blog_latest_recipes_button_link',array(
        'label' => esc_html__('Section Button Link','food-recipe-blog'),
        'section' => 'food_recipe_blog_latest_recipes',
        'setting' => 'food_recipe_blog_latest_recipes_button_link',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_recipe_blog_latest_recipes_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_recipe_blog_latest_recipes_number',array(
        'label' => esc_html__('Number of Post','food-recipe-blog'),
        'section' => 'food_recipe_blog_latest_recipes',
        'setting' => 'food_recipe_blog_latest_recipes_number',
        'type'  => 'number'
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $cat_post[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('food_recipe_blog_latest_recipes_category',array(
        'default' => 'select',
        'sanitize_callback' => 'food_recipe_blog_sanitize_choices',
    ));
    $wp_customize->add_control('food_recipe_blog_latest_recipes_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Latest Recipes','food-recipe-blog'),
        'section' => 'food_recipe_blog_latest_recipes',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_latest_recipes_setting', array(
        'sanitize_callback' => 'Food_Recipe_Blog_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Recipe_Blog_Customize_Pro_Version ( $wp_customize,'pro_version_latest_recipes_setting', array(
        'section'     => 'food_recipe_blog_latest_recipes',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-recipe-blog' ),
        'description' => esc_url( FOOD_RECIPE_BLOG_URL ),
        'priority'    => 100
    )));

    // Footer

    $wp_customize->add_setting('food_recipe_blog_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'food_recipe_blog_footer_bg_image',array(
        'label' => __('Footer Background Image','food-recipe-blog'),
        'section' => 'food_recipe_blog_site_footer_section',
        'priority' => 1,
    )));
    
    $wp_customize->add_section('food_recipe_blog_site_footer_section', array(
        'title' => esc_html__('Footer', 'food-recipe-blog'),
    ));

    $wp_customize->add_setting('food_recipe_blog_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('food_recipe_blog_footer_text_setting', array(
        'label' => __('Replace the footer text', 'food-recipe-blog'),
        'section' => 'food_recipe_blog_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

     $wp_customize->add_setting('food_recipe_blog_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'food_recipe_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('food_recipe_blog_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','food-recipe-blog'),
        'section' => 'food_recipe_blog_site_footer_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Food_Recipe_Blog_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Recipe_Blog_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'food_recipe_blog_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-recipe-blog' ),
        'description' => esc_url( FOOD_RECIPE_BLOG_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'food_recipe_blog_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function food_recipe_blog_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function food_recipe_blog_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function food_recipe_blog_customize_preview_js(){
    wp_enqueue_script('food-recipe-blog-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'food_recipe_blog_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function food_recipe_blog_panels_js() {
    wp_enqueue_style( 'food-recipe-blog-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'food-recipe-blog-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'food_recipe_blog_panels_js' );
