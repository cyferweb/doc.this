<?php

/**
 * Plugin Name
 *
 * @package           DOC.this
 * @author            Fernando Filho
 * @copyright         2021 cyfer development
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       DOC.this
 * Plugin URI:        https://cyfer.com.br/
 * Description:       Plugin simples para documentação no painel de controle de plugins, temas e tudo que seja necessário documentar
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Fernando Filho
 * Author URI:        https://cyfer.com.br/
 * Text Domain:       doc-this
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */




add_action( 'admin_menu', 'meu_menu' );

function meu_menu() {
    add_menu_page(
        //titulo na aba
        'docthis',
        //titulo no menu lateral
        'Documentos',
        //localização do plugin
        'manage_options',
        //titulo no final do link
        'doc-this',
        //página onde se encontra o conteudo
        'wporg_options_page_html',
        plugin_dir_url(__FILE__) . 'images/icon.png',
        20
    );
}

