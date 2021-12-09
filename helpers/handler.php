<?php 
    function handler($_REQUEST_URI){

        $_ARRAY_PARAMS = [];

        /*********************************
         * obtener la version del servicio *
         *********************************/
        $version['char'] = "/";
        $version['String'] = $_REQUEST_URI;
        $version['posicion'] = 2;
        $version = getExplode($version);

        /****************************************
         *    recurso de refencia nombre archivo*
         ****************************************/
        $get_resource['char'] = "/";
        $get_resource['String'] = $_REQUEST_URI;
        $get_resource['posicion'] = 3;
        $get_resource = getExplode($get_resource);

        /*********************************
         *    recurso de refencia function*
         *********************************/
        $get_function['char'] = "/";
        $get_function['String'] = $_REQUEST_URI;
        $get_function['posicion'] = 4;
        $get_function = getExplode($get_function);

        /*********************************
         *    recurso de refencia Class    *
         *********************************/
        $segmentoApi        =  "/apiStore/" . $version . "/";
        $uriNew   = str_replace($segmentoApi, "", $_REQUEST_URI);

        /*********************************
         *    obtener variables          *
         *********************************/
        $strinGet['String'] = $uriNew;
        $stringResource = deleteLastString($strinGet);
        $getVars['char'] = "/";
        $getVars['String'] = $stringResource;
        $getVars = getExplode($getVars);
        unset($getVars[0]);
        unset($getVars[1]);
        $params_uri = array_values($getVars);

        /*********************************
         *    obtener variables  body    *
         *********************************/
        $json = file_get_contents('php://input');
        $body = json_decode($json);

        array_push($_ARRAY_PARAMS, [ 'RESOURCE' => $get_resource,  'FUNCTION' => $get_function, 'VERSION' => $version,  'PARAMS' => $params_uri, 'BODY' => $body]);


        return $_ARRAY_PARAMS[0];
    }
?>