<?php
/* Smarty version 4.4.1, created on 2024-08-11 06:05:05
  from 'C:\wamp64\www\sinapsis\wp-content\plugins\recuperar-contrasena\public\partials\new_pass.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_66b85491291ed6_65744169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f9e2d5a7a21a3a79fe5c9d1dfd268dec7f98bbf' => 
    array (
      0 => 'C:\\wamp64\\www\\sinapsis\\wp-content\\plugins\\recuperar-contrasena\\public\\partials\\new_pass.tpl',
      1 => 1723356259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66b85491291ed6_65744169 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid">
    <div class="col-12 text-center">

        <div class="text-new-pass">
            <h3>Establecer Nueva Contraseña</h3>
            <p>Para completar el proceso de recuperación de tu cuenta, por favor ingresa tu nueva contraseña en el campo a continuación.</p>
        </div>

        <div id="box-form-recovery-pass">
            <div class="input-new-pass text-start mt-5">
                <p>Nueva contraseña.</p>
                <div class="input-group mb-3">
                    <input id="new_pass_user" type="password" class="form-control">
                </div>
            </div>

            <div class="repeat-input-new-pass text-start">
                <p>Repite la nueva contraseña.</p>
                <div class="input-group mb-3">
                    <input id="repeat_new_pass_user" type="password" class="form-control">
                </div>
            </div>

            <div id="error_repeat_pass"></div>

            <div class="button-recovery">
                <button type="button" id="button_recovery_pass" style="display: inline-flex;">
                    <div id="loading_pass_recovery" style="margin-top: 5px; margin-right: 10px;width: 1rem; height: 1rem; display: none;" class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>
                    Cambiar contraseña
                </button>
            </div>
        </div>

        <div id="message-recovery-pass"></div>

    </div>
</div><?php }
}
