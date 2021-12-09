<?php

class Jwt
{

    //Cabeza
    private static $header = array(
        'alg' => 'HS256', // Algoritmo para generar firma
        'typ' => 'JWT' // Tipo
    );

    // La clave utilizada cuando se utiliza HMAC para generar el resumen del mensaje
    private static $key = "";

    public function __construct()
    {
        // En el desarrollo real, si no realiza un token de inicio de sesión dinámico, pero realiza alguna verificación de token de interfaz, puede establecer $ key en un valor aleatorio con permisos asignados
        self::$key = time();
    }

    public static function getToken(array $payload)
    {
        if (is_array($payload)) {
            $header = urlencode(json_encode(self::$header, true));
            $payload = urlencode(json_encode($payload, true));
            $token = $header . '.' . $payload . '.' . urlencode($header . $payload . self::$key . self::$header['alg']);
            return $token;

            // Durante el desarrollo real, coloque el token y expireTime en la tabla de usuario y setTime en la tabla de registro
            /*
         $user_id = 1;
        $setTime = time();
        $expireTime = time() + 7200;
        $sql1 = "update user  where user_id = $user_id set setTime = $expireTime";
        $sql2 = "insert into log (user_id, set_time) values ($user_id, $setTime)";
    */
        } else {
            return false;
        }
    }


    public static function verifyToken($Token)
    {
        $tokens = explode('.', $Token);
        if (count($tokens) != 3)
            return false;

        list($header, $payload, $sign) = $tokens;

        // Obtener el algoritmo jwt
        if (empty(json_decode(urldecode($header), true)['alg'])) {
            return 'El algoritmo de firma no coincide';
        }

        //Verificación de firma
        if (urlencode($header . $payload . self::$key  . self::$header['alg']) !== $sign)
            return 'Signature error ';

        $payload = json_decode(urldecode($payload), JSON_OBJECT_AS_ARRAY);


        if (isset($payload['expireTime']) && $payload['expireTime'] < time())
            return 'Signature invalid ';

        return $payload;
    }
}
