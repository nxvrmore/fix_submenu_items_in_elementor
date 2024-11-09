<?php
/*
Plugin Name: Fix submenu items in Elementor menu
Plugin URI: https://github.com/nxvrmore
Description: Resuelve el problema de que los subelementos del menú no se pueden hacer clic en el menú de Elementor, permitiendo tanto la navegación como el despliegue del submenú.
Version: 1.0
Author: Nxvermore
Author URI: https://github.com/nxvrmore
License: GPL2
*/

// Asegúrate de que WordPress cargue este script solo en el frontend
function fix_submenu_items_in_elementor_menu_script() {
    if (is_admin()) return; // Solo en el frontend

    // Enqueue del script JavaScript
    wp_enqueue_script(
        'fix-submenu-items',
        plugin_dir_url(__FILE__) . 'js/fix-submenu-items.js', // Ruta al archivo JS
        array('jquery'), // Dependencias
        null, // Versión (puedes cambiarla si lo deseas)
        true // Coloca el script al final (para evitar conflictos)
    );
}
add_action('wp_enqueue_scripts', 'fix_submenu_items_in_elementor_menu_script');

// Asegúrate de que el script solo se ejecute si Elementor está activo
function fix_submenu_items_check_elementor() {
    if (class_exists('Elementor\Plugin')) {
        fix_submenu_items_in_elementor_menu_script();
    }
}
add_action('wp_enqueue_scripts', 'fix_submenu_items_check_elementor');
