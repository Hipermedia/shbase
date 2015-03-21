<?php
/**
 * Template Name: Portada de dependencia
 * Description: Permite elegir una categoría para un slider y laconfiguración del slider, una categoría para un resumen de categoría y el número de post del resumen de la categoría vía ACF. Tambien puedes agregar un menú personalizado, bloques de código html, logo para la dependencia, redes sociales exclusivas para esta página y un texto descriptivo.
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

            <article class="content-dependencia">
					<section id="contenedor-dependencia-flexslider" class="group">
						<?php get_template_part( 'content', 'flexslider-acf' ); ?>
					</section>
                    
                    <!-- INFORMACIÓN DE LA DEPENDENCIA -->
                    <section class="info-dependencia">
                       <div class="nombre-dependencia group">
                        <?php if ( !get_field('logotipo_de_la_dependencia') ) { ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header><!-- .entry-header -->
                        <?php } ?>
                        <img src="<?php the_field('logotipo_de_la_dependencia'); ?>" alt="<?php the_field('nombre_de_la_dependencia'); ?>"/>
                        </div>
                        <div class="descripcion-dependencia">
                        	<?php the_field('descripcion_de_la_dependencia'); ?><br />
                        </div>
                        <div class="contacto-dependencia">
                            <p><i class="fa fa-phone"></i> <?php the_field('telefono_de_la_dependencia'); ?></p>
                            <p><i class="fa fa-map-marker"></i> <?php the_field('direccion_de_la_dependencia'); ?></p>
                            <p><i class="fa fa-envelope"></i> <?php the_field('email_de_la_dependencia'); ?></p>
                        </div>
                        <div id="social-contacto" class="redes-sociales-dependencia">
							<?php get_template_part( 'content', 'enlaces-redes-sociales-acf' ); ?>
                    	</div>
                    </section>
                    
                    
                    <!-- BLOQUES DE PORTADA -->
                        <section class="bloques-portada-dependencia group">
                        <?php //determina el ancho del bloque según el numero de bloques
							$num_bloques = count(get_field('bloques_de_enlaces_dep')); 
							$ancho = 100 / $num_bloques; ?>
                            
                        <?php if(get_field('bloques_de_enlaces_dep')): ?>
                            <?php while(has_sub_field('bloques_de_enlaces_dep')): ?>
    							 
                                 <div class="bloque-portada-dependencia" style="width: <?php echo $ancho; ?>%;">
                                    <a href="<?php the_sub_field('enlace_bloque_dep'); ?>" rel="<?php the_sub_field('titulo_bloque_dep'); ?>">
                                        <img src="<?php the_sub_field('imagen_bloque_dep'); ?>" />
                                        <h3 style="background-color: <?php the_sub_field( 'bg_bloque_dep' ); ?>"><?php the_sub_field('titulo_bloque_dep'); ?></h3>
                                    </a>
                                 </div>
                                    
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </section>
                    
                    <!-- CONTENIDO DE LA PAGINA -->
                    <section class="entry-content">
                		<?php the_content(); ?>
                	</section><!-- .entry-content -->
                    
                    
                    <!-- BLOQUES DE INSERCIÓN DE TEXTO -->
					<section class="bloques-texto-dependencia">
						<?php if(get_field('bloques_de_codigo_dep')): ?>
                            <?php while(has_sub_field('bloques_de_codigo_dep')): ?>
    
                                <h3><?php the_sub_field('titulo_bloque_codigo_dep'); ?></h3>
                                <?php the_sub_field('bloque_de_codigo_dep'); ?>
    
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </section>
					
                    <section class="articulos-dependencia">
                    	<h3><?php the_field('titulo_para_el_resumen'); ?></h3>
						<?php get_template_part( 'content', 'resumen-contenido-acf' ); ?>
					</section>
                    
				</section><!-- .entry-content -->

                <footer class="entry-footer">
					<?php the_social_share(); ?>
            	</footer><!-- .entry-footer -->	
                
         	</article><!-- #post-<?php the_ID(); ?> -->	
          
		  <?php endwhile; // end of the loop. ?>
            
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>