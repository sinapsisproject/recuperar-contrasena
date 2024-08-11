jQuery(document).ready( function(){

    jQuery("#button_send_email_recovery").on("click" , function(){

        let email = jQuery("#email_user").val();

        let data_email = {
            "email" : email
        }
    
        jQuery.ajax({
            type : "post",
            url : wp_ajax_recovery_pass.ajax_url_validar_email,
            data : data_email,
            error: function(response){
                console.log(response);
            },
            success: function(response) {

                jQuery("#recovery_pass_error").html("");

                if(response.status == true){
                    
                    jQuery("#form-mail-recovery").remove();
                    jQuery("#button-form-mail-recovery").remove();
                    jQuery("#message-send-email").html("<h4 class='send_email_recovery'>Correo enviado.</h4>");

                }else{

                    response.errors.forEach(error => {
                        jQuery("#recovery_pass_error").html(error.text);
                    });
                }
            },
            beforeSend: function (qXHR, settings) {
                jQuery('#loading_validar_mail_recovery').fadeIn();
            },
            complete: function () {
                jQuery('#loading_validar_mail_recovery').fadeOut();
            },
        })

    })



    jQuery("#button_recovery_pass").on("click" , function(){

        const url   = new URL(window.location.href);
        const code  = url.searchParams.get('code');
        const email = url.searchParams.get('email');      

        jQuery("#error_repeat_pass").html("");

        let pass_1 = jQuery("#new_pass_user").val();
        let pass_2 = jQuery("#repeat_new_pass_user").val();



        if(pass_1 == pass_2){

            data = {
                "code"      : code,
                "email"     : email,
                "password"  : jQuery("#new_pass_user").val()
            }

            jQuery.ajax({
                type : "post",
                url : wp_ajax_recovery_pass.ajax_url_update_password,
                data : data,
                error: function(response){
                    console.log(response);
                },
                success: function(response) {
                    
                    console.log(response);

                    if(response.status == true){
                        jQuery("#box-form-recovery-pass").remove();
                        jQuery("#message-recovery-pass").html("<h3>La contraseña se ha actualizado con éxito. Ahora puedes volver a <a class='login_button' href='/'>iniciar sesión.</a></h3>");

                    }else{
                        jQuery("#box-form-recovery-pass").remove();
                        jQuery("#message-recovery-pass").html("<h3>Algo salió mal. Por favor, vuelve a intentarlo. <a href='/recuperar-contrasena/'>Recuperar contraseña</a> </h3>");
                    }
                   
                },
                beforeSend: function (qXHR, settings) {
                    jQuery('#loading_pass_recovery').fadeIn();
                },
                complete: function () {
                    jQuery('#loading_pass_recovery').fadeOut();
                },
            })

        }else{
            jQuery("#error_repeat_pass").html("Las contraseñas deben ser iguales");
        }

    

    })


})

