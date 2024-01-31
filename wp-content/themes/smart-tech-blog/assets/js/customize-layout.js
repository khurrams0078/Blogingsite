
(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-food_recipe_blog_options-';
		
		function food_recipe_blog_customizer_label( id, title ) {

			// Colors

			if ( id === 'food_recipe_blog_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header 

			if ( id === 'food_recipe_blog_address' || id === 'food_recipe_blog_email' || id === 'food_recipe_blog_phone_number' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Banner Section

			if ( id === 'smart_tech_blog_banner_bg_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Popular Articles

			if ( id === 'smart_tech_blog_popular_articles_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Social Icon 

			if ( id === 'food_recipe_blog_social_icon' || id === 'food_recipe_blog_subscribe_button' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'food_recipe_blog_preloader_hide' || id === 'food_recipe_blog_sticky_header' || id === 'food_recipe_blog_scroll_hide' || id === 'food_recipe_blog_products_per_row' || id === 'food_recipe_blog_scroll_top_position' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'food_recipe_blog_woocommerce_product_sale' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'food_recipe_blog_slider_loop' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Latest Recipes

			if ( id === 'food_recipe_blog_latest_recipes_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'food_recipe_blog_footer_bg_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'food_recipe_blog_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'food_recipe_blog_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'food_recipe_blog_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'food_recipe_blog_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

		// Colors
		food_recipe_blog_customizer_label( 'food_recipe_blog_theme_color', 'Theme Color' );
		food_recipe_blog_customizer_label( 'background_color', 'Colors' );
		food_recipe_blog_customizer_label( 'background_image', 'Image' );

		// Site Identity
		food_recipe_blog_customizer_label( 'custom_logo', 'Logo Setup' );
		food_recipe_blog_customizer_label( 'site_icon', 'Favicon' );

		// Banner Section
		food_recipe_blog_customizer_label( 'smart_tech_blog_banner_bg_image', 'Banner Section' );

		// Popular Articles
		food_recipe_blog_customizer_label( 'smart_tech_blog_popular_articles_title', 'Popular Articles' );

		// Social Icon
		food_recipe_blog_customizer_label( 'food_recipe_blog_social_icon', 'Social Icons' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_subscribe_button', 'Subscribe Button' );

		// General Setting
		food_recipe_blog_customizer_label( 'food_recipe_blog_preloader_hide', 'Preloader' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_sticky_header', 'Sticky Header' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_scroll_hide', 'Scroll To Top' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_products_per_row', 'Woocommerce Setting' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_scroll_top_position', 'Scroll to top Position' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_woocommerce_product_sale', 'Woocommerce Product Sale Positions' );

		//Slider
		food_recipe_blog_customizer_label( 'food_recipe_blog_slider_loop', 'Slider' );

		//Latest Recipes
		food_recipe_blog_customizer_label( 'food_recipe_blog_latest_recipes_title', 'Latest Recipes' );
		
		//Header Image
		food_recipe_blog_customizer_label( 'header_image', 'Header Image' );

		//Footer
		food_recipe_blog_customizer_label( 'food_recipe_blog_footer_bg_image', 'Footer' );

		//Single Post Setting
		food_recipe_blog_customizer_label( 'food_recipe_blog_single_post_thumb', 'Single Post Setting' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		food_recipe_blog_customizer_label( 'food_recipe_blog_post_page_title', 'Post Setting' );

		// Page Setting
		food_recipe_blog_customizer_label( 'food_recipe_blog_single_page_title', 'Page Setting' );


	}); 
})( jQuery );
