<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Food Recipe Blog
 */
$food_recipe_blog_single_post_thumb =  get_theme_mod( 'food_recipe_blog_single_post_thumb', 1 );
$food_recipe_blog_single_post_meta =  get_theme_mod( 'food_recipe_blog_single_post_meta', 1 );
$food_recipe_blog_single_post_title = get_theme_mod( 'food_recipe_blog_single_post_title', 1 );
$food_recipe_blog_single_post_tags = get_theme_mod( 'food_recipe_blog_single_post_tags', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ($food_recipe_blog_single_post_title == 1 ) { ?>
            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php }?>

        <?php if ($food_recipe_blog_single_post_meta == 1 ) { ?>
            <div class="meta-info-box">
                <span class="entry-view"><i class="fas fa-eye mr-2"></i> <?php echo esc_html(food_recipe_blog_gt_get_post_view()); ?></span>
                <span class="entry-time ml-3"><i class="fas fa-clock mr-2"></i> <?php echo esc_html( get_the_time() ); ?></span>
                <span class="ml-3"><i class="fas fa-comments mr-2"></i> <?php comments_number( esc_attr('0', 'food-recipe-blog'), esc_attr('0', 'food-recipe-blog'), esc_attr('%', 'food-recipe-blog') ); ?> <?php esc_html_e('Comments','food-recipe-blog'); ?></span>
                <span class="ml-3"><i class="fas fa-calendar-alt mr-2"></i><?php echo esc_html(get_the_date()); ?></span>
            </div>
        <?php }?> 

        <?php if ($food_recipe_blog_single_post_thumb == 1 ) {?>
            <?php if(has_post_thumbnail()) {?>
                <?php the_post_thumbnail(); ?>
            <?php }?>
        <?php }?>
    </header>
    <div class="entry-content">        
        <?php
        the_content(sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'food-recipe-blog'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            esc_html( get_the_title() )
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'food-recipe-blog'),
            'after' => '</div>',
        ));
        ?>
        <?php if ($food_recipe_blog_single_post_tags == 1 ) {?>
            <?php the_tags(); ?>
        <?php }?>
    </div>
</article>