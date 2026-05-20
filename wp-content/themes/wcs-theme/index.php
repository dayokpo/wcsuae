<?php
/**
 * Default fallback template — directs to homepage if no specific template matches.
 */

get_header();
?>

<main id="main" style="padding-top: 120px; padding-bottom: 80px;">
  <div class="container">
    <?php if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <h1 style="color: var(--color-text); font-family: var(--font-display); margin-bottom: 1rem;"><?php the_title(); ?></h1>
        <div style="color: var(--color-text-muted);"><?php the_content(); ?></div>
      <?php endwhile;
    else : ?>
      <p style="color: var(--color-text-muted);">No content found. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: var(--color-primary);">Return home</a></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
