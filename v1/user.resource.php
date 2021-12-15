<?php
    include "./v1/models/user.php";
    include "./v1/models/restaurant.php";

    function save($req){
        $conexion = connectDB();
        $body = $req['BODY'];
        $files = $req['FILES'];
        $name = $body->name;
        $last_name = $body->last_name;
        $email = $body->email;
        $date_birth = $body->date_birth;
        $cell_phone = $body->cell_phone;
        $telephone = $body->telephone;
        $address = $body->address;
        $password = $body->password;
        $role = $body->role;
        $valid_email = validate_email($req); 
        if($valid_email === 1){
            json_encode_response('El usuario ya existe', 400, null);
        }
        $route_image = upload( $files['photo'],"users" );
       if($route_image === 0){
        json_encode_response('La imagen no se ha podio cargar correctamente', 400, null);
       }
        

        $sql_stmt = "INSERT INTO domi.users ( name, last_name , email, date_birth, cell_phone, telephone, photo, address, password , role  )
    VALUES('{$name}','{$last_name}','{$email}', '{$date_birth}', '{$cell_phone}','{$telephone}', '{$route_image}','{$address}','{$password}','{$role}')";

        $result = mysqli_query( $conexion, $sql_stmt )or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

        if ( $result ) {
            json_encode_response('El usuario se ha creado exitosamente', 200, null);
        } else {
            json_encode_response('El usuario no se ha podio crear correctamente', 400, null);
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
        $password = $body->password;

        $sql_stmt = "SELECT id, name, last_name, email,role, address, photo FROM users WHERE email= '{$email}' AND password= '{$password}'";

        $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

        if($result){
             $rows=mysqli_num_rows($result);
             
             if($rows){
                $list_users=mysqli_fetch_assoc($result);
                $list_users['photo'] = "{$req['DOMAIN']}{$list_users['photo']}";
                $list_users['restaurant'] = restaurantByIdUser($list_users['id'],$req);
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
