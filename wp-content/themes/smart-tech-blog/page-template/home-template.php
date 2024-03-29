<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider" slider-loop="<?php echo esc_html(get_theme_mod('food_recipe_blog_slider_loop')); ?>">
    <?php $food_recipe_blog_slide_pages = array();
      for ( $food_recipe_blog_count = 1; $food_recipe_blog_count <= 3; $food_recipe_blog_count++ ) {
        $food_recipe_blog_mod = intval( get_theme_mod( 'food_recipe_blog_top_slider_page' . $food_recipe_blog_count ));
        if ( 'page-none-selected' != $food_recipe_blog_mod ) {
          $food_recipe_blog_slide_pages[] = $food_recipe_blog_mod;
        }
      }
      if( !empty($food_recipe_blog_slide_pages) ) :
        $food_recipe_blog_args = array(
          'post_type' => 'page',
          'post__in' => $food_recipe_blog_slide_pages,
          'orderby' => 'post__in'
        );
        $food_recipe_blog_query = new WP_Query( $food_recipe_blog_args );
        if ( $food_recipe_blog_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $food_recipe_blog_query->have_posts() ) : $food_recipe_blog_query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 15 )); ?><p>
            <div class="slider-box-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read Full Recipe','smart-tech-blog'); ?><i class="fas fa-long-arrow-alt-right ml-3"></i></a>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <section id="banner" class="pt-5">
          <div class="container">
              <div class=" banner-img">
                <img src="<?php echo esc_url(get_theme_mod('smart_tech_blog_banner_bg_image')); ?>">
                <div class="banner-content text-center">
                  <h3><?php echo esc_html(get_theme_mod('smart_tech_blog_banner_heading')); ?></h3>
                  <h4><?php echo esc_html(get_theme_mod('smart_tech_blog_banner_text')); ?></h4>
                </div>
              </div>    
          </div>
        </section>

        <section id="popular" class="py-5">
          <div class="container">
                <?php if(get_theme_mod('smart_tech_blog_popular_articles_category') != '' || get_theme_mod('smart_tech_blog_popular_articles_title') != '' || get_theme_mod('smart_tech_blog_popular_articles_button_text') != '' || get_theme_mod('smart_tech_blog_popular_articles_button_link') != ''){ ?>

                  <?php if(get_theme_mod('smart_tech_blog_popular_articles_title') != '' || get_theme_mod('smart_tech_blog_popular_articles_button_text') != '' || get_theme_mod('smart_tech_blog_popular_articles_button_link') != ''){ ?>
                    <div class="row recipe-head text-left">
                      <div class="col-lg-8 col-md-8 align-self-center">
                        <?php if(get_theme_mod('smart_tech_blog_popular_articles_title') != ''){ ?>
                          <h3><?php echo esc_html(get_theme_mod('smart_tech_blog_popular_articles_title')); ?></h3>
                        <?php }?>
                      </div>
                      <div class="col-lg-4 col-md-4 align-self-center text-md-right">
                        <?php if(get_theme_mod('smart_tech_blog_popular_articles_button_text') != '' || get_theme_mod('smart_tech_blog_popular_articles_button_link') != '' ){ ?>
                          <a href="<?php echo esc_url( get_theme_mod('smart_tech_blog_popular_articles_button_link') ); ?>"><?php echo esc_html( get_theme_mod('smart_tech_blog_popular_articles_button_text') ); ?><i class="fas fa-long-arrow-alt-right ml-3"></i></a>
                        <?php }?>
                      </div>
                    </div>
                    <hr>
                  <?php }?>

                 <div class="row">
              <?php
                $smart_tech_blog_popular_articles_cat1 = get_theme_mod('smart_tech_blog_popular_articles_category','');
                if($smart_tech_blog_popular_articles_cat1){
                  $smart_tech_blog_popular_articles_query4 = new WP_Query(array( 'category_name' => esc_html($smart_tech_blog_popular_articles_cat1,'smart-tech-blog')));
                  while( $smart_tech_blog_popular_articles_query4->have_posts() ) : $smart_tech_blog_popular_articles_query4->the_post(); ?>
                    <div class="col-lg-6 col-md-4">
                      <div class="featured-imagebox mb-4">
                        <div class="popular-box">
                            <?php the_post_thumbnail(); ?>
                          <div class="content-box ">
                            <h4 class="title mt-2 mb-0"><?php the_title(); ?></h4>
                            <p class="mb-1"><?php $smart_tech_blog_popular_articles_excerpt = get_the_excerpt(); echo esc_html( smart_tech_blog_popular_articles_string_limit_words( $smart_tech_blog_popular_articles_excerpt, 15 )); ?></p>
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read Full Recipe','smart-tech-blog'); ?><i class="fas fa-long-arrow-alt-right ml-2"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endwhile;
                wp_reset_postdata();
              } ?>
            </div>
          <?php }?> 
          </div>
        </section>

        <section id="post-n-sidebar" class="py-5">
          <div class="container">
            <?php if(get_theme_mod('food_recipe_blog_latest_recipes_category') != '' || get_theme_mod('food_recipe_blog_latest_recipes_title') != '' || get_theme_mod('food_recipe_blog_latest_recipes_button_text') != '' || get_theme_mod('food_recipe_blog_latest_recipes_button_link') != ''){ ?>

              <?php if(get_theme_mod('food_recipe_blog_latest_recipes_title') != '' || get_theme_mod('food_recipe_blog_latest_recipes_button_text') != '' || get_theme_mod('food_recipe_blog_latest_recipes_button_link') != ''){ ?>
                <div class="row recipe-head text-left">
                  <div class="col-lg-8 col-md-8 align-self-center">
                    <?php if(get_theme_mod('food_recipe_blog_latest_recipes_title') != ''){ ?>
                      <h3><?php echo esc_html(get_theme_mod('food_recipe_blog_latest_recipes_title')); ?></h3>
                    <?php }?>
                  </div>
                  <div class="col-lg-4 col-md-4 align-self-center text-md-right">
                    <?php if(get_theme_mod('food_recipe_blog_latest_recipes_button_text') != '' || get_theme_mod('food_recipe_blog_latest_recipes_button_link') != '' ){ ?>
                      <a href="<?php echo esc_url( get_theme_mod('food_recipe_blog_latest_recipes_button_link') ); ?>"><?php echo esc_html( get_theme_mod('food_recipe_blog_latest_recipes_button_text') ); ?><i class="fas fa-long-arrow-alt-right ml-3"></i></a>
                    <?php }?>
                  </div>
                </div>
                <hr>
              <?php }?>

              <?php
              $food_recipe_blog_args = array(
                'post_type' => 'post',
                'posts_per_page' => get_theme_mod('food_recipe_blog_latest_recipes_number'),
                'category_name' => get_theme_mod('food_recipe_blog_latest_recipes_category'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $food_recipe_blog_args );
              while ( $loop->have_posts() ) : $loop->the_post();

                get_template_part('template-parts/content', get_post_type());

              endwhile; wp_reset_query(); ?>
            <?php }?>         
          </div>
        </section>

        <section id="page-content">
          <div class="container">
            <div class="py-3">
              <?php
                if ( have_posts() ) :
                  while ( have_posts() ) : the_post();
                    the_content();
                  endwhile;
                endif;
              ?>
            </div>
          </div>
        </section>      
      </div>
      <div class="col-lg-4 col-md-4 pt-5">
        <div class="sidebar">
          <?php dynamic_sidebar('front-sidebar'); ?>
        </div>
      </div>
    </div>
  </div> 
</main>

<?php get_footer(); ?>