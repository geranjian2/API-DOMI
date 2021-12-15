<?php 
function all($req){
    $conexion = connectDB();
    $sql_stmt = "SELECT id, name, telephone, address, thumbnail,email FROM restaurants"; 
    $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );
    if($result){
        $rows=mysqli_num_rows($result);
        if($rows){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $row['thumbnail'] = "{$req['DOMAIN']}{$row['thumbnail']}";
                $emparray[] = $row;
            }
            json_encode_response('Restaurantes', 200, $emparray);
        }else{
            json_encode_response('no hay restaurantes registrados', 200);
        }
    }
}


?>