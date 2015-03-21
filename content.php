<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */
?>

<article class="resumen-articulo">
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <h4 class="entry-autor">Publicado por <?php the_author(); ?></h4>
    </header><!-- .entry-header -->
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
        <?php if ( has_post_thumbnail() ) {	?>
            <div class="entry-thumbnail"><?php the_post_thumbnail('medium'); ?></div>
        <?php } ?>
    </div><!-- .entry-summary -->
</article>