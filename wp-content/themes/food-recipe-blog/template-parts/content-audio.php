<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Food Recipe Blog
 */

$food_recipe_blog_post_page_title =  get_theme_mod( 'food_recipe_blog_post_page_title', 1 );
$food_recipe_blog_post_page_meta =  get_theme_mod( 'food_recipe_blog_post_page_meta', 1 );
$food_recipe_blog_post_page_btn = get_theme_mod( 'food_recipe_blog_post_page_btn', 1 );
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the audio file.
        if ( ! empty( $audio ) ) {
          foreach ( $audio as $audio_html ) {
            echo '<div class="entry-audio">';
              echo $audio_html;
            echo '</div><!-- .entry-audio -->';
          }
        };
      };
    ?>
    <div class="serv-cont">
      <div class="entry-summary p-3 m-0">
        <?php echo get_avatar( get_the_author_meta('ID'), 40); ?>
          <div class="author-date">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
            <p class="mb-0"><?php echo esc_html(get_the_date()); ?></p>
          </div>
        <?php if ($food_recipe_blog_post_page_title == 1 ) {?>
          <?php the_title('<h3 class="entry-title pt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
        <?php }?>
        <p class="mt-3"><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
        <?php if ($food_recipe_blog_post_page_btn == 1 ) {?>
          <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read Full Recipe','food-recipe-blog'); ?><i class="fas fa-long-arrow-alt-right ml-3"></i></a>
        <?php }?>
      </div>
      <?php if ($food_recipe_blog_post_page_meta == 1 ) {?>
        <div class="meta-info-box">
          <span class="entry-view"><i class="fas fa-eye mr-2"></i> <?php echo esc_html(food_recipe_blog_gt_get_post_view()); ?></span>
          <span class="entry-time ml-3"><i class="fas fa-clock mr-2"></i> <?php echo esc_html( get_the_time() ); ?></span>
          <span class="ml-3"><i class="fas fa-comments mr-2"></i> <?php comments_number( esc_attr('0', 'food-recipe-blog'), esc_attr('0', 'food-recipe-blog'), esc_attr('%', 'food-recipe-blog') ); ?> <?php esc_html_e('Comments','food-recipe-blog'); ?></span>
        </div>
      <?php }?>
    </div>
  </article>