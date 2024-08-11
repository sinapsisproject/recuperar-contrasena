<?php

/*
    Plugin Name: [Sinapsis] Recuperar contraseña
    Plugin URI: https://sinapsis.com
    Description: Plugin para gestion de recuperación de password de usuarios
    Version: 1.0
    Author: Diego Baeza
    Author URI: https://sisnapsis.com
    License: GPL2
*/

add_action( 'wp_enqueue_scripts', 'ajax_enqueue_scripts_recovery_pass' );

function ajax_enqueue_scripts_recovery_pass() {

    if(basename(get_permalink()) == "recuperar-contrasena" || basename(get_permalink()) == "nueva-contrasena"){

        wp_enqueue_script(
            'recovery-pass-js',
            plugins_url( '/public/js/recuperar_contrasena.js', __FILE__ ), 
            array('jquery'),
            rand(0, 99),
            true
        );
        wp_enqueue_style(
            'recovery-pass-css',
            plugins_url( '/public/css/recuperar_contrasena.css', __FILE__ ),
            array(),
            rand(0, 99)
        );

    }

    wp_localize_script(
        'recovery-pass-js',
        'wp_ajax_recovery_pass',
        array(
            'ajax_url_validar_email'        => plugins_url( '/public/validar_email.php' , __FILE__ ),
            'ajax_url_update_password'      => plugins_url( '/public/update_password.php' , __FILE__ )
        )
    );


}



function shortcode_mail_recovery_pass($atts){

    $smarty = new Smarty;
    $smarty->setTemplateDir(dirname(__FILE__) . '/public/partials/');
    $smarty->setCompileDir(dirname(__FILE__) .'/public/compile/');

    //$smarty->assign('cursos', $cursos);

    return $smarty->fetch('email.tpl');

}

add_shortcode("shortcodemailrecoverypass" , "shortcode_mail_recovery_pass");


function shortcode_recovery_pass($atts){

    $smarty = new Smarty;
    $smarty->setTemplateDir(dirname(__FILE__) . '/public/partials/');
    $smarty->setCompileDir(dirname(__FILE__) .'/public/compile/');

    //$smarty->assign('cursos', $cursos);

    return $smarty->fetch('new_pass.tpl');

}

add_shortcode("shortcoderecoverypass" , "shortcode_recovery_pass");




?>