<?php 
function getbyidrestaurant($req){
    $conexion = connectDB();
    $params = $req['PARAMS'];
    $id_restaurant = $params[0];

    $sql_stmt = "SELECT id, name, price, description, thumbanail,stock FROM products  WHERE restaurant_id = $id_restaurant"; 
    $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );
    if($result){
        $rows=mysqli_num_rows($result);
        if($rows){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $row['thumbnail'] = "{$req['DOMAIN']}{$row['thumbanail']}";
                $emparray[] = $row;
            }
            json_encode_response('Productos', 200, $emparray);
        }else{
            json_encode_response('No hay productos en stock en el momento', 200);
        }
    }
}
function all($req){
    $conexion = connectDB();

    $sql_stmt = "SELECT id, name, price, description, thumbanail,stock FROM products"; 
    $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );
    if($result){
        $rows=mysqli_num_rows($result);
        if($rows){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $row['thumbnail'] = "{$req['DOMAIN']}{$row['thumbanail']}";
                $emparray[] = $row;
            }
            json_encode_response('Productos', 200, $emparray);
        }else{
            json_encode_response('No hay productos en stock en el momento', 200);
        }
    }
}

function save($req){
    $conexion = connectDB();
    $body = $req['BODY'];
    $files = $req['FILES'];
    $name = $body->name;
    $price = $body->price;
    $description = $body->description;
    $stock = $body->stock;
    $restaurant_id = $body->restaurant_id;
    $route_image = upload( $files['thumbanail'],"products" );
   if($route_image === 0){
    json_encode_response('La imagen no se ha podio cargar correctamente', 400, null);
   }
    

    $sql_stmt = "INSERT INTO domi.products
    (name, price, description, thumbanail, restaurant_id, stock)
    VALUES('{$name}', '{$price}', '{$description}', '{$route_image}', {$restaurant_id}, {$stock});";

    $result = mysqli_query( $conexion, $sql_stmt )or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

    if ( $result ) {
        json_encode_response('El producto se ha creado exitosamente', 200, null);
    } else {
        json_encode_response('El producto no se ha podio crear correctamente', 400, null);
    }

}



?>