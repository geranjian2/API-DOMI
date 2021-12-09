<?php
    function save($req){
        $conexion = connectDB();
        $body = $req['BODY'];
        $nombre = $body->nombre;
        $apellido = $body->apellido;
        $email = $body->email;
        $celular = $body->celular;
        $telefono = $body->telefono;
        $foto = $body->foto;
        $direccion = $body->direccion;

        $sql_stmt = "INSERT INTO lists.users (nombre, apellido, direccion, telefono, celular, email, foto)
    VALUES('{$nombre}','{$apellido}','{$direccion}', '{$telefono}', '{$celular}','{$email}', '{$foto}')";

        $result = mysqli_query( $conexion, $sql_stmt )or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

        if ( $result ) {
            json_encode_response('usuario creado exitosamente', 200, null);
        } else {
            json_encode_response('EL usuario no se ha podio crear', 400, null);
        }

    }
    function update($req){
        $conexion = connectDB();
        $body = $req['BODY'];
        $params = $req['PARAMS'];
        $id_user = $params[0];
        $nombre = $body->nombre;
        $apellido = $body->apellido;
        $email = $body->email;
        $celular = $body->celular;
        $telefono = $body->telefono;
        $foto = $body->foto;
        $direccion = $body->direccion;
        $sql_stmt = "UPDATE users SET nombre='{$nombre}', apellido='{$apellido}', direccion='{$direccion}', telefono='{$telefono}', celular='{$celular}', email='{$email}', foto='{$foto}' WHERE cod=$id_user";

        $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

        if ( $result ) {
            json_encode_response('usuario Actualizado exitosamente', 200, null);
        } else {
            json_encode_response('EL usuario no se ha podio Actualizado', 400, null);
        }
    }
    function all($req){
        $conexion = connectDB();
        $sql_stmt = "SELECT nombre, email, apellido, telefono FROM users"; 
        $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );
        if($result){
            $rows=mysqli_num_rows($result);
            if($rows){
                $emparray = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $emparray[] = $row;
                }
                json_encode_response('usuarios', 200, $emparray);
            }else{
                json_encode_response('no hay usuarios', 200);
            }
        }
    }
    function getid($req){
        $params = $req['PARAMS']; 
        $id_user = $params[0];
        $rol_user = $params[1];
    }
    function delete($req){
        
    }
    function login($req){
        $conexion = connectDB();
        $body = $req['BODY'];
        $email = $body->email;

        $sql_stmt = "SELECT nombre, apellido, email, direccion FROM users WHERE email= '{$email}'";

        $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

        if($result){
             $rows=mysqli_num_rows($result);
             
             if($rows){
                $list_users=mysqli_fetch_assoc($result);
                json_encode_response('usuario Logueado', 200, $list_users);
             }else{
                json_encode_response('usuario no existe o contraseña incorrecta', 200);
             }
        }


    }
    function logout($req){
        echo "hola mundo";
    }
?>
