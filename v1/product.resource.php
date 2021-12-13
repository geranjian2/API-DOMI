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
                $emparray[] = $row;
            }
            json_encode_response('Productos', 200, $emparray);
        }else{
            json_encode_response('No hay productos en stock en el momento', 200);
        }
    }
}



?>