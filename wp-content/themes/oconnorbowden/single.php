<?php
// Single Blog Post
$thumb_id   = get_post_thumbnail_id( $post->ID );
$image      = wp_get_attachment_image_url( $thumb_id, 'large' );
$terms      = get_the_terms( $post->ID, 'category' );
$term       = $terms[0];
$cat_colour = get_field( 'category_colour', 'category_' . $term->term_id );
get_header(); ?>

<section class="spacer hero no-hidden" style="border-bottom: 4px solid <?= $cat_colour ?>">
  <div class="hero-item" style="background-image: url( <?= $image ?> );">
  </div>
</section>

<div id="blog--container" class="container-fluid max-width-container">
  <div id="blog-entry--single" class="row">
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        ?>
        <?php the_post(); ?>
        <div class="col-12">
          <h1><?php the_title() ?></h1><span class="date"><?php the_date( 'd/m/Y' ) ?></span>
        </div>
        <div class="col-12">
          <?php the_content(); ?>
        </div>
      <?php }
    }
    ?>
    <div class="col-12">
      <a class="goto-cat" href="<?php echo get_category_link( $term->term_id ) ?>"
         style="background-color: <?= $cat_colour ?>">
        Go to <?= $term->name ?>
      </a>
    </div>
  </div>
</div>
<?php get_footer(); ?>
