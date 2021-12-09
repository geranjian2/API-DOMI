<?php
    function save($req){
        $body = $req['BODY'];
        json_encode_response('usuario creado exitosamente', 200, $body);
    }
    function update($req){
        
    }
    function all($req){
        
    }
    function getid($req){
        $params = $req['PARAMS']; 
        echo $id = $params[0];
    }
    function delete($req){
        
    }
    function login($req){
        $body = $req['BODY'];
        $jwt = new Jwt;
        $array_user = ['email' => $body->email, 'password' => $body->password];
        $payload = array('username' => 'soy nombre de usuario', 'contraseña' => 'soy contraseña');
        echo $tokendecode= base64_decode($body->token);

    }
?>
