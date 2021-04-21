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
        'docthis',                      //titulo na aba
        'Documentos',                   //titulo no menu lateral
        'manage_options',               //localização do plugin
        'doc-this',                     //titulo no final do link
        'page_html',                    //página onde se encontra o conteudo
        plugin_dir_url(__FILE__) . "/admin/image/icon.svg",
        1                               //ordem do menu na barra lateral
    );
}

function page_html() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Aqui sera exibida a sua documentacao.</p>';
	echo '</div>';
}

