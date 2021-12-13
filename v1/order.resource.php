<?php 
include './v1/orderdetails.resource.php';
function save($req){
    $conexion = connectDB();
    $body = $req['BODY'];
    
    $customer_id = $body->customer_id;
    $address = $body->address;
    $email = $body->email;
    $status = $body->status;
    $amount = $body->amount;
    $order_date = $body->order_date;

    $sql_stmt = "INSERT INTO domi.orders (customer_id, address , email, status, amount, order_date )
    VALUES('{$customer_id}','{$address}','{$email}', '{$status}', '{$amount}','{$order_date}')";
$result = mysqli_query( $conexion, $sql_stmt )or die( json_encode_response(mysqli_error( $conexion ), 400, null) );

if ( $result ) {
    $id_order = mysqli_insert_id($conexion);
    foreach ($body->products as $product) {
        productsdetails($product,$id_order);
    }
    
    json_encode_response('La orden se envio exitosamente'.$id_order, 200, null);
} else {
    json_encode_response('La orden no se ha podio crear correctamente', 400, null);
}

}
?>