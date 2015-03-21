<?php
/**
 * The template used for displaying Eventos via Categorías
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */
?>

<?php $catid = get_field('categoria_de_eventos'); ?>
<?php $post_per_page = get_field('eventos_por_pagina'); ?>

<?php //Query para la categoría seleccionada
$args = array(
	'cat' => $catid,
	'posts_per_page' => $post_per_page,
	'paged' => get_query_var('paged'),
	'order' => 'ASC',
	//'order' => 'DESC',
	'orderby' => 'meta_value',
	'meta_key' => 'fecha_evento',
);
$consulta = new WP_Query( $args ); ?>          

<?php if ( $consulta ->have_posts() ) :   ?>

	<?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>
		<?php $fecha_evento = get_field('fecha_evento'); ?>
        <?php $fecha_procesada = fecha_en_array($fecha_evento); ?>
		
		<div class="bloque-evento">
            <div class="fecha-evento" >
				<?php if ( 'post' == get_post_type() ) : ?>
                    <h4><?php echo $fecha_procesada['day']; ?></h4>
                    <h5><?php mes_en_texto( $fecha_procesada['month'] ); ?></h5> 
                    <h5><?php echo $fecha_procesada['year']; ?></h5>
                <?php endif; ?>
    		</div>
            <h2 class="titulo-evento"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <h4 class="subtitulo-evento"><i class="fa fa-map-marker"></i> <?php the_field('subtitulo_evento'); ?></h4>
            <div class="entry-summary">
                <p class="descripcion-evento"><?php the_field('descripcion_evento'); ?></p>
                <img src="<?php the_field('imagen_evento'); ?>" alt="<?php the_title(); ?>" />
            </div><!-- .entry-summary -->

        </div>

	<?php endwhile; ?>
    
	<!-- PAGINACIÓN CUSTOM QUERIES -->
	<?php the_custom_numbered_nav( $consulta ); ?>   
	
<?php endif; ?>