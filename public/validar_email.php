<?php 

require(dirname(__FILE__) .'/../../../../wp-load.php');

$errors = array();

if($_POST["email"] == ''){
    array_push($errors, ['id' => 'correo_recovery_pass' , 'text' => 'El Correo electrónico es requerido.']);
}else if(strlen($_POST["email"]) > 0 && sanitize_email($_POST["email"]) == ''){
    array_push($errors, ['id' => 'correo_recovery_pass' , 'text' => 'El Correo electrónico no es válido']);
}else{
    if(strlen($_POST["email"]) > 0 && email_exists(sanitize_email($_POST["email"]))){  
       $email = $_POST["email"];
    }else{
        array_push($errors, ['id' => 'correo_recovery_pass' , 'text' => 'El Correo electrónico no está en nuestros registros.']);
    }
}


if(count($errors) >= 1){
    wp_send_json( array(
        'status' => false,
        'errors' => $errors
    )); 
}else{

    $body = [
        "email" => $email
    ];
    $response_code = RfCoreCurl::curl('/api/users/code_recovery_pass' , 'POST' , NULL , $body);

    if($response_code->status == true){

        // $body_active = [
        //     "id_automatizacion" => 8,
        //     "email" => $email,
        //     "code" => $response_code->code
        // ];

        //$response_ac = RfCoreCurl::curl('/api/activecampaign/send_mail_template' , 'POST' , NULL , $body_active);

        $body_active = [
            "email" => $email,
            "code"  => $response_code->code
        ];

        $response_ac = RfCoreCurl::curl('/api/send_mail/send_mail_recovery_pass' , 'POST' , NULL , $body_active);

        wp_send_json(array(
            'status' => true,
            'response' => $response_ac
        ));

    }else{

        array_push($errors, ['id' => 'correo_recovery_pass' , 'text' => 'Error al enviar el email']);

        wp_send_json( array(
            'status' => false,
            'errors' => $errors
        )); 
    }

    
}


    













?>