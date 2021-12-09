<?php 
    function validate_route($routes,$request){
        /*********************************
         *    validamos exista la ruta   *
         *********************************/
        $exist_route = false;
        foreach ($routes as $route) {
            if ($request['REQUEST_METHOD'] === $route['method'] && "/{$request['RESOURCE'] }/{$request['FUNCTION'] }/" === $route['route']) {
                $exist_route = true;
            }
        }
        if(!$exist_route){
            json_encode_response("El Recurso {/{$request['RESOURCE'] }/{$request['FUNCTION'] }/} con el metodo {$request['REQUEST_METHOD']}"  ."   no existe", 404, null);
        }
    }
?>