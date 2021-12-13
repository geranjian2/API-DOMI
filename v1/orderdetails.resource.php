<?php 
    function productsdetails($product,$order_id){
        $conexion = connectDB();
        $sql_stmt = "INSERT INTO domi.order_details (priece, quantity , order_id, products_id)
    VALUES('{$product->price}','{$product->quantity}','{$order_id}','{$product->products_id}')";
        
        $result = mysqli_query( $conexion, $sql_stmt )or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

        if ( $result ) {
            return 1;
        } else {
            return 0;
        }
    }


?>