<?php
/**
 * Template Name: Eventos
 * Description: Crea lista de eventos vía ACF.
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */

get_header(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <article>
                <header class="page-header">
                	<h1 class="page-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
                
                <section class="entry-content">
                	<?php the_content(); ?>
                </section><!-- .entry-content -->
                
                <section class="entry-eventos">
                	
					<?php //Elige eventos-cat para obtener enventos por categoría o eventos-acf para obtenerlos vía ACF ?>
					<?php //get_template_part( 'content', 'eventos-acf' ); ?>
					<?php get_template_part( 'content', 'eventos-cat' ); ?>

				</section><!-- .entry-content -->

                <footer class="entry-footer">
					<?php the_social_share(); ?>
            	</footer><!-- .entry-footer -->	
                
         	</article><!-- #post-<?php the_ID(); ?> -->	
          
		  <?php endwhile; // end of the loop. ?>
            
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>