<div class="container-fluid">
    <div class="col-12 text-center">
        
        <div class="box-text-recovery-pass">
            <p>Por favor, ingresa tu dirección de correo electrónico asociada a tu cuenta. Te enviaremos un link que podrás utilizar para restablecer tu contraseña. Asegúrate de revisar tu bandeja de entrada y tu carpeta de correo no deseado.</p>
        </div>

        <div id="form-mail-recovery" class="input-mail-recovery-pass">
            <div class="input-group mb-3">
                <input id="email_user" type="mail" class="form-control" placeholder="tu_mail@gmail.com">
            </div>
            <div id="recovery_pass_error" style="text-align: left;"></div>
        </div>

        <div id="button-form-mail-recovery" class="button-recovery-pass"> 
            <button type="button" id="button_send_email_recovery" style="display: inline-flex;">
                <div id="loading_validar_mail_recovery" style="margin-top: 5px; margin-right: 10px;width: 1rem; height: 1rem; display: none;" class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                Enviar
            </button>
        </div>
    
    </div>
    <div id="message-send-email"></div>
</div>