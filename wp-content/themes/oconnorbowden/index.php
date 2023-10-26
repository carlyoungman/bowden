<?php
// Default Blog Archive
$current_category = get_term( $cat );
?>

<?php get_header();
$image = get_field( 'blog_hero_image', get_option( 'page_for_posts' ) );
?>

<section class="spacer hero no-hidden">
  <div class="hero-item" style="background-image: url( <?= $image['sizes']['large'] ?> );">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col-md">
          <div class="hero-item-inner">
            <h1>Blog</h1>
            <h2><?= $current_category->name ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="blog--container" class="container-fluid max-width-container">
  <h2>Filter</h2>
  <div id="blog--filter" class="row">
    <?php if ( is_home() ) {
      $blog_class = 'current-category';
    }
    ?>
    <a href="<?= get_permalink( get_option( 'page_for_posts' ) ) ?>"
       class="<?= $blog_class ?> col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
      <div>
        All Posts
      </div>
    </a>
    <?php
    $categories = get_categories();
    foreach ( $categories as $category ) {


      $cat_colour = get_field( 'category_colour', 'category_' . $category->term_id );

      // Skip uncategorised
      if ( $category->term_id == 1 ) {
        continue;
      }

      // Set current category class
      if ( $cat == $category->term_id ) {
        $cat_class = 'current-category';
      } else {
        $cat_class = '';
      }
      ?>
      <a href="<?= get_category_link( $category->term_id ) ?>" data-id="<?= $category->term_id ?>"
         class="<?= $cat_class ?> col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
        <div>
          <?= $category->name; ?>
        </div>
      </a>

    <?php } ?>
  </div>
  <div class="row">

    <?php
    // Pagination and initial query args
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args  = array( 'post_type' => 'post', 'posts_per_page' => 9, 'paged' => $paged );


    // Exclude uncategorised posts
    if ( is_home() ) {
      $cat_args             = array( 'exclude' => 1, 'fields' => 'ids' );
      $args['category__in'] = get_terms( 'category', $cat_args );
    } else {
      $args['cat'] = $cat;
    }

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) { ?>

        <?php $query->the_post(); ?>

        <article id="blog--entry" <?php post_class( 'col-12 col-sm-6 col-md-6 col-lg-4 pb-5' ) ?>/>
        <?php
        $terms      = get_the_terms( $post->ID, 'category' );
        $term       = $terms[0];
        $cat_colour = get_field( 'category_colour', 'category_' . $term->term_id );
        ?>
        <a class="entry--colour" href="<?php the_permalink() ?>" style="background-color:<?= $cat_colour ?>">
          <div class="entry--wrap">
            <?php
            if ( has_post_thumbnail() ) {
              $thumb_id = get_post_thumbnail_id( $post->ID );
              $image    = wp_get_attachment_image_url( $thumb_id, 'medium' );
            } else {
              $image = "//placehold.it/600x400";
            } ?>
            <div class="entry__image" style="background-image:url(<?= $image ?>)">
            </div>
            <div class="entry__excerpt">
              <span class="title"><?php the_title() ?></span><span class="date"><?php the_date() ?></span>
              <br clear="all"/>
              <?php the_excerpt() ?>
            </div>
          </div>
          <span class="read">Read More</span>
        </a>
        </article>

      <?php }
    } else { ?>
      <div class="col-12 text-center mb-5">
        No Posts Found
      </div>
    <?php }

    $big       = 999999999; // need an unlikely integer
    $page_args = array(
      'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'    => '?paged=%#%',
      'current'   => max( 1, $query->get( 'paged' ) ),
      'next_text' => 'Previous Posts >',
      'prev_text' => '< Recent Posts',
      'total'     => $query->max_num_pages
    );

    ?>
  </div>
  <div id="pagination" class="row no-gutters d-block text-center">
		<span>
		<?php echo paginate_links( $page_args ); ?>
		</span>
  </div>
</div>
</div>

<?php get_footer(); ?>
