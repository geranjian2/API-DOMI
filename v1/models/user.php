<?php 

function validate_email($req){
    $conexion = connectDB();
    $body = $req['BODY'];
    $email = $body->email;
  

    $sql_stmt = "SELECT  email FROM users WHERE email= '{$email}'";

    $result = mysqli_query($conexion,$sql_stmt) or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

    
        if($result){
             $rows=mysqli_num_rows($result);
             
             if($rows){
               return 1;
             }else{
                return 0;
             }
        }
}

?>