<?php
/**
 * The template used for displaying Eventos via ACF
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */
?>

<?php //Bloques de eventos ?>
<?php if(get_field('eventos')): ?>
	<?php while(has_sub_field('eventos')): ?>
		<a href="<?php the_sub_field('enlace_del_evento'); ?>">
			<h2><?php the_sub_field('nombre_del_evento'); ?></h2>
		</a>
		<span><?php the_sub_field('fecha_del_evento'); ?></span>
		<img src="<?php the_sub_field('imagen_del_evento'); ?>" />
		<p><?php the_sub_field('descripcion_del_evento'); ?></p>
	<?php endwhile; ?>
<?php endif; ?>