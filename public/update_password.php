<?php

require(dirname(__FILE__) .'/../../../../wp-load.php');

$code       = $_POST["code"];
$email      = $_POST["email"];
$password   = $_POST["password"];


$body_pass = [
    "code" => $code,
    "email"  => $email,
    "password" => $password
];

$response = RfCoreCurl::curl('/api/users/update_password_recovery' , 'POST' , NULL , $body_pass);

if($response->status){

    $user = get_user_by('login', $email);

    if ($user) {
        wp_set_password($password, $user->ID);

        wp_send_json(array(
            'status' => true,
            'response' => $response
        ));

    } else {
        
        wp_send_json(array(
            'status' => false,
            'message' => "Usuario no encontrado"
        ));

    }

}


?>