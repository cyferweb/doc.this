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


//nao permite o acesso direto
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


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

function page_admin() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
}

function page_html() {
    $data = trim(get_option('meu_conteudo'));
    if (isset($_POST['docthis_salvar'])) {
        $note = wp_kses_post(stripslashes($_POST['meu_conteudo']));

    if (get_option('meu_conteudo') !== false) {
        update_option('meu_conteudo', $note);
    
    }else {
        add_option('meu_conteudo', $note);
    }
    
    echo '<meta http-equiv="refresh" content="0">';

    }else {
	
	echo '<div class="wrap oi">';
	echo '<h1>Salve a vida do próximo programador, documente isso.</h1>';
	echo '</div>';
    echo '<form method="post" action="'.admin_url('admin.php?page=doc-this').'">';
	echo '<div class="textarea-wrap" id="docthis">';
	echo wp_editor($data,'meu_conteudo',$settings = array('teeny' => true, 'media_buttons' => false));
	echo '</div>';
    echo '<p style="margin-bottom:0;"><input type="submit" id="save" value="Salvar documento" class="button-primary"></p>';
	echo '<input type="hidden" name="docthis_salvar" id="docthis_salvar" value="true"></form>';
}
}


