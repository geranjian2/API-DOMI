<?php 
    function json_encode_response($message, $status, $data=null){
        $response = array(
            "message" => $message,
            "status" => $status,
        );
        if($data){
            $response['data'] = $data; 
        }
        http_response_code($status);
        echo json_encode($response);
        exit();
    }
?>