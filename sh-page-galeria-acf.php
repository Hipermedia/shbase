<?php
/**
 * Template Name: Galería de medios
 * Description: Crea la portada de un conjunto de galerías vía ACF.
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */

get_header(); ?>
<div id="primary-full">
<?php get_template_part( 'content', 'submenu-acf' ); ?>
    <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <article>
                <header class="page-header">
                	<h1 class="page-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
                
                <section class="entry-content">
                	<?php the_content(); ?>
                </section><!-- .entry-content -->	
               
                <section class="entry-galeria-medios2 group">
                    
                    <!-- PORTADAS DE GALERÍA DE MEDIOS-->
                    <?php if(get_field('portada_de_galeria')): ?>
                    	
                        <?php while(has_sub_field('portada_de_galeria')): ?>
                     
							<?php // elige el icono para el tipo de documento
							 
							$medio = get_sub_field('tipo_de_la_galeria'); 
							switch ($medio) {
								case 'audio': 
									$tipo = 'fa-music';
									break;
								case 'video':
									$tipo = 'fa-video-camera';	
									break;
								default:
									$tipo = 'fa-picture-o';
								}								
								 ?>

                                <a class="bloque-galeria-medios2" href="<?php the_sub_field('enlace_de_la_galeria'); ?>">
                                    <div class="tipo-medio">
                                        <i class="fa <?php echo $tipo; ?> fa-2x"></i>
                                    </div>
                                    <h3><?php the_sub_field('nombre_de_la_galeria'); ?></h3>
                                    <img src="<?php the_sub_field('portada_de_la_galeria'); ?>" />      
                                </a>
						
						<?php endwhile; ?>
                    <?php endif; ?>

				</section>
    			
                <footer class="entry-footer">
					<?php the_social_share(); ?>
            	</footer><!-- .entry-footer -->	
                
         	</article><!-- #post-<?php the_ID(); ?> -->	
          
		  <?php endwhile; // end of the loop. ?>
            
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>