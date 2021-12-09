<?php

include './helpers/functions.php';
include './routes/routes.php';
include './helpers/handler.php';
include './helpers/validate_routes.php';
include './passport/jwt.class.php';
include	'./helpers/response.php';
include './conexion/conexion.php';
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");



$request = $_SERVER;

$response_handler = handler($request['REQUEST_URI']);

$request= array_merge($request,$response_handler);


validate_route($routes,$request);
/*********************************
 *    obtener archivo recurso    *
 *********************************/
$resource_file_name = "./{$request['VERSION']}/{$request['RESOURCE']}.resource.php";
if (file_exists($resource_file_name)) {
	require_once($resource_file_name);
	$func_name = $request['FUNCTION'];
	$func_name($request);
} else {
	json_encode_response("El archivo {" . $get_resource . "} no existe", 404, null);
}



