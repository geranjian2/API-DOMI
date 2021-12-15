<?php 

function restaurantByIdUser($id_user,$req){
    $conexion = connectDB();
    $sql_stmt = "SELECT id, name, telephone, address, user_id, thumbnail, email
    FROM restaurants where user_id = {$id_user}";

    $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

    if($result){
        $rows=mysqli_num_rows($result);
        if($rows){
           $list_users=mysqli_fetch_assoc($result);
           $list_users['thumbnail'] = "{$req['DOMAIN']}{$list_users['thumbnail']}";
           return $list_users;
        }else{
           return null;
        }
   }
}

?>