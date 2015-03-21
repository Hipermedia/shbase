<?php
/**
 * The template used for displaying Submenús via ACF
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */
?>
	
<?php if(get_field('submenu')): ?>
	<?php $submenu = get_field('submenu'); ?>
	<?php //echo '<pre style="display:block;">'; print_r( $submenu ); echo '</pre>'; // PRINT_R ?>
    <?php //Habilita en ACF filed groups las plantillas o categorías donde desees que aparezcan estos menus. Utiliza las etiquetas condicionales de WP para mostrar los menús. Ej: puede mostrarse si la página pertenece a X plantilla o si un post está en X categoría. ?>
    <section class="submenu-dependencia group">
        <!-- NOMBRE DE SUBMENU -->
        <h3 class="nombre-submenu"><?php echo $submenu->name; ?></h3>
        
        <!-- SUBMENU -->
        <?php
        $defaults = array(
            'theme_location'  => '',
            'menu'            => $submenu->ID,
            'container'       => 'nav', //Contenedor del menú "nav" o "div"
            'container_class' => 'nav-collapse', //Clase para el contenedor
            'container_id'    => 'access', //Id para el contenedor
            'menu_class'      => 'submenu', //agrega una clase al submenú
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', //Envoltura de elementos <ul>
            'depth'           => 0,
            'walker'          => ''
            //Más información http://codex.wordpress.org/Function_Reference/wp_nav_menu
        );
        
        wp_nav_menu( $defaults );
        
        ?>
    </section>
    
    
<?php endif; ?>