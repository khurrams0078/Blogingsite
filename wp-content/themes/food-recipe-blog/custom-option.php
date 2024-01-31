<?php

    $food_recipe_blog_theme_css= "";

     /*--------------------------- Scroll to top positions -------------------*/

    $food_recipe_blog_scroll_position = get_theme_mod( 'food_recipe_blog_scroll_top_position','Right');
    if($food_recipe_blog_scroll_position == 'Right'){
        $food_recipe_blog_theme_css .='#button{';
            $food_recipe_blog_theme_css .='right: 20px;';
        $food_recipe_blog_theme_css .='}';
    }else if($food_recipe_blog_scroll_position == 'Left'){
        $food_recipe_blog_theme_css .='#button{';
            $food_recipe_blog_theme_css .='left: 20px;';
        $food_recipe_blog_theme_css .='}';
    }else if($food_recipe_blog_scroll_position == 'Center'){
        $food_recipe_blog_theme_css .='#button{';
            $food_recipe_blog_theme_css .='right: 50%;left: 50%;';
        $food_recipe_blog_theme_css .='}';
    }

    /*--------------------------- Slider Opacity -------------------*/

    $food_recipe_blog_theme_lay = get_theme_mod( 'food_recipe_blog_slider_opacity_color','');
    if($food_recipe_blog_theme_lay == '0'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.1'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.1';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.2'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.2';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.3'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.3';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.4'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.4';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.5'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.5';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.6'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.6';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.7'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.7';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.8'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.8';
        $food_recipe_blog_theme_css .='}';
        }else if($food_recipe_blog_theme_lay == '0.9'){
        $food_recipe_blog_theme_css .='.slider-box img{';
            $food_recipe_blog_theme_css .='opacity:0.9';
        $food_recipe_blog_theme_css .='}';
        }

    /*---------------------------Slider Height ------------*/

    $food_recipe_blog_slider_img_height = get_theme_mod('food_recipe_blog_slider_img_height');
    if($food_recipe_blog_slider_img_height != false){
        $food_recipe_blog_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $food_recipe_blog_theme_css .='height: '.esc_attr($food_recipe_blog_slider_img_height).';';
        $food_recipe_blog_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $food_recipe_blog_product_sale = get_theme_mod( 'food_recipe_blog_woocommerce_product_sale','Right');
    if($food_recipe_blog_product_sale == 'Right'){
        $food_recipe_blog_theme_css .='.woocommerce ul.products li.product .onsale{';
            $food_recipe_blog_theme_css .='left: auto; right: 15px;';
        $food_recipe_blog_theme_css .='}';
    }else if($food_recipe_blog_product_sale == 'Left'){
        $food_recipe_blog_theme_css .='.woocommerce ul.products li.product .onsale{';
            $food_recipe_blog_theme_css .='left: 15px; right: auto;';
        $food_recipe_blog_theme_css .='}';
    }else if($food_recipe_blog_product_sale == 'Center'){
        $food_recipe_blog_theme_css .='.woocommerce ul.products li.product .onsale{';
            $food_recipe_blog_theme_css .='right: 50%;left: 50%;';
        $food_recipe_blog_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $food_recipe_blog_footer_bg_image = get_theme_mod('food_recipe_blog_footer_bg_image');
    if($food_recipe_blog_footer_bg_image != false){
        $food_recipe_blog_theme_css .='#colophon{';
            $food_recipe_blog_theme_css .='background: url('.esc_attr($food_recipe_blog_footer_bg_image).')!important;';
        $food_recipe_blog_theme_css .='}';
    }